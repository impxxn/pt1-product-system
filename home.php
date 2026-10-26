
<?php
ob_start();
?>

<div class="card shadow border-0 border-start border-5 border-primary mb-4">

    <div class="card-body">

        <h2 class="mb-1">
            <i class="bi bi-house-door me-2"></i>
            Dashboard
        </h2>

        <p class="text-muted mb-0">
            Welcome to My Product System
        </p>

    </div>

</div>

<div class="card shadow-sm">

    <div class="card-body">

        <h4>Welcome!</h4>

        <p>
            This is the homepage of the
            PT1 Product Management System.
        </p>

        <p class="text-muted">
            Use the sidebar to navigate
            between different modules.
        </p>

    </div>

</div>

<?php
$content = ob_get_clean();
require_once 'layout.php';
?>
