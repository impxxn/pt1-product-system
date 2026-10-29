
<?php
ob_start();
?>

<!-- Welcome Header -->
<div class="card shadow border-0 border-start border-5 border-primary mb-4">
    <div class="card-body p-4">

        <h2 class="mb-2">
            <i class="bi bi-house-door text-primary me-2"></i>
            Welcome to MuscleFit System
        </h2>

        <p class="text-muted mb-3">
            Paan's simple and organized product management dashboard.
        </p>

        <a href="products.php" class="btn btn-primary">
            <i class="bi bi-box-seam me-1"></i>
            Explore Products
        </a>

    </div>
</div>

<!-- System Overview -->
<div class="card shadow-sm mb-4">
    <div class="card-body p-4">

        <h4 class="mb-3">
            <i class="bi bi-info-circle text-primary me-2"></i>
            About Our System
        </h4>

        <p>
            MuscleFit System is a web-based product
            management interface designed to organize
            products, customers, staff members and
            customer orders in one place.
        </p>

        <p class="mb-0 text-muted">
            This system is developed using PHP,
            HTML, CSS and Bootstrap 5 as part of
            Project Tutorial 1 (PT1).
        </p>

    </div>
</div>

<!-- Quick Navigation -->
<h4 class="mb-3">
    <i class="bi bi-grid text-primary me-2"></i>
    Quick Navigation
</h4>

<div class="row g-4 mb-4">

    <!-- Products -->
    <div class="col-md-6 col-xl-3">
        <div class="card shadow-sm h-100 border-0">
            <div class="card-body text-center p-4">

                <i class="bi bi-box-seam text-primary"
                   style="font-size: 3rem;"></i>

                <h5 class="mt-3">Products</h5>

                <p class="text-muted small">
                    View and manage product information
                    and inventory records. Explore our wide range of Protein shakers.
                </p>

                <a href="products.php"
                   class="btn btn-outline-primary">
                    View Products
                </a>

            </div>
        </div>
    </div>

    <!-- Customers -->
    <div class="col-md-6 col-xl-3">
        <div class="card shadow-sm h-100 border-0">
            <div class="card-body text-center p-4">

                <i class="bi bi-people-fill text-success"
                   style="font-size: 3rem;"></i>

                <h5 class="mt-3">Customers</h5>

                <p class="text-muted small">
                    View customer profiles and
                    registration information.
                </p>

                <a href="customers.php"
                   class="btn btn-outline-success">
                    View Customers
                </a>

            </div>
        </div>
    </div>

    <!-- Staffs -->
    <div class="col-md-6 col-xl-3">
        <div class="card shadow-sm h-100 border-0">
            <div class="card-body text-center p-4">

                <i class="bi bi-person-badge text-warning"
                   style="font-size: 3rem;"></i>

                <h5 class="mt-3">Staffs</h5>

                <p class="text-muted small">
                    View staff members and
                    contact information.
                </p>

                <a href="staffs.php"
                   class="btn btn-outline-warning">
                    View Staffs
                </a>

            </div>
        </div>
    </div>

    <!-- Orders -->
    <div class="col-md-6 col-xl-3">
        <div class="card shadow-sm h-100 border-0">
            <div class="card-body text-center p-4">

                <i class="bi bi-cart-check-fill text-info"
                   style="font-size: 3rem;"></i>

                <h5 class="mt-3">Orders</h5>

                <p class="text-muted small">
                    View customer orders,
                    order details and invoices.
                </p>

                <a href="orders.php"
                   class="btn btn-outline-info">
                    View Orders
                </a>

            </div>
        </div>
    </div>

</div>

<!-- Project Information -->
<div class="card shadow-sm mb-4">
    <div class="card-body p-4">

        <h5 class="mb-3">
            <i class="bi bi-code-slash text-primary me-2"></i>
            Project Information
        </h5>

        <div class="row g-3">

            <div class="col-md-6">
                <strong>Project:</strong>
                Project Tutorial 1 (PT1)
            </div>

            <div class="col-md-6">
                <strong>System:</strong>
                My Product System
            </div>

            <div class="col-md-6">
                <strong>Technology:</strong>
                PHP, HTML, CSS, Bootstrap 5
            </div>

            <div class="col-md-6">
                <strong>Development Environment:</strong>
                Laragon
            </div>

        </div>

    </div>
</div>

<!-- Footer Text -->
<div class="text-center text-muted small py-3">
    &copy; <?php echo date('Y'); ?>
    My Product System.
    Project Tutorial 1.
</div>

<?php
$content = ob_get_clean();
require_once 'layout.php';
?>
