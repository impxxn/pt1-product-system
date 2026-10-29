
<?php
ob_start();
?>

<style>
/* ==========================================
   MUSCLEFIT GYM DASHBOARD THEME
   Styling only - original content preserved
========================================== */

:root {
    --gym-black: #0d0f12;
    --gym-dark: #171b20;
    --gym-card: #20252b;
    --gym-red: #ff343f;
    --gym-red-dark: #b91424;
    --gym-white: #f5f6f8;
    --gym-muted: #aeb6c1;
}

/* Dashboard wrapper */
.musclefit-dashboard {
    position: relative;
    isolation: isolate;
    padding: 26px;
    border-radius: 22px;
    background:
        radial-gradient(
            circle at 90% 5%,
            rgba(255,52,63,.17),
            transparent 35%
        ),
        radial-gradient(
            circle at 5% 90%,
            rgba(255,52,63,.07),
            transparent 35%
        ),
        linear-gradient(
            135deg,
            #11151a,
            #090b0e
        );
    color: var(--gym-white);
    overflow: hidden;
    min-height: 80vh;
}

/* Decorative gym grid */
.musclefit-dashboard::before {
    content: "";
    position: absolute;
    inset: 0;
    z-index: -1;
    pointer-events: none;
    opacity: .18;
    background-image:
        linear-gradient(
            rgba(255,255,255,.06) 1px,
            transparent 1px
        ),
        linear-gradient(
            90deg,
            rgba(255,255,255,.06) 1px,
            transparent 1px
        );
    background-size: 38px 38px;
}

/* General cards */
.musclefit-dashboard .card {
    background:
        linear-gradient(
            145deg,
            rgba(37,43,50,.98),
            rgba(20,24,29,.98)
        );
    color: var(--gym-white);
    border: 1px solid rgba(255,255,255,.09) !important;
    border-radius: 18px;
    box-shadow:
        0 14px 35px rgba(0,0,0,.28) !important;
    transition:
        transform .3s ease,
        box-shadow .3s ease,
        border-color .3s ease;
}

.musclefit-dashboard .card:hover {
    transform: translateY(-5px);
    border-color: rgba(255,52,63,.4) !important;
    box-shadow:
        0 20px 45px rgba(0,0,0,.4),
        0 0 25px rgba(255,52,63,.08) !important;
}

/* Welcome hero */
.musclefit-dashboard > .card:first-child {
    position: relative;
    overflow: hidden;
    min-height: 245px;
    display: flex;
    justify-content: center;
    border-left: 5px solid var(--gym-red) !important;
    background:
        radial-gradient(
            circle at 85% 50%,
            rgba(255,52,63,.25),
            transparent 38%
        ),
        linear-gradient(
            115deg,
            #222830,
            #101317
        );
}

.musclefit-dashboard > .card:first-child::after {
    content: "MF";
    position: absolute;
    right: 28px;
    top: 50%;
    transform: translateY(-50%) rotate(-10deg);
    font-family: Impact, "Arial Black", sans-serif;
    font-size: clamp(100px, 18vw, 220px);
    font-weight: 900;
    line-height: 1;
    letter-spacing: -12px;
    color: rgba(255,255,255,.035);
    pointer-events: none;
}

.musclefit-dashboard > .card:first-child .card-body {
    position: relative;
    z-index: 1;
}

.musclefit-dashboard > .card:first-child h2 {
    font-family: Impact, "Arial Black", sans-serif;
    text-transform: uppercase;
    letter-spacing: 1.3px;
    font-size: clamp(27px, 4vw, 43px);
    line-height: 1.2;
}

.musclefit-dashboard > .card:first-child p {
    font-size: 15px;
    max-width: 600px;
}

/* Headings */
.musclefit-dashboard h4,
.musclefit-dashboard h5 {
    color: var(--gym-white);
    font-weight: 800;
}

.musclefit-dashboard > h4 {
    font-family: Impact, "Arial Black", sans-serif;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    font-size: 28px;
    margin-top: 34px;
    padding-left: 16px;
    border-left: 4px solid var(--gym-red);
}

/* Text */
.musclefit-dashboard .text-muted {
    color: var(--gym-muted) !important;
}

.musclefit-dashboard p {
    line-height: 1.75;
}

.musclefit-dashboard strong {
    color: #ffffff;
}

/* Gym accent icons */
.musclefit-dashboard .text-primary,
.musclefit-dashboard .text-success,
.musclefit-dashboard .text-warning,
.musclefit-dashboard .text-info {
    color: var(--gym-red) !important;
}

/* Quick navigation cards */
.musclefit-dashboard > .row .card {
    position: relative;
    overflow: hidden;
}

.musclefit-dashboard > .row .card::before {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    height: 4px;
    background: linear-gradient(
        90deg,
        var(--gym-red),
        #ff8a64
    );
}

.musclefit-dashboard > .row .card::after {
    content: "";
    position: absolute;
    width: 150px;
    height: 150px;
    right: -85px;
    top: -85px;
    border-radius: 50%;
    background: rgba(255,52,63,.08);
    pointer-events: none;
}

.musclefit-dashboard > .row .card .bi {
    display: inline-block;
    filter: drop-shadow(
        0 0 14px rgba(255,52,63,.25)
    );
    transition: transform .3s ease;
}

.musclefit-dashboard > .row .card:hover .bi {
    transform: scale(1.13);
}

.musclefit-dashboard > .row .card h5 {
    font-family: Impact, "Arial Black", sans-serif;
    font-size: 23px;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.musclefit-dashboard > .row .card p {
    min-height: 80px;
}

/* Buttons */
.musclefit-dashboard .btn {
    border-radius: 9px;
    padding: 10px 19px;
    font-weight: 800;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: .65px;
    transition: all .25s ease;
}

.musclefit-dashboard .btn-primary {
    background: linear-gradient(
        135deg,
        #ff434d,
        #c91d2c
    );
    border-color: var(--gym-red);
    color: #fff;
}

.musclefit-dashboard .btn-primary:hover {
    background: #ff515a;
    border-color: #ff515a;
    box-shadow: 0 0 22px rgba(255,52,63,.3);
    transform: translateY(-2px);
}

.musclefit-dashboard .btn-outline-primary,
.musclefit-dashboard .btn-outline-success,
.musclefit-dashboard .btn-outline-warning,
.musclefit-dashboard .btn-outline-info {
    border: 1px solid rgba(255,52,63,.65);
    color: #ff6870;
    background: rgba(255,52,63,.04);
}

.musclefit-dashboard .btn-outline-primary:hover,
.musclefit-dashboard .btn-outline-success:hover,
.musclefit-dashboard .btn-outline-warning:hover,
.musclefit-dashboard .btn-outline-info:hover {
    color: #fff;
    background: var(--gym-red);
    border-color: var(--gym-red);
    box-shadow: 0 0 20px rgba(255,52,63,.25);
    transform: translateY(-2px);
}

/* Project information */
.musclefit-dashboard > .card:nth-last-of-type(1) {
    border-top: 3px solid var(--gym-red) !important;
}

.musclefit-dashboard > .card:nth-last-of-type(1)
.row > div {
    padding: 15px;
    background: rgba(255,255,255,.025);
    border-radius: 8px;
    border: 1px solid rgba(255,255,255,.045);
}

/* Footer text */
.musclefit-dashboard > .text-center {
    border-top: 1px solid rgba(255,255,255,.1);
    margin-top: 30px;
}

/* Responsive */
@media (max-width: 768px) {
    .musclefit-dashboard {
        padding: 15px;
        border-radius: 14px;
    }

    .musclefit-dashboard > .card:first-child {
        min-height: 220px;
    }

    .musclefit-dashboard > .card:first-child::after {
        font-size: 120px;
        right: 10px;
    }

    .musclefit-dashboard > .row .card p {
        min-height: auto;
    }

    .musclefit-dashboard > h4 {
        font-size: 24px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .musclefit-dashboard *,
    .musclefit-dashboard *::before,
    .musclefit-dashboard *::after {
        transition: none !important;
        animation: none !important;
    }
}
</style>

<div class="musclefit-dashboard">

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

</div>

<?php
$content = ob_get_clean();
require_once 'layout.php';
?>
