
<?php
ob_start();
?>

<!-- Page Title -->
<div class="card shadow border-0 border-start border-5 border-primary mb-4">
    <div class="card-body">

        <h2 class="mb-1">Customers</h2>

        <p class="text-muted mb-0">
            Manage and track all your customers
        </p>

    </div>
</div>

<!-- Customer Form -->
<div class="card shadow-sm mb-4">

    <div class="card-body">

        <!-- Form Header -->
        <div class="row align-items-center mb-3">

            <div class="col">

                <h5 class="mb-0">
                    <i class="bi bi-pencil-square text-primary me-2"></i>
                    Customer Form
                </h5>

                <small class="text-muted">
                    Fill in the details of a customer
                </small>

            </div>

            <div class="col-auto">

                <span class="badge bg-primary">
                    * Required Fields
                </span>

            </div>

        </div>

        <hr>

        <!-- Customer Form Fields -->
        <form action="" method="post"
              class="needs-validation" novalidate>

            <div class="row g-3">

                <!-- Customer ID -->
                <div class="col-md-3">

                    <label for="customer_num"
                           class="form-label">

                        Customer ID
                        <span class="text-danger">*</span>

                    </label>

                    <input type="text"
                           name="customer_num"
                           id="customer_num"
                           class="form-control"
                           placeholder="Enter Customer ID"
                           required>

                </div>

                <!-- Customer Name -->
                <div class="col-md-3">

                    <label for="customer_name"
                           class="form-label">

                        Name
                        <span class="text-danger">*</span>

                    </label>

                    <input type="text"
                           name="customer_name"
                           id="customer_name"
                           class="form-control"
                           placeholder="Enter Customer Name"
                           required>

                </div>

                <!-- Gender -->
                <div class="col-md-3">

                    <label for="customer_gender"
                           class="form-label">

                        Gender
                        <span class="text-danger">*</span>

                    </label>

                    <select name="customer_gender"
                            id="customer_gender"
                            class="form-select"
                            required>

                        <option value="">
                            Select Gender
                        </option>

                        <option value="Male">
                            Male
                        </option>

                        <option value="Female">
                            Female
                        </option>

                    </select>

                </div>

                <!-- Phone Number -->
                <div class="col-md-3">

                    <label for="customer_phone"
                           class="form-label">

                        Phone Number
                        <span class="text-danger">*</span>

                    </label>

                    <input type="text"
                           name="customer_phone"
                           id="customer_phone"
                           class="form-control"
                           placeholder="Enter Phone Number"
                           required>

                </div>

                <!-- Register Date -->
                <div class="col-md-3">

                    <label for="register_date"
                           class="form-label">

                        Register Date
                        <span class="text-danger">*</span>

                    </label>

                    <input type="date"
                           name="register_date"
                           id="register_date"
                           class="form-control"
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

<!-- Customer List -->
<div class="card shadow-sm">

    <div class="card-body">

        <!-- List Header -->
        <div class="row align-items-center mb-3">

            <div class="col">

                <h5 class="mb-0">
                    <i class="bi bi-table text-primary me-2"></i>
                    Customer List
                </h5>

                <small class="text-muted">
                    View and manage all customers
                </small>

            </div>

            <div class="col-auto">

                <span class="badge bg-success">
                    Total: 1 Items
                </span>

            </div>

        </div>

        <hr>

        <!-- Customer Table -->
        <div class="table-responsive">

            <table class="table table-striped table-hover">

                <thead class="table-dark">

                    <tr>
                        <th>Customer ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Register Date</th>
                        <th>Actions</th>
                    </tr>

                </thead>

                <tbody>

                    <!-- Dummy Customer -->
                    <tr>

                        <td>C001</td>

                        <td>Alice Johnson</td>

                        <td>Female</td>

                        <td>012-3456789</td>

                        <td>01-01-2026</td>

                        <td>

                            <!-- Edit Button -->
                            <a href="#"
                               class="btn btn-sm btn-warning"
                               title="Edit Customer">

                                <i class="bi bi-pencil"></i>

                            </a>

                            <!-- Delete Button -->
                            <a href="#"
                               class="btn btn-sm btn-danger"
                               title="Delete Customer">

                                <i class="bi bi-trash"></i>

                            </a>

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
