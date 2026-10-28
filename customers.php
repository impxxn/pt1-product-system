
<?php
// ============================================
// PT1 - CUSTOMERS MANAGEMENT
// PHP + Bootstrap 5 + JavaScript
// Dummy Data (No Database)
// ============================================

$customers = [
    [
        'num' => 'C001',
        'name' => 'Alice Johnson',
        'phone' => '012-3456789',
        'email' => 'alice@example.com'
    ]
];

ob_start();
?>

<!-- PAGE HEADER -->
<div class="d-flex flex-wrap justify-content-between
            align-items-center gap-3 mb-4">

    <div>
        <h2 class="mb-1">
            <i class="bi bi-people text-primary me-2"></i>
            Customers Management
        </h2>

        <p class="text-muted mb-0">
            Manage customer information
        </p>
    </div>

    <span class="badge bg-primary fs-6" id="headerCount">
        1 Customer
    </span>

</div>


<!-- CUSTOMER FORM -->
<div class="card shadow-sm mb-4">

    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">
            <i class="bi bi-person-plus me-2"></i>
            Customer Form
        </h5>
    </div>

    <div class="card-body">

        <form id="customerForm">

            <div class="row g-3">

                <div class="col-md-6">
                    <label for="customerNum" class="form-label">
                        Customer Number
                    </label>

                    <input
                        type="text"
                        id="customerNum"
                        name="customer_num"
                        class="form-control"
                        placeholder="Example: C002"
                        required
                    >
                </div>

                <div class="col-md-6">
                    <label for="customerName" class="form-label">
                        Customer Name
                    </label>

                    <input
                        type="text"
                        id="customerName"
                        name="customer_name"
                        class="form-control"
                        placeholder="Enter customer name"
                        required
                    >
                </div>

                <div class="col-md-6">
                    <label for="customerPhone" class="form-label">
                        Phone Number
                    </label>

                    <input
                        type="tel"
                        id="customerPhone"
                        name="customer_phone"
                        class="form-control"
                        placeholder="Example: 012-3456789"
                        required
                    >
                </div>

                <div class="col-md-6">
                    <label for="customerEmail" class="form-label">
                        Email Address
                    </label>

                    <input
                        type="email"
                        id="customerEmail"
                        name="customer_email"
                        class="form-control"
                        placeholder="example@email.com"
                        required
                    >
                </div>

                <div class="col-12">

                    <button
                        type="submit"
                        class="btn btn-primary"
                        id="saveCustomerBtn"
                    >
                        <i class="bi bi-plus-lg me-1"></i>
                        Add Customer
                    </button>

                    <button
                        type="reset"
                        class="btn btn-secondary"
                    >
                        Clear
                    </button>

                </div>

            </div>

        </form>

        <div id="customerMessage" class="mt-3"></div>

        <p class="text-muted small mt-2 mb-0">
            This is a frontend demonstration.
            Changes are not saved permanently.
        </p>

    </div>
</div>


<!-- CUSTOMER LIST -->
<div class="card shadow-sm mb-4">

    <div class="card-header bg-dark text-white
                d-flex flex-wrap justify-content-between
                align-items-center gap-2">

        <h5 class="mb-0">
            <i class="bi bi-list-ul me-2"></i>
            Customer List
        </h5>

        <span class="badge bg-light text-dark" id="customerCount">
            1 Customer
        </span>

    </div>

    <div class="card-body">

        <!-- SEARCH -->
        <div class="row mb-3">

            <div class="col-md-6">
                <input
                    type="search"
                    id="searchCustomer"
                    class="form-control"
                    placeholder="Search customer..."
                >
            </div>

        </div>

        <!-- TABLE -->
        <div class="table-responsive">

            <table class="table table-bordered
                          table-striped table-hover
                          align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Customer Number</th>
                        <th>Customer Name</th>
                        <th>Phone Number</th>
                        <th>Email Address</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody id="customerTableBody">

                    <?php foreach ($customers as $index => $customer): ?>

                    <tr>

                        <td class="row-number">
                            <?php echo $index + 1; ?>
                        </td>

                        <td class="customer-num">
                            <?php echo htmlspecialchars(
                                $customer['num'],
                                ENT_QUOTES,
                                'UTF-8'
                            ); ?>
                        </td>

                        <td class="customer-name">
                            <?php echo htmlspecialchars(
                                $customer['name'],
                                ENT_QUOTES,
                                'UTF-8'
                            ); ?>
                        </td>

                        <td class="customer-phone">
                            <?php echo htmlspecialchars(
                                $customer['phone'],
                                ENT_QUOTES,
                                'UTF-8'
                            ); ?>
                        </td>

                        <td class="customer-email">
                            <?php echo htmlspecialchars(
                                $customer['email'],
                                ENT_QUOTES,
                                'UTF-8'
                            ); ?>
                        </td>

                        <td>
                            <button
                                type="button"
                                class="btn btn-warning btn-sm mb-1"
                                onclick="editCustomer(this)"
                            >
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </button>

                            <button
                                type="button"
                                class="btn btn-danger btn-sm mb-1"
                                onclick="deleteCustomer(this)"
                            >
                                <i class="bi bi-trash"></i>
                                Delete
                            </button>
                        </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

        <p
            id="noCustomersMessage"
            class="text-center text-muted d-none"
        >
            No matching customers found.
        </p>

    </div>
</div>


<!-- JAVASCRIPT -->
<script>

const customerForm = document.getElementById('customerForm');
const customerTableBody = document.getElementById('customerTableBody');

const customerNum = document.getElementById('customerNum');
const customerName = document.getElementById('customerName');
const customerPhone = document.getElementById('customerPhone');
const customerEmail = document.getElementById('customerEmail');

const saveCustomerBtn = document.getElementById('saveCustomerBtn');
const customerMessage = document.getElementById('customerMessage');

const searchCustomer = document.getElementById('searchCustomer');
const customerCount = document.getElementById('customerCount');
const headerCount = document.getElementById('headerCount');
const noCustomersMessage =
    document.getElementById('noCustomersMessage');

let editingRow = null;


// Display feedback
function showCustomerMessage(message, type = 'success') {

    customerMessage.textContent = '';

    const alertBox = document.createElement('div');

    alertBox.className = 'alert alert-' + type;
    alertBox.textContent = message;

    customerMessage.appendChild(alertBox);
}


// Update numbering and customer count
function updateCustomerCount() {

    const rows = customerTableBody.querySelectorAll('tr');

    rows.forEach((row, index) => {
        row.querySelector('.row-number').textContent = index + 1;
    });

    const count = rows.length;

    const label = count + (count === 1 ? ' Customer' : ' Customers');

    customerCount.textContent = label;
    headerCount.textContent = label;
}


// Search customers
function filterCustomers() {

    const keyword = searchCustomer.value.toLowerCase().trim();

    const rows = customerTableBody.querySelectorAll('tr');

    let visibleCount = 0;

    rows.forEach(row => {

        const num = row.querySelector('.customer-num')
            .textContent.toLowerCase();

        const name = row.querySelector('.customer-name')
            .textContent.toLowerCase();

        const phone = row.querySelector('.customer-phone')
            .textContent.toLowerCase();

        const email = row.querySelector('.customer-email')
            .textContent.toLowerCase();

        const matches =
            num.includes(keyword) ||
            name.includes(keyword) ||
            phone.includes(keyword) ||
            email.includes(keyword);

        row.style.display = matches ? '' : 'none';

        if (matches) {
            visibleCount++;
        }

    });

    noCustomersMessage.classList.toggle(
        'd-none',
        visibleCount > 0
    );
}

searchCustomer.addEventListener('input', filterCustomers);


// Add or update customer
customerForm.addEventListener('submit', function(event) {

    event.preventDefault();

    const num = customerNum.value.trim();
    const name = customerName.value.trim();
    const phone = customerPhone.value.trim();
    const email = customerEmail.value.trim();

    if (!num || !name || !phone || !email) {

        showCustomerMessage(
            'Please complete all customer details.',
            'danger'
        );

        return;
    }

    const rows = Array.from(
        customerTableBody.querySelectorAll('tr')
    );

    // Prevent duplicate customer numbers
    const duplicate = rows.some(row => {

        return row !== editingRow &&
            row.querySelector('.customer-num')
                .textContent.trim().toLowerCase() ===
                num.toLowerCase();

    });

    if (duplicate) {

        showCustomerMessage(
            'Customer number already exists.',
            'danger'
        );

        return;
    }

    if (editingRow) {

        // UPDATE
        editingRow.querySelector('.customer-num').textContent = num;
        editingRow.querySelector('.customer-name').textContent = name;
        editingRow.querySelector('.customer-phone').textContent = phone;
        editingRow.querySelector('.customer-email').textContent = email;

        editingRow = null;

        showCustomerMessage('Customer updated successfully.');

    } else {

        // ADD
        const row = document.createElement('tr');

        row.innerHTML = `
            <td class="row-number"></td>
            <td class="customer-num"></td>
            <td class="customer-name"></td>
            <td class="customer-phone"></td>
            <td class="customer-email"></td>
            <td>
                <button
                    type="button"
                    class="btn btn-warning btn-sm mb-1"
                    onclick="editCustomer(this)"
                >
                    Edit
                </button>

                <button
                    type="button"
                    class="btn btn-danger btn-sm mb-1"
                    onclick="deleteCustomer(this)"
                >
                    Delete
                </button>
            </td>
        `;

        row.querySelector('.customer-num').textContent = num;
        row.querySelector('.customer-name').textContent = name;
        row.querySelector('.customer-phone').textContent = phone;
        row.querySelector('.customer-email').textContent = email;

        customerTableBody.appendChild(row);

        showCustomerMessage('Customer added successfully.');
    }

    customerForm.reset();
    saveCustomerBtn.textContent = 'Add Customer';

    updateCustomerCount();
    filterCustomers();
});


// Edit customer
function editCustomer(button) {

    const row = button.closest('tr');

    editingRow = row;

    customerNum.value =
        row.querySelector('.customer-num').textContent.trim();

    customerName.value =
        row.querySelector('.customer-name').textContent.trim();

    customerPhone.value =
        row.querySelector('.customer-phone').textContent.trim();

    customerEmail.value =
        row.querySelector('.customer-email').textContent.trim();

    saveCustomerBtn.textContent = 'Update Customer';

    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}


// Delete customer
function deleteCustomer(button) {

    const row = button.closest('tr');

    const name =
        row.querySelector('.customer-name').textContent.trim();

    const confirmed = confirm(
        'Are you sure you want to delete ' + name + '?'
    );

    if (!confirmed) {
        return;
    }

    if (editingRow === row) {
        editingRow = null;
        customerForm.reset();
        saveCustomerBtn.textContent = 'Add Customer';
    }

    row.remove();

    updateCustomerCount();
    filterCustomers();

    showCustomerMessage('Customer deleted successfully.');
}


// Reset form
customerForm.addEventListener('reset', function() {

    editingRow = null;
    saveCustomerBtn.textContent = 'Add Customer';

});


// Initialize
updateCustomerCount();

</script>


<?php
$content = ob_get_clean();
require_once 'layout.php';
?>
