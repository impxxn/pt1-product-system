
<?php require_once 'header.php'; ?>

<?php require_once 'sidebar.php'; ?>

<!-- Main Content -->
<div class="col bg-light">

    <!-- Mobile Header -->
    <div class="p-3 d-lg-none bg-dark text-white mobile-header">

        <div class="d-flex align-items-center">

            <a href="#mySidebar"
               class="text-white text-decoration-none"
               data-bs-toggle="offcanvas"
               data-bs-target="#mySidebar"
               aria-controls="mySidebar"
               aria-label="Open navigation menu">

                <i class="bi bi-list fs-3"></i>

            </a>

            <h5 class="ms-3 mb-0">
                My Product System
            </h5>

        </div>

    </div>

    <!-- Page Content -->
    <div class="p-4">

        <?php
        echo isset($content) ? $content : '';
        ?>

    </div>

</div>

<?php require_once 'footer.php'; ?>
