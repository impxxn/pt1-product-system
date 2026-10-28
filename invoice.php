
<?php
ob_start();
?>

<!-- Invoice Header -->
<div class="card shadow border-0 border-start border-5 border-primary mb-4 no-print">

    <div class="card-body">

        <div class="row align-items-center">

            <div class="col">
                <h2 class="mb-1">Invoice</h2>
                <p class="text-muted mb-0">
                    Order #O001
                </p>
            </div>

            <div class="col-auto">
                <button type="button"
                        class="btn btn-primary"
                        onclick="window.print()">

                    <i class="bi bi-printer me-1"></i>
                    Print
                </button>
            </div>

        </div>

    </div>
</div>

<!-- Invoice Content -->
<div class="card shadow-sm" id="invoiceContent">

    <div class="card-body p-4">

        <!-- Company and Invoice Info -->
        <div class="row mb-3">

            <div class="col-md-6">
                <h4 class="mb-1">
                    My Product System
                </h4>

                <p class="text-muted mb-0">
                    Sales Invoice
                </p>
            </div>

            <div class="col-md-6 text-md-end">
                <strong>Invoice No:</strong> O001
                <br>
                <strong>Date:</strong> 2026-10-03
            </div>

        </div>

        <hr>

        <!-- Customer and Staff Info -->
        <div class="row mb-4">

            <div class="col-md-6 mb-3">

                <strong>Customer</strong>
                <br>

                Alice Johnson
                <br>

                <span class="text-muted">
                    012-3456789
                </span>

            </div>

            <div class="col-md-6 text-md-end mb-3">

                <strong>Staff</strong>
                <br>

                Jane Smith
                <br>

                <span class="text-muted">
                    janesmith@example.com
                </span>

            </div>

        </div>

        <!-- Invoice Table -->
        <div class="table-responsive">

            <table class="table table-striped table-bordered">

                <thead class="table-dark">

                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th class="text-end">
                            Amount
                        </th>
                    </tr>

                </thead>

                <tbody>

                    <!-- Dummy Product -->
                    <tr>
                        <td>1</td>
                        <td>Road Bike</td>
                        <td>RM1,200.00</td>
                        <td>1</td>
                        <td class="text-end">
                            RM1,200.00
                        </td>
                    </tr>

                </tbody>

                <tfoot>

                    <tr>
                        <td colspan="4"
                            class="text-end fw-bold">
                            Grand Total
                        </td>

                        <td class="text-end fw-bold">
                            RM1,200.00
                        </td>
                    </tr>

                </tfoot>

            </table>

        </div>

        <!-- Back Button -->
        <div class="mt-4 no-print">

            <a href="orderdetails.php"
               class="btn btn-secondary">

                <i class="bi bi-arrow-left me-1"></i>
                Back to Details

            </a>

        </div>

    </div>

</div>

<!-- Print CSS -->
<style>
@media print {

    /* Hide navigation and buttons */
    #mySidebar,
    .mobile-header,
    .no-print,
    .btn {
        display: none !important;
    }

    /* Remove background and margins */
    html,
    body {
        background: white !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    /* Make content full width */
    .container-fluid,
    .row,
    .col {
        width: 100% !important;
        max-width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    /* Remove card shadows and borders */
    .card {
        border: none !important;
        box-shadow: none !important;
    }

    #invoiceContent {
        width: 100% !important;
        margin: 0 !important;
    }

    #invoiceContent .card-body {
        padding: 10mm !important;
    }

    /* Preserve table header contrast */
    .table-dark th {
        background-color: #212529 !important;
        color: white !important;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }

    /* Avoid splitting rows across pages */
    tr {
        break-inside: avoid;
    }

    @page {
        size: A4 portrait;
        margin: 10mm;
    }
}
</style>

<?php
$content = ob_get_clean();
require_once 'layout.php';
?>
