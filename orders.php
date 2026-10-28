
<?php
ob_start();
?>

<!-- Page Title -->
<div class="card shadow border-0 border-start border-5 border-primary mb-4">
    <div class="card-body">
        <h2 class="mb-1">Orders</h2>
        <p class="text-muted mb-0">
            Create and manage customer orders
        </p>
    </div>
</div>

<!-- Order Form -->
<div class="card shadow-sm mb-4">
    <div class="card-body">

        <!-- Form Header -->
        <div class="row align-items-center mb-3">

            <div class="col">
                <h5 class="mb-0">
                    <i class="bi bi-pencil-square text-primary me-2"></i>
                    Order Form
                </h5>

                <small class="text-muted">
                    Create an order header before adding products
                </small>
            </div>

            <div class="col-auto">
                <span class="badge bg-primary">
                    * Required Fields
                </span>
            </div>

        </div>

        <hr>

        <!-- Order Form Fields -->
        <form action="" method="post" id="orderForm">

            <div class="row g-3">

                <!-- Order Date -->
                <div class="col-md-4">

                    <label for="order_date" class="form-label">
                        Order Date
                        <span class="text-danger">*</span>
                    </label>

                    <input type="date"
                           name="order_date"
                           id="order_date"
                           class="form-control"
                           required>

                </div>

                <!-- Staff -->
                <div class="col-md-4">

                    <label for="staff_num" class="form-label">
                        Staff
                        <span class="text-danger">*</span>
                    </label>

                    <select name="staff_num"
                            id="staff_num"
                            class="form-select"
                            required>

                        <option value="">
                            Select Staff
                        </option>

                        <option value="S001">
                            Jane Smith
                        </option>

                    </select>

                </div>

                <!-- Customer -->
                <div class="col-md-4">

                    <label for="customer_num" class="form-label">
                        Customer
                        <span class="text-danger">*</span>
                    </label>

                    <select name="customer_num"
                            id="customer_num"
                            class="form-select"
                            required>

                        <option value="">
                            Select Customer
                        </option>

                        <option value="C001">
                            Alice Johnson
                        </option>

                    </select>

                </div>

            </div>

            <hr class="mt-4">

            <!-- Form Buttons -->
            <div class="mt-3">

                <button type="submit"
                        name="create"
                        class="btn btn-primary">

                    <i class="bi bi-save me-1"></i>
                    Create Order

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

<!-- Order List -->
<div class="card shadow-sm">

    <div class="card-body">

        <!-- List Header -->
        <div class="row align-items-center mb-3">

            <div class="col">
                <h5 class="mb-0">
                    <i class="bi bi-table text-primary me-2"></i>
                    Order List
                </h5>

                <small class="text-muted">
                    View orders and their products
                </small>
            </div>

            <div class="col-auto">
                <span class="badge bg-success">
                    Total: 1 Items
                </span>
            </div>

        </div>

        <hr>

        <!-- Order Table -->
        <div class="table-responsive">

            <table class="table table-striped table-hover">

                <thead class="table-dark">

                    <tr>
                        <th>Order No.</th>
                        <th>Date</th>
                        <th>Staff</th>
                        <th>Customer</th>
                        <th>Actions</th>
                    </tr>

                </thead>

                <tbody>

                    <!-- Dummy Order -->
                    <tr>
                        <td>O001</td>
                        <td>2026-10-03</td>
                        <td>Jane Smith</td>
                        <td>Alice Johnson</td>

                        <td>

                            <!-- Order Details Button -->
                            <a href="orderdetails.php"
                               class="btn btn-sm btn-success"
                               title="View Order Details">

                                <i class="bi bi-list-ul"></i>

                            </a>

                            <!-- Invoice Button -->
                            <a href="invoice.php"
                               class="btn btn-sm btn-info text-white"
                               title="View Invoice">

                                <i class="bi bi-receipt"></i>

                            </a>

                            <!-- Edit Button -->
                            <button type="button"
                                    class="btn btn-sm btn-warning"
                                    title="Edit Order"
                                    disabled>

                                <i class="bi bi-pencil"></i>

                            </button>

                            <!-- Delete Button -->
                            <button type="button"
                                    class="btn btn-sm btn-danger"
                                    title="Delete Order"
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
