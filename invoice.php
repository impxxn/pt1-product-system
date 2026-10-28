
<?php
// PT1 - SALES INVOICE
// Linked with Orders and Order Details
// Printable A4 Invoice - No Database

ob_start();
?>

<style>
.invoice-container {
    max-width: 1000px;
    margin: 0 auto;
}

.invoice-card {
    border-radius: 12px;
}

.invoice-table th,
.invoice-table td {
    vertical-align: middle;
}

.invoice-total {
    font-size: 1.35rem;
    font-weight: 700;
}

@media print {
    @page {
        size: A4 portrait;
        margin: 12mm;
    }

    body {
        background: #fff !important;
    }

    /* Hide common layout elements */
    header,
    footer,
    nav,
    aside,
    .sidebar,
    #sidebar,
    #mySidebar,
    .mobile-header,
    .no-print {
        display: none !important;
    }

    /* Allow the invoice to fill the printed page */
    main,
    .main-content,
    .content,
    .container,
    .container-fluid,
    .invoice-container {
        width: 100% !important;
        max-width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    .invoice-card {
        border: none !important;
        box-shadow: none !important;
    }

    .invoice-card .card-body {
        padding: 0 !important;
    }

    .invoice-table {
        font-size: 11px;
    }

    .invoice-table th,
    .invoice-table td {
        padding: 6px !important;
    }

    .invoice-table tr {
        break-inside: avoid;
        page-break-inside: avoid;
    }

    .invoice-table thead {
        display: table-header-group;
    }

    .invoice-table th {
        background: #212529 !important;
        color: white !important;
        print-color-adjust: exact;
        -webkit-print-color-adjust: exact;
    }

    a[href]::after {
        content: none !important;
    }
}
</style>

<div class="invoice-container">

    <!-- PAGE HEADER / ACTIONS -->
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4 no-print">
        <div>
            <h2 class="mb-1">
                <i class="bi bi-receipt text-primary me-2"></i>
                Sales Invoice
            </h2>
            <p class="text-muted mb-0">
                Invoice for Order
                <span id="pageOrderNumber">O001</span>
            </p>
        </div>

        <div class="d-flex flex-wrap gap-2">
            <a href="orderdetails.php" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i>
                Back to Details
            </a>

            <button type="button" class="btn btn-primary"
                    onclick="window.print()">
                <i class="bi bi-printer me-1"></i>
                Print Invoice
            </button>
        </div>
    </div>

    <!-- INVOICE -->
    <div class="card shadow-sm invoice-card">
        <div class="card-body p-4">

            <!-- COMPANY / INVOICE HEADING -->
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
                    <h2 class="fw-bold mb-2">INVOICE</h2>

                    <p class="mb-1">
                        <strong>Invoice No:</strong>
                        <span id="invoiceOrderNumber">O001</span>
                    </p>

                    <p class="mb-0">
                        <strong>Date:</strong>
                        <span id="invoiceOrderDate">2026-10-03</span>
                    </p>
                </div>
            </div>

            <hr>

            <!-- CUSTOMER / STAFF -->
            <div class="row mb-4">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <h6 class="fw-bold text-uppercase">
                        Bill To
                    </h6>

                    <p class="mb-1">
                        <strong id="invoiceCustomerName">
                            Alice Johnson
                        </strong>
                    </p>

                    <p class="text-muted small mb-0">
                        Customer Information
                    </p>
                </div>

                <div class="col-sm-6 text-sm-end">
                    <h6 class="fw-bold text-uppercase">
                        Handled By
                    </h6>

                    <p class="mb-1">
                        <strong id="invoiceStaffName">
                            Jane Smith
                        </strong>
                    </p>

                    <p class="text-muted small mb-0">
                        Staff Information
                    </p>
                </div>
            </div>

            <!-- PRODUCT TABLE -->
            <div class="table-responsive">
                <table class="table table-bordered invoice-table">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>Product Number</th>
                            <th>Product Name</th>
                            <th class="text-end">Unit Price (RM)</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-end">Total (RM)</th>
                        </tr>
                    </thead>

                    <tbody id="invoiceItemsBody"></tbody>
                </table>
            </div>

            <!-- TOTAL -->
            <div class="row mt-4">
                <div class="col-sm-6"></div>

                <div class="col-sm-6">
                    <div class="d-flex justify-content-between align-items-center border-top pt-3">
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

            <!-- FOOTER -->
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

<script>
(() => {
    const defaultOrder = {
        number: 'O001',
        date: '2026-10-03',
        staff: 'Jane Smith',
        customer: 'Alice Johnson'
    };

    function loadSelectedOrder() {
        try {
            const saved = sessionStorage.getItem('pt1_selected_order');
            const parsed = saved ? JSON.parse(saved) : null;

            if (parsed && typeof parsed.number === 'string') {
                return parsed;
            }
        } catch (error) {
            console.warn('Cannot read selected order:', error);
        }

        return defaultOrder;
    }

    const order = loadSelectedOrder();

    document.getElementById('pageOrderNumber').textContent =
        order.number;

    document.getElementById('invoiceOrderNumber').textContent =
        order.number;

    document.getElementById('invoiceOrderDate').textContent =
        order.date;

    document.getElementById('invoiceCustomerName').textContent =
        order.customer;

    document.getElementById('invoiceStaffName').textContent =
        order.staff;

    const defaultItems = order.number === 'O001'
        ? [{
            num: 'P001',
            name: 'Protein Shaker Bottle - Model 1',
            price: 25,
            quantity: 1
        }]
        : [];

    function loadInvoiceItems() {
        const key = 'pt1_items_' + order.number;

        try {
            const saved = sessionStorage.getItem(key);

            if (saved !== null) {
                const parsed = JSON.parse(saved);

                if (Array.isArray(parsed)) {
                    return parsed;
                }
            }
        } catch (error) {
            console.warn('Cannot read invoice items:', error);
        }

        return defaultItems;
    }

    const invoiceItems = loadInvoiceItems();
    const tbody = document.getElementById('invoiceItemsBody');

    function addCell(row, value, className = '') {
        const cell = row.insertCell();
        cell.textContent = value;
        cell.className = className;
        return cell;
    }

    function displayInvoice() {
        tbody.textContent = '';

        let grandTotal = 0;

        invoiceItems.forEach((item, index) => {
            const price = Number(item.price);
            const quantity = Number(item.quantity);

            if (
                !Number.isFinite(price) ||
                price < 0 ||
                !Number.isSafeInteger(quantity) ||
                quantity < 1
            ) {
                return;
            }

            const total = price * quantity;
            grandTotal += total;

            const row = tbody.insertRow();

            addCell(row, index + 1);
            addCell(row, item.num);
            addCell(row, item.name);
            addCell(row, price.toFixed(2), 'text-end');
            addCell(row, quantity, 'text-center');
            addCell(row, total.toFixed(2), 'text-end');
        });

        if (tbody.rows.length === 0) {
            const row = tbody.insertRow();
            const cell = row.insertCell();

            cell.colSpan = 6;
            cell.className = 'text-center text-muted py-3';
            cell.textContent = 'No products in this order.';
        }

        document.getElementById('invoiceGrandTotal').textContent =
            'RM ' + grandTotal.toFixed(2);
    }

    displayInvoice();
})();
</script>

<?php
$content = ob_get_clean();
require_once 'layout.php';
?>
