
<?php
ob_start();
?>

<!-- Page Title -->
<div class="card shadow border-0 border-start border-5 border-primary mb-4">
    <div class="card-body">
        <h2 class="mb-1">Staffs</h2>
        <p class="text-muted mb-0">
            Manage and track all your staff members
        </p>
    </div>
</div>

<!-- Staff Form -->
<div class="card shadow-sm mb-4">
    <div class="card-body">

        <!-- Form Header -->
        <div class="row align-items-center mb-3">
            <div class="col">
                <h5 class="mb-0">
                    <i class="bi bi-pencil-square text-primary me-2"></i>
                    Staff Form
                </h5>
                <small class="text-muted">
                    Fill in the details of a staff member
                </small>
            </div>

            <div class="col-auto">
                <span class="badge bg-primary">
                    * Required Fields
                </span>
            </div>
        </div>

        <hr>

        <!-- Staff Form Fields -->
        <form action="" method="post" id="staffForm">

            <div class="row g-3">

                <!-- Staff ID -->
                <div class="col-md-3">
                    <label for="staff_num" class="form-label">
                        Staff ID
                        <span class="text-danger">*</span>
                    </label>

                    <input type="text"
                           name="staff_num"
                           id="staff_num"
                           class="form-control"
                           placeholder="Enter Staff ID"
                           required>
                </div>

                <!-- Staff Name -->
                <div class="col-md-3">
                    <label for="staff_name" class="form-label">
                        Name
                        <span class="text-danger">*</span>
                    </label>

                    <input type="text"
                           name="staff_name"
                           id="staff_name"
                           class="form-control"
                           placeholder="Enter Staff Name"
                           required>
                </div>

                <!-- Phone Number -->
                <div class="col-md-3">
                    <label for="staff_phone" class="form-label">
                        Phone Number
                        <span class="text-danger">*</span>
                    </label>

                    <input type="text"
                           name="staff_phone"
                           id="staff_phone"
                           class="form-control"
                           placeholder="Enter Phone Number"
                           required>
                </div>

                <!-- Email Address -->
                <div class="col-md-3">
                    <label for="staff_email" class="form-label">
                        Email
                        <span class="text-danger">*</span>
                    </label>

                    <input type="email"
                           name="staff_email"
                           id="staff_email"
                           class="form-control"
                           placeholder="Enter Email Address"
                           required>
                </div>

            </div>

            <hr class="mt-4">

            <!-- Form Buttons -->
            <div class="mt-3">
                <button type="submit"
                        name="create"
                        class="btn btn-primary">

                    <i class="bi bi-save me-1"></i>
                    Create
                </button>

                <button type="reset"
                        class="btn btn-secondary">

                    <i class="bi bi-arrow-counterclockwise me-1"></i>
                    Clear
                </button>
            </div>

        </form>

    </div>
</div>

<!-- Staff List -->
<div class="card shadow-sm">

    <div class="card-body">

        <!-- List Header -->
        <div class="row align-items-center mb-3">

            <div class="col">
                <h5 class="mb-0">
                    <i class="bi bi-table text-primary me-2"></i>
                    Staff List
                </h5>

                <small class="text-muted">
                    View and manage all staff members
                </small>
            </div>

            <div class="col-auto">
                <span class="badge bg-success">
                    Total: 1 Items
                </span>
            </div>

        </div>

        <hr>

        <!-- Staff Table -->
        <div class="table-responsive">

            <table class="table table-striped table-hover">

                <thead class="table-dark">
                    <tr>
                        <th>Staff ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    <!-- Dummy Staff -->
                    <tr>
                        <td>S001</td>
                        <td>Jane Smith</td>
                        <td>019-8765432</td>
                        <td>janesmith@example.com</td>

                        <td>
                            <!-- Edit Button -->
                            <button type="button"
                                    class="btn btn-sm btn-warning"
                                    title="Edit Staff"
                                    disabled>

                                <i class="bi bi-pencil"></i>
                            </button>

                            <!-- Delete Button -->
                            <button type="button"
                                    class="btn btn-sm btn-danger"
                                    title="Delete Staff"
                                    disabled>

                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>
</div>

<?php
$content = ob_get_clean();
require_once 'layout.php';
?>
