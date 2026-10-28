
<?php
// =============================================
// PT1 - SALES INVOICE
// Protein Shaker Bottle Collection
// PHP + Bootstrap 5
// Dummy Data - No Database
// =============================================

$orderNumber = 'O001';
$orderDate = '2026-10-03';

$customerName = 'Alice Johnson';
$customerPhone = '012-3456789';

$staffName = 'Jane Smith';
$staffEmail = 'janesmith@example.com';

ob_start();
?>

<style>
.invoice-container {
    max-width: 1000px;
    margin: 0 auto;
}

.invoice-table th,
.invoice-table td {
    vertical-align: middle;
}

.invoice-total {
    font-size: 1.4rem;
    font-weight: bold;
}

@media print {

    @page {
        size: A4 portrait;
        margin: 10mm;
    }

    body {
        background: white !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    /* Hide navigation and page controls */
    #mySidebar,
    .sidebar,
    .mobile-header,
    header,
    nav,
    footer,
    .no-print {
        display: none !important;
    }

    /* Allow invoice to use printable page width */
    main,
    .main-content,
    .content,
    .container,
    .container-fluid,
    .row,
    [class*="col-"] {
        max-width: 100% !important;
    }

    main,
    .main-content,
    .content,
    .container,
    .container-fluid {
        width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    .invoice-container {
        max-width: 100% !important;
        width: 100% !important;
    }

    .invoice-card {
        border: none !important;
        box-shadow: none !important;
    }

    .invoice-card .card-body {
        padding: 0 !important;
    }

    .invoice-table tr {
        break-inside: avoid;
        page-break-inside: avoid;
    }

    .invoice-table thead {
        display: table-header-group;
    }

    .invoice-table {
        font-size: 11px;
    }

    .invoice-table th,
    .invoice-table td {
        padding: 6px !important;
    }

    .invoice-table th {
        background: #212529 !important;
        color: white !important;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }

    a[href]::after {
        content: none !important;
    }
}
</style>


<!-- ===================================== -->
<!-- PAGE ACTIONS -->
<!-- ===================================== -->

<div class="invoice-container">

    <div class="d-flex flex-wrap justify-content-between
                align-items-center gap-2 mb-4 no-print">

        <div>
            <h2 class="mb-1">
                <i class="bi bi-receipt text-primary me-2"></i>
                Sales Invoice
            </h2>

            <p class="text-muted mb-0">
                Invoice for Order
                <?php echo htmlspecialchars($orderNumber); ?>
            </p>
        </div>

        <div class="d-flex gap-2">

            <a href="orderdetails.php"
               class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i>
                Back to Details
            </a>

            <button
                type="button"
                class="btn btn-primary"
                onclick="window.print()"
            >
                <i class="bi bi-printer me-1"></i>
                Print Invoice
            </button>

        </div>

    </div>


    <!-- ===================================== -->
    <!-- INVOICE CARD -->
    <!-- ===================================== -->

    <div class="card shadow-sm invoice-card"
         id="invoiceContent">

        <div class="card-body p-4">

            <!-- Company Header -->
            <div class="row align-items-start mb-4">

                <div class="col-sm-7">

                    <h3 class="fw-bold text-primary mb-1">
                        My Product System
                    </h3>

                    <p class="text-muted mb-0">
                        Protein Shaker Bottle Collection
                    </p>

                    <p class="text-muted small mb-0">
                        Project Tutorial 1 (PT1)
                    </p>

                </div>

                <div class="col-sm-5 text-sm-end mt-3 mt-sm-0">

                    <h2 class="fw-bold mb-1">
                        INVOICE
                    </h2>

                    <p class="mb-1">
                        <strong>Invoice No:</strong>
                        <?php echo htmlspecialchars($orderNumber); ?>
                    </p>

                    <p class="mb-0">
                        <strong>Date:</strong>
                        <?php echo htmlspecialchars($orderDate); ?>
                    </p>

                </div>

            </div>

            <hr>


            <!-- Customer and Staff Information -->
            <div class="row mb-4">

                <div class="col-sm-6 mb-3 mb-sm-0">

                    <h6 class="fw-bold text-uppercase">
                        Bill To
                    </h6>

                    <p class="mb-1">
                        <strong>
                            <?php echo htmlspecialchars($customerName); ?>
                        </strong>
                    </p>

                    <p class="text-muted mb-0">
                        Phone:
                        <?php echo htmlspecialchars($customerPhone); ?>
                    </p>

                </div>

                <div class="col-sm-6 text-sm-end">

                    <h6 class="fw-bold text-uppercase">
                        Handled By
                    </h6>

                    <p class="mb-1">
                        <strong>
                            <?php echo htmlspecialchars($staffName); ?>
                        </strong>
                    </p>

                    <p class="text-muted mb-0">
                        <?php echo htmlspecialchars($staffEmail); ?>
                    </p>

                </div>

            </div>


            <!-- Invoice Products -->
            <div class="table-responsive">

                <table class="table table-bordered invoice-table">

                    <thead class="table-dark">

                        <tr>
                            <th style="width: 8%;">No.</th>
                            <th>Product</th>
                            <th class="text-end">Unit Price (RM)</th>
                            <th class="text-center">Qty</th>
                            <th class="text-end">Total (RM)</th>
                        </tr>

                    </thead>

                    <tbody id="invoiceItemsBody">
                        <!-- Filled by JavaScript -->
                    </tbody>

                </table>

            </div>


            <!-- Grand Total -->
            <div class="row mt-4">

                <div class="col-sm-6"></div>

                <div class="col-sm-6">

                    <div class="d-flex justify-content-between
                                border-top pt-3">

                        <span class="invoice-total">
                            Grand Total:
                        </span>

                        <span class="invoice-total text-success"
                              id="invoiceGrandTotal">
                            RM 0.00
                        </span>

                    </div>

                </div>

            </div>


            <!-- Footer -->
            <div class="text-center mt-5 pt-3 border-top">

                <h6 class="fw-bold">
                    Thank You for Your Purchase!
                </h6>

                <p class="text-muted small mb-0">
                    This invoice is generated for
                    Project Tutorial 1 demonstration purposes.
                </p>

            </div>

        </div>

    </div>

</div>


<!-- ===================================== -->
<!-- JAVASCRIPT INVOICE DATA -->
<!-- ===================================== -->

<script>

// Default dummy invoice item
const defaultInvoiceItems = [
    {
        num: 'P001',
        name: 'Protein Shaker Bottle - Model 1',
        price: 25.00,
        quantity: 1
    }
];

// Read order items from browser session
let invoiceItems = defaultInvoiceItems;

try {
    const savedItems = sessionStorage.getItem('pt1_invoice_items');

    if (savedItems !== null) {
        const parsedItems = JSON.parse(savedItems);

        if (Array.isArray(parsedItems)) {
            invoiceItems = parsedItems.filter(item =>
                item &&
                typeof item.name === 'string' &&
                Number.isFinite(Number(item.price)) &&
                Number(item.price) >= 0 &&
                Number.isSafeInteger(Number(item.quantity)) &&
                Number(item.quantity) > 0
            );
        }
    }
} catch (error) {
    console.warn('Could not load saved invoice items.', error);
}

// Table elements
const invoiceItemsBody =
    document.getElementById('invoiceItemsBody');

const invoiceGrandTotal =
    document.getElementById('invoiceGrandTotal');


// Display invoice
function displayInvoice() {

    invoiceItemsBody.textContent = '';

    let grandTotal = 0;

    invoiceItems.forEach((item, index) => {

        const price = Number(item.price);
        const quantity = Number(item.quantity);
        const total = price * quantity;

        grandTotal += total;

        const row = document.createElement('tr');

        const noCell = row.insertCell();
        noCell.textContent = index + 1;

        const productCell = row.insertCell();
        productCell.textContent = item.name;

        const priceCell = row.insertCell();
        priceCell.className = 'text-end';
        priceCell.textContent = price.toFixed(2);

        const quantityCell = row.insertCell();
        quantityCell.className = 'text-center';
        quantityCell.textContent = quantity;

        const totalCell = row.insertCell();
        totalCell.className = 'text-end';
        totalCell.textContent = total.toFixed(2);

        invoiceItemsBody.appendChild(row);
    });

    // Show a message for an empty order
    if (invoiceItems.length === 0) {

        const row = document.createElement('tr');
        const cell = row.insertCell();

        cell.colSpan = 5;
        cell.className = 'text-center text-muted py-3';
        cell.textContent = 'No products in this order.';

        invoiceItemsBody.appendChild(row);
    }

    invoiceGrandTotal.textContent =
        'RM ' + grandTotal.toFixed(2);
}

displayInvoice();

</script>


<?php
$content = ob_get_clean();
require_once 'layout.php';
?>
