
<?php
$currentPage = basename($_SERVER['PHP_SELF']);

function activeMenu($pages) {
    global $currentPage;
    return in_array($currentPage, $pages) ? 'active' : '';
}
?>

<!-- Sidebar -->
<div id="mySidebar"
     class="col-auto bg-dark text-white offcanvas-lg offcanvas-start"
     tabindex="-1">

    <div class="p-4">

        <!-- Company Name -->
        <a href="home.php"
           class="navbar-brand text-white text-decoration-none">

            <h5 class="mb-3">
                <i class="bi bi-shop me-2"></i>
                My Product System
            </h5>

        </a>

        <hr>

        <!-- Navigation -->
        <ul class="nav nav-pills flex-column">

            <li class="nav-item mb-2">
                <a href="home.php"
                   class="nav-link <?php echo activeMenu(['home.php']); ?>">

                    <i class="bi bi-house-fill me-2"></i>
                    Home
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="products.php"
                   class="nav-link <?php echo activeMenu(['products.php']); ?>">

                    <i class="bi bi-box-seam me-2"></i>
                    Products
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="customers.php"
                   class="nav-link <?php echo activeMenu(['customers.php']); ?>">

                    <i class="bi bi-people-fill me-2"></i>
                    Customers
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="staffs.php"
                   class="nav-link <?php echo activeMenu(['staffs.php']); ?>">

                    <i class="bi bi-person-badge me-2"></i>
                    Staffs
                </a>
            </li>

            <li class="nav-item mb-2">
                <a href="orders.php"
                   class="nav-link <?php echo activeMenu([
                       'orders.php',
                       'orderdetails.php',
                       'invoice.php'
                   ]); ?>">

                    <i class="bi bi-cart-fill me-2"></i>
                    Orders
                </a>
            </li>

        </ul>

        <hr>

        <!-- User Profile -->
        <div class="dropdown">

            <a href="#"
               class="text-decoration-none text-white dropdown-toggle"
               data-bs-toggle="dropdown">

                <i class="bi bi-person-circle fs-3 me-2"></i>

                <span>User</span>
            </a>

            <ul class="dropdown-menu">
                <li>
                    <span class="dropdown-item-text">
                        PT1 Project
                    </span>
                </li>
            </ul>

        </div>

    </div>
</div>
