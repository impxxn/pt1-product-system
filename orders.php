
<?php
// =============================================
// PT1 - ORDERS MANAGEMENT
// PHP + Bootstrap 5 + JavaScript
// Dummy Data - No Database
// =============================================

$orders = [
    [
        'num' => 'O001',
        'date' => '2026-10-03',
        'staff' => 'S001',
        'staff_name' => 'Jane Smith',
        'customer' => 'C001',
        'customer_name' => 'Alice Johnson'
    ]
];

$staffs = [
    ['num' => 'S001', 'name' => 'Jane Smith']
];

$customers = [
    ['num' => 'C001', 'name' => 'Alice Johnson']
];

ob_start();
?>

<!-- PAGE HEADER -->
<div class="d-flex flex-wrap justify-content-between
            align-items-center gap-3 mb-4">

    <div>
        <h2 class="mb-1">
            <i class="bi bi-cart-check text-primary me-2"></i>
            Orders Management
        </h2>

        <p class="text-muted mb-0">
            Manage customer orders
        </p>
    </div>

    <span class="badge bg-primary fs-6" id="headerCount">
        1 Order
    </span>

</div>


<!-- ORDER FORM -->
<div class="card shadow-sm mb-4">

    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">
            <i class="bi bi-plus-circle me-2"></i>
            Order Form
        </h5>
    </div>

    <div class="card-body">

        <form id="orderForm">

            <div class="row g-3">

                <!-- Order Number -->
                <div class="col-md-6">

                    <label for="orderNum" class="form-label">
                        Order Number
                    </label>

                    <input
                        type="text"
                        id="orderNum"
                        name="order_num"
                        class="form-control"
                        placeholder="Example: O002"
                        required
                    >

                </div>

                <!-- Order Date -->
                <div class="col-md-6">

                    <label for="orderDate" class="form-label">
                        Order Date
                    </label>

                    <input
                        type="date"
                        id="orderDate"
                        name="order_date"
                        class="form-control"
                        required
                    >

                </div>

                <!-- Staff -->
                <div class="col-md-6">

                    <label for="staffSelect" class="form-label">
                        Staff
                    </label>

                    <select
                        id="staffSelect"
                        name="staff_num"
                        class="form-select"
                        required
                    >
                        <option value="">
                            -- Select Staff --
                        </option>

                        <?php foreach ($staffs as $staff): ?>

                            <option
                                value="<?php echo htmlspecialchars($staff['num'], ENT_QUOTES, 'UTF-8'); ?>"
                            >
                                <?php echo htmlspecialchars(
                                    $staff['num'] . ' - ' . $staff['name'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                ); ?>
                            </option>

                        <?php endforeach; ?>
                    </select>

                </div>

                <!-- Customer -->
                <div class="col-md-6">

                    <label for="customerSelect" class="form-label">
                        Customer
                    </label>

                    <select
                        id="customerSelect"
                        name="customer_num"
                        class="form-select"
                        required
                    >
                        <option value="">
                            -- Select Customer --
                        </option>

                        <?php foreach ($customers as $customer): ?>

                            <option
                                value="<?php echo htmlspecialchars($customer['num'], ENT_QUOTES, 'UTF-8'); ?>"
                            >
                                <?php echo htmlspecialchars(
                                    $customer['num'] . ' - ' . $customer['name'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                ); ?>
                            </option>

                        <?php endforeach; ?>
                    </select>

                </div>

                <!-- Buttons -->
                <div class="col-12">

                    <button
                        type="submit"
                        class="btn btn-primary"
                        id="saveOrderBtn"
                    >
                        <i class="bi bi-plus-lg me-1"></i>
                        Add Order
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

        <div id="orderMessage" class="mt-3"></div>

        <p class="text-muted small mt-2 mb-0">
            This is a frontend demonstration.
            Order changes are not saved permanently.
        </p>

    </div>

</div>


<!-- ORDER LIST -->
<div class="card shadow-sm mb-4">

    <div class="card-header bg-dark text-white
                d-flex flex-wrap justify-content-between
                align-items-center gap-2">

        <h5 class="mb-0">
            <i class="bi bi-list-ul me-2"></i>
            Order List
        </h5>

        <span class="badge bg-light text-dark" id="orderCount">
            1 Order
        </span>

    </div>

    <div class="card-body">

        <!-- Search -->
        <div class="row mb-3">

            <div class="col-md-6">

                <input
                    type="search"
                    id="searchOrder"
                    class="form-control"
                    placeholder="Search order number, date, staff or customer..."
                >

            </div>

        </div>

        <!-- Table -->
        <div class="table-responsive">

            <table class="table table-bordered
                          table-striped table-hover
                          align-middle">

                <thead class="table-dark">

                    <tr>
                        <th>No.</th>
                        <th>Order Number</th>
                        <th>Order Date</th>
                        <th>Staff</th>
                        <th>Customer</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody id="orderTableBody">

                    <?php foreach ($orders as $index => $order): ?>

                    <tr
                        data-staff="<?php echo htmlspecialchars($order['staff'], ENT_QUOTES, 'UTF-8'); ?>"
                        data-customer="<?php echo htmlspecialchars($order['customer'], ENT_QUOTES, 'UTF-8'); ?>"
                    >

                        <td class="row-number">
                            <?php echo $index + 1; ?>
                        </td>

                        <td class="order-num">
                            <?php echo htmlspecialchars($order['num']); ?>
                        </td>

                        <td class="order-date">
                            <?php echo htmlspecialchars($order['date']); ?>
                        </td>

                        <td class="order-staff">
                            <?php echo htmlspecialchars($order['staff_name']); ?>
                        </td>

                        <td class="order-customer">
                            <?php echo htmlspecialchars($order['customer_name']); ?>
                        </td>

                        <td>

                            <a
                                href="orderdetails.php"
                                class="btn btn-info btn-sm mb-1"
                            >
                                Details
                            </a>

                            <a
                                href="invoice.php"
                                class="btn btn-success btn-sm mb-1"
                            >
                                Invoice
                            </a>

                            <button
                                type="button"
                                class="btn btn-warning btn-sm mb-1"
                                onclick="editOrder(this)"
                            >
                                Edit
                            </button>

                            <button
                                type="button"
                                class="btn btn-danger btn-sm mb-1"
                                onclick="deleteOrder(this)"
                            >
                                Delete
                            </button>

                        </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

        <p
            id="noOrdersMessage"
            class="text-center text-muted d-none"
        >
            No matching orders found.
        </p>

    </div>

</div>


<!-- JAVASCRIPT -->
<script>

const orderForm = document.getElementById('orderForm');
const orderTableBody = document.getElementById('orderTableBody');

const orderNum = document.getElementById('orderNum');
const orderDate = document.getElementById('orderDate');

const staffSelect = document.getElementById('staffSelect');
const customerSelect = document.getElementById('customerSelect');

const saveOrderBtn = document.getElementById('saveOrderBtn');
const orderMessage = document.getElementById('orderMessage');

const searchOrder = document.getElementById('searchOrder');
const orderCount = document.getElementById('orderCount');
const headerCount = document.getElementById('headerCount');
const noOrdersMessage = document.getElementById('noOrdersMessage');

let editingRow = null;


// Display message
function showOrderMessage(message, type = 'success') {

    orderMessage.textContent = '';

    const alertBox = document.createElement('div');

    alertBox.className = 'alert alert-' + type;
    alertBox.textContent = message;

    orderMessage.appendChild(alertBox);
}


// Update numbering and count
function updateOrderCount() {

    const rows = orderTableBody.querySelectorAll('tr');

    rows.forEach((row, index) => {
        row.querySelector('.row-number').textContent = index + 1;
    });

    const count = rows.length;
    const label = count + (count === 1 ? ' Order' : ' Orders');

    orderCount.textContent = label;
    headerCount.textContent = label;
}


// Search orders
function filterOrders() {

    const keyword = searchOrder.value.toLowerCase().trim();

    const rows = orderTableBody.querySelectorAll('tr');

    let visibleCount = 0;

    rows.forEach(row => {

        const num = row.querySelector('.order-num')
            .textContent.toLowerCase();

        const date = row.querySelector('.order-date')
            .textContent.toLowerCase();

        const staff = row.querySelector('.order-staff')
            .textContent.toLowerCase();

        const customer = row.querySelector('.order-customer')
            .textContent.toLowerCase();

        const matches =
            num.includes(keyword) ||
            date.includes(keyword) ||
            staff.includes(keyword) ||
            customer.includes(keyword);

        row.style.display = matches ? '' : 'none';

        if (matches) {
            visibleCount++;
        }

    });

    noOrdersMessage.classList.toggle(
        'd-none',
        visibleCount > 0
    );
}

searchOrder.addEventListener('input', filterOrders);


// Add or update order
orderForm.addEventListener('submit', function(event) {

    event.preventDefault();

    const num = orderNum.value.trim();
    const date = orderDate.value;
    const staffNum = staffSelect.value;
    const customerNum = customerSelect.value;

    if (!num || !date || !staffNum || !customerNum) {

        showOrderMessage(
            'Please complete all order details.',
            'danger'
        );

        return;
    }

    const rows = Array.from(
        orderTableBody.querySelectorAll('tr')
    );

    // Check duplicate order number
    const duplicate = rows.some(row => {

        return row !== editingRow &&
            row.querySelector('.order-num')
                .textContent.trim().toLowerCase() ===
                num.toLowerCase();

    });

    if (duplicate) {

        showOrderMessage(
            'Order number already exists.',
            'danger'
        );

        return;
    }

    const staffName =
        staffSelect.selectedOptions[0].textContent
            .split(' - ').slice(1).join(' - ').trim();

    const customerName =
        customerSelect.selectedOptions[0].textContent
            .split(' - ').slice(1).join(' - ').trim();

    if (editingRow) {

        // UPDATE ORDER
        editingRow.querySelector('.order-num').textContent = num;
        editingRow.querySelector('.order-date').textContent = date;
        editingRow.querySelector('.order-staff').textContent = staffName;
        editingRow.querySelector('.order-customer').textContent = customerName;

        editingRow.dataset.staff = staffNum;
        editingRow.dataset.customer = customerNum;

        editingRow = null;

        showOrderMessage('Order updated successfully.');

    } else {

        // ADD ORDER
        const row = document.createElement('tr');

        row.dataset.staff = staffNum;
        row.dataset.customer = customerNum;

        row.innerHTML = `
            <td class="row-number"></td>
            <td class="order-num"></td>
            <td class="order-date"></td>
            <td class="order-staff"></td>
            <td class="order-customer"></td>
            <td>
                <a href="orderdetails.php"
                   class="btn btn-info btn-sm mb-1">
                    Details
                </a>

                <a href="invoice.php"
                   class="btn btn-success btn-sm mb-1">
                    Invoice
                </a>

                <button type="button"
                        class="btn btn-warning btn-sm mb-1"
                        onclick="editOrder(this)">
                    Edit
                </button>

                <button type="button"
                        class="btn btn-danger btn-sm mb-1"
                        onclick="deleteOrder(this)">
                    Delete
                </button>
            </td>
        `;

        row.querySelector('.order-num').textContent = num;
        row.querySelector('.order-date').textContent = date;
        row.querySelector('.order-staff').textContent = staffName;
        row.querySelector('.order-customer').textContent = customerName;

        orderTableBody.appendChild(row);

        showOrderMessage('Order added successfully.');
    }

    orderForm.reset();
    saveOrderBtn.textContent = 'Add Order';

    updateOrderCount();
    filterOrders();
});


// Edit order
function editOrder(button) {

    const row = button.closest('tr');

    editingRow = row;

    orderNum.value =
        row.querySelector('.order-num').textContent.trim();

    orderDate.value =
        row.querySelector('.order-date').textContent.trim();

    staffSelect.value = row.dataset.staff;
    customerSelect.value = row.dataset.customer;

    saveOrderBtn.textContent = 'Update Order';

    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}


// Delete order
function deleteOrder(button) {

    const row = button.closest('tr');

    const num =
        row.querySelector('.order-num').textContent.trim();

    const confirmed = confirm(
        'Are you sure you want to delete Order ' + num + '?'
    );

    if (!confirmed) {
        return;
    }

    if (editingRow === row) {
        editingRow = null;
        orderForm.reset();
        saveOrderBtn.textContent = 'Add Order';
    }

    row.remove();

    updateOrderCount();
    filterOrders();

    showOrderMessage('Order deleted successfully.');
}


// Clear form
orderForm.addEventListener('reset', function() {

    editingRow = null;
    saveOrderBtn.textContent = 'Add Order';

});


// Initialize
updateOrderCount();

</script>


<?php
$content = ob_get_clean();
require_once 'layout.php';
?>
