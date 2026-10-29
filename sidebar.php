
<div id="mySidebar" class="col-auto bg-dark text-white offcanvas-lg offcanvas-start">
    <div class="p-4">

        <a href="home.php" class="navbar-brand text-white text-decoration-none">
            <div class="row">
                <h5>MuscleFit</h5>
            </div>
        </a>

        <hr>

        <ul class="mynav nav nav-pills flex-column">

            <!-- Home -->
            <li class="nav-item mb-3 mt-2">
                <a href="home.php" class="text-decoration-none text-white">
                    <i class="bi bi-house-fill me-2"></i>
                    Home
                </a>
            </li>

            <!-- Dashboard -->
            <li class="nav-item mb-3">
                <a href="index.php" class="text-decoration-none text-white">
                    <i class="bi bi-bar-chart-line-fill me-2"></i>
                    Dashboard
                </a>
            </li>

            <!-- Products -->
            <li class="nav-item mb-3">
                <a href="products.php" class="text-decoration-none text-white">
                    <i class="bi bi-box-seam-fill me-2"></i>
                    Products
                </a>
            </li>

            <!-- Customers -->
            <li class="nav-item mb-3">
                <a href="customers.php" class="text-decoration-none text-white">
                    <i class="bi bi-people-fill me-2"></i>
                    Customers
                </a>
            </li>

            <!-- Staffs -->
            <li class="nav-item mb-3">
                <a href="staffs.php" class="text-decoration-none text-white">
                    <i class="bi bi-person-badge-fill me-2"></i>
                    Staffs
                </a>
            </li>

            <!-- Orders -->
            <li class="nav-item mb-3">
                <a href="orders.php" class="text-decoration-none text-white">
                    <i class="bi bi-cart-check-fill me-2"></i>
                    Orders
                </a>
            </li>

        </ul>

        <hr>

        <!-- User Profile -->
        <div class="dropdown">
            <a href="#" class="text-decoration-none text-white dropdown-toggle d-inline-block align-middle"
               data-bs-toggle="dropdown">

                <div class="rounded-circle bg-secondary text-center d-inline-block align-middle"
                     style="width: 50px; height: 50px; line-height: 50px;">
                    <i class="bi bi-person-fill text-white fs-4"></i>
                </div>

                <div class="d-inline-block align-middle ms-2 text-start">
                    <h6 class="mb-0 text-nowrap">Farhan</h6>
                    <small class="text-white-50 text-nowrap d-block">
                        farhanukm354@gmail.com
                    </small>
                </div>

            </a>

            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>

    </div>
</div>