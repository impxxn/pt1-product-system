
<?php
ob_start();
?>
 
<div class="card shadow border-0 border-start border-5 border-primary mb-4 no-print">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="mb-1">Invoice</h2>
                <p class="text-muted mb-0">Order #O001</p>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-primary" onclick="window.print()"><i class="bi bi-printer me-1"></i>Print</button>
            </div>
        </div>
    </div>
</div>
 
<div class="card shadow-sm invoice-card">
    <div class="card-body p-4">
        <div class="row mb-4">
            <div class="col-md-6">
                <h4>My Company</h4>
                <p class="text-muted mb-0">Sales Invoice</p>
            </div>
            <div class="col-md-6 text-md-end">
                <strong>Invoice No.: </strong>O001<br>
                <strong>Date: </strong>2026-10-03
            </div>
        </div>
        <hr>
        <div class="row mb-4">
            <div class="col-md-6">
                <strong>Customer</strong><br>
                Alice Johnson<br>
                012-3456789
            </div>
            <div class="col-md-6 text-md-end">
                <strong>Staff</strong><br>
                Jane Smith<br>
                janesmith@example.com
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th class="text-end">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Road Bike</td>
                        <td>$1,200.00</td>
                        <td>1</td>
                        <td class="text-end">$1,200.00</td>
                    </tr>
                    <tr><td colspan="5" class="text-center">No products added to this order</td></tr>
                </tbody>
                <tfoot><tr><th colspan="4" class="text-end">Grand Total</th><th class="text-end">$1,200.00</th></tr></tfoot>
            </table>
        </div>
        <a href="orderdetails.php" class="btn btn-secondary no-print"><i class="bi bi-arrow-left me-1"></i>Back to Details</a>
    </div>
</div>
 
<style>
@media print {

    /* Hide sidebar, header, navigation and print controls */
    .no-print,
    .sidebar,
    #sidebar,
    .navbar,
    header,
    .burger-header,
    .sidebar-header,
    .btn,
    button,
    a[href="orderdetails.php"] {
        display: none !important;
    }

    /* Remove shadows and borders from all cards */
    .card,
    .card-body,
    .shadow,
    .shadow-sm,
    .shadow-lg {
        box-shadow: none !important;
        border: none !important;
    }

    /* Clean white print background */
    body,
    html {
        background: #ffffff !important;
        color: #000000 !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    /* Remove layout spacing that is unnecessary for printing */
    .container,
    .container-fluid,
    main,
    .main-content,
    .content {
        width: 100% !important;
        max-width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    /* Make invoice fill the printable area */
    .invoice-card {
        width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
        border: none !important;
        box-shadow: none !important;
    }

    .invoice-card .card-body {
        padding: 10px !important;
    }

    /* Keep the invoice table clean */
    .table-responsive {
        overflow: visible !important;
    }

    table {
        width: 100% !important;
        border-collapse: collapse !important;
    }

    thead {
        display: table-header-group;
    }

    tr {
        page-break-inside: avoid;
    }

    /* Preserve table colors when supported by the browser */
    .table-dark {
        --bs-table-bg: #212529 !important;
        --bs-table-color: #ffffff !important;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }

    .table-striped > tbody > tr:nth-of-type(odd) > * {
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
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