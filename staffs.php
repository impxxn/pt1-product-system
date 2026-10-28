
<?php
// =============================================
// PT1 - STAFF MANAGEMENT
// PHP + Bootstrap 5 + JavaScript
// Dummy Data - No Database
// =============================================

$staffs = [
    [
        'num' => 'S001',
        'name' => 'Jane Smith',
        'phone' => '011-23456789',
        'email' => 'jane@example.com'
    ]
];

ob_start();
?>

<!-- PAGE HEADER -->
<div class="d-flex flex-wrap justify-content-between
            align-items-center gap-3 mb-4">

    <div>
        <h2 class="mb-1">
            <i class="bi bi-person-badge text-primary me-2"></i>
            Staff Management
        </h2>

        <p class="text-muted mb-0">
            Manage staff information
        </p>
    </div>

    <span class="badge bg-primary fs-6" id="headerCount">
        1 Staff
    </span>

</div>


<!-- STAFF FORM -->
<div class="card shadow-sm mb-4">

    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">
            <i class="bi bi-person-plus me-2"></i>
            Staff Form
        </h5>
    </div>

    <div class="card-body">

        <form id="staffForm">

            <div class="row g-3">

                <!-- Staff Number -->
                <div class="col-md-6">

                    <label for="staffNum" class="form-label">
                        Staff Number
                    </label>

                    <input
                        type="text"
                        id="staffNum"
                        name="staff_num"
                        class="form-control"
                        placeholder="Example: S002"
                        required
                    >

                </div>

                <!-- Staff Name -->
                <div class="col-md-6">

                    <label for="staffName" class="form-label">
                        Staff Name
                    </label>

                    <input
                        type="text"
                        id="staffName"
                        name="staff_name"
                        class="form-control"
                        placeholder="Enter staff name"
                        required
                    >

                </div>

                <!-- Phone -->
                <div class="col-md-6">

                    <label for="staffPhone" class="form-label">
                        Phone Number
                    </label>

                    <input
                        type="tel"
                        id="staffPhone"
                        name="staff_phone"
                        class="form-control"
                        placeholder="Example: 012-3456789"
                        required
                    >

                </div>

                <!-- Email -->
                <div class="col-md-6">

                    <label for="staffEmail" class="form-label">
                        Email Address
                    </label>

                    <input
                        type="email"
                        id="staffEmail"
                        name="staff_email"
                        class="form-control"
                        placeholder="example@email.com"
                        required
                    >

                </div>

                <!-- Buttons -->
                <div class="col-12">

                    <button
                        type="submit"
                        class="btn btn-primary"
                        id="saveStaffBtn"
                    >
                        <i class="bi bi-plus-lg me-1"></i>
                        Add Staff
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

        <div id="staffMessage" class="mt-3"></div>

        <p class="text-muted small mt-2 mb-0">
            This is a frontend demonstration.
            Staff changes are not saved permanently.
        </p>

    </div>

</div>


<!-- STAFF LIST -->
<div class="card shadow-sm mb-4">

    <div class="card-header bg-dark text-white
                d-flex flex-wrap justify-content-between
                align-items-center gap-2">

        <h5 class="mb-0">
            <i class="bi bi-list-ul me-2"></i>
            Staff List
        </h5>

        <span class="badge bg-light text-dark" id="staffCount">
            1 Staff
        </span>

    </div>

    <div class="card-body">

        <!-- Search -->
        <div class="row mb-3">

            <div class="col-md-6">

                <input
                    type="search"
                    id="searchStaff"
                    class="form-control"
                    placeholder="Search staff number, name, phone or email..."
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
                        <th>Staff Number</th>
                        <th>Staff Name</th>
                        <th>Phone Number</th>
                        <th>Email Address</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody id="staffTableBody">

                    <?php foreach ($staffs as $index => $staff): ?>

                    <tr>

                        <td class="row-number">
                            <?php echo $index + 1; ?>
                        </td>

                        <td class="staff-num">
                            <?php echo htmlspecialchars(
                                $staff['num'],
                                ENT_QUOTES,
                                'UTF-8'
                            ); ?>
                        </td>

                        <td class="staff-name">
                            <?php echo htmlspecialchars(
                                $staff['name'],
                                ENT_QUOTES,
                                'UTF-8'
                            ); ?>
                        </td>

                        <td class="staff-phone">
                            <?php echo htmlspecialchars(
                                $staff['phone'],
                                ENT_QUOTES,
                                'UTF-8'
                            ); ?>
                        </td>

                        <td class="staff-email">
                            <?php echo htmlspecialchars(
                                $staff['email'],
                                ENT_QUOTES,
                                'UTF-8'
                            ); ?>
                        </td>

                        <td>

                            <button
                                type="button"
                                class="btn btn-warning btn-sm mb-1"
                                onclick="editStaff(this)"
                            >
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </button>

                            <button
                                type="button"
                                class="btn btn-danger btn-sm mb-1"
                                onclick="deleteStaff(this)"
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
            id="noStaffMessage"
            class="text-center text-muted d-none"
        >
            No matching staff found.
        </p>

    </div>

</div>


<!-- JAVASCRIPT -->
<script>

// DOM elements
const staffForm = document.getElementById('staffForm');
const staffTableBody = document.getElementById('staffTableBody');

const staffNum = document.getElementById('staffNum');
const staffName = document.getElementById('staffName');
const staffPhone = document.getElementById('staffPhone');
const staffEmail = document.getElementById('staffEmail');

const saveStaffBtn = document.getElementById('saveStaffBtn');
const staffMessage = document.getElementById('staffMessage');

const searchStaff = document.getElementById('searchStaff');
const staffCount = document.getElementById('staffCount');
const headerCount = document.getElementById('headerCount');
const noStaffMessage = document.getElementById('noStaffMessage');

let editingRow = null;


// Display message
function showStaffMessage(message, type = 'success') {

    staffMessage.textContent = '';

    const alertBox = document.createElement('div');

    alertBox.className = 'alert alert-' + type;
    alertBox.textContent = message;

    staffMessage.appendChild(alertBox);
}


// Update row numbering and staff count
function updateStaffCount() {

    const rows = staffTableBody.querySelectorAll('tr');

    rows.forEach((row, index) => {
        row.querySelector('.row-number').textContent = index + 1;
    });

    const count = rows.length;

    const label = count + ' Staff';

    staffCount.textContent = label;
    headerCount.textContent = label;
}


// Search staff
function filterStaff() {

    const keyword = searchStaff.value.toLowerCase().trim();

    const rows = staffTableBody.querySelectorAll('tr');

    let visibleCount = 0;

    rows.forEach(row => {

        const num = row.querySelector('.staff-num')
            .textContent.toLowerCase();

        const name = row.querySelector('.staff-name')
            .textContent.toLowerCase();

        const phone = row.querySelector('.staff-phone')
            .textContent.toLowerCase();

        const email = row.querySelector('.staff-email')
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

    noStaffMessage.classList.toggle(
        'd-none',
        visibleCount > 0
    );
}

searchStaff.addEventListener('input', filterStaff);


// Add or update staff
staffForm.addEventListener('submit', function(event) {

    event.preventDefault();

    const num = staffNum.value.trim();
    const name = staffName.value.trim();
    const phone = staffPhone.value.trim();
    const email = staffEmail.value.trim();

    if (!num || !name || !phone || !email) {

        showStaffMessage(
            'Please complete all staff details.',
            'danger'
        );

        return;
    }

    const rows = Array.from(
        staffTableBody.querySelectorAll('tr')
    );

    // Check duplicate staff number
    const duplicate = rows.some(row => {

        return row !== editingRow &&
            row.querySelector('.staff-num')
                .textContent.trim().toLowerCase() ===
                num.toLowerCase();

    });

    if (duplicate) {

        showStaffMessage(
            'Staff number already exists.',
            'danger'
        );

        return;
    }

    if (editingRow) {

        // UPDATE EXISTING STAFF
        editingRow.querySelector('.staff-num').textContent = num;
        editingRow.querySelector('.staff-name').textContent = name;
        editingRow.querySelector('.staff-phone').textContent = phone;
        editingRow.querySelector('.staff-email').textContent = email;

        editingRow = null;

        showStaffMessage('Staff updated successfully.');

    } else {

        // ADD NEW STAFF
        const row = document.createElement('tr');

        row.innerHTML = `
            <td class="row-number"></td>
            <td class="staff-num"></td>
            <td class="staff-name"></td>
            <td class="staff-phone"></td>
            <td class="staff-email"></td>
            <td>
                <button
                    type="button"
                    class="btn btn-warning btn-sm mb-1"
                    onclick="editStaff(this)"
                >
                    Edit
                </button>

                <button
                    type="button"
                    class="btn btn-danger btn-sm mb-1"
                    onclick="deleteStaff(this)"
                >
                    Delete
                </button>
            </td>
        `;

        row.querySelector('.staff-num').textContent = num;
        row.querySelector('.staff-name').textContent = name;
        row.querySelector('.staff-phone').textContent = phone;
        row.querySelector('.staff-email').textContent = email;

        staffTableBody.appendChild(row);

        showStaffMessage('Staff added successfully.');
    }

    staffForm.reset();
    saveStaffBtn.textContent = 'Add Staff';

    updateStaffCount();
    filterStaff();
});


// Edit staff
function editStaff(button) {

    const row = button.closest('tr');

    editingRow = row;

    staffNum.value =
        row.querySelector('.staff-num').textContent.trim();

    staffName.value =
        row.querySelector('.staff-name').textContent.trim();

    staffPhone.value =
        row.querySelector('.staff-phone').textContent.trim();

    staffEmail.value =
        row.querySelector('.staff-email').textContent.trim();

    saveStaffBtn.textContent = 'Update Staff';

    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}


// Delete staff
function deleteStaff(button) {

    const row = button.closest('tr');

    const name =
        row.querySelector('.staff-name').textContent.trim();

    const confirmed = confirm(
        'Are you sure you want to delete ' + name + '?'
    );

    if (!confirmed) {
        return;
    }

    if (editingRow === row) {
        editingRow = null;
        staffForm.reset();
        saveStaffBtn.textContent = 'Add Staff';
    }

    row.remove();

    updateStaffCount();
    filterStaff();

    showStaffMessage('Staff deleted successfully.');
}


// Clear form
staffForm.addEventListener('reset', function() {

    editingRow = null;
    saveStaffBtn.textContent = 'Add Staff';

});


// Initialize
updateStaffCount();

</script>


<?php
$content = ob_get_clean();
require_once 'layout.php';
?>
