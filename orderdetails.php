
<?php
// =============================================
// PT1 - ORDER DETAILS PAGE
// Protein Shaker Bottle (30 Models)
// PHP + Bootstrap 5
// Dummy Data - No Database
// =============================================

// Find image with supported extensions
function findProductImage($modelNumber)
{
    $extensions = [
        'jpg', 'jpeg', 'png', 'webp',
        'JPG', 'JPEG', 'PNG', 'WEBP'
    ];

    foreach ($extensions as $extension) {

        $fileName = 'model' . $modelNumber . '.' . $extension;

        $fullPath = __DIR__ . '/images/' . $fileName;

        if (is_file($fullPath)) {
            return 'images/' . $fileName;
        }
    }

    return '';
}

// Generate 30 product models
$products = [];

for ($i = 1; $i <= 30; $i++) {

    $productNumber = 'P' . str_pad(
        $i,
        3,
        '0',
        STR_PAD_LEFT
    );

    $products[] = [
        'num' => $productNumber,
        'name' => 'Protein Shaker Bottle - Model ' . $i,
        'price' => 25.00,
        'image' => findProductImage($i)
    ];
}

// Dummy order information
$order = [
    'number' => 'O001',
    'date' => '2026-10-03',
    'staff' => 'Jane Smith',
    'customer' => 'Alice Johnson'
];

// Default order item: Model 1, quantity 1
$defaultItem = $products[0];

ob_start();
?>

<!-- ===================================== -->
<!-- PAGE HEADING -->
<!-- ===================================== -->

<div class="d-flex flex-wrap justify-content-between
            align-items-center gap-2 mb-4">

    <div>
        <h2 class="mb-1">
            <i class="bi bi-receipt text-primary me-2"></i>
            Order Details
        </h2>

        <p class="text-muted mb-0">
            Manage products for Order
            <?php echo htmlspecialchars($order['number']); ?>
        </p>
    </div>

    <a href="orders.php" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i>
        Back to Orders
    </a>

</div>


<!-- ===================================== -->
<!-- ORDER INFORMATION -->
<!-- ===================================== -->

<div class="card shadow-sm mb-4">

    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">
            <i class="bi bi-info-circle me-2"></i>
            Order Information
        </h5>
    </div>

    <div class="card-body">

        <div class="row g-3">

            <div class="col-md-3">
                <label class="form-label fw-bold">
                    Order Number
                </label>

                <input
                    type="text"
                    class="form-control"
                    value="<?php echo htmlspecialchars($order['number']); ?>"
                    readonly
                >
            </div>

            <div class="col-md-3">
                <label class="form-label fw-bold">
                    Order Date
                </label>

                <input
                    type="date"
                    class="form-control"
                    value="<?php echo htmlspecialchars($order['date']); ?>"
                    readonly
                >
            </div>

            <div class="col-md-3">
                <label class="form-label fw-bold">
                    Staff
                </label>

                <input
                    type="text"
                    class="form-control"
                    value="<?php echo htmlspecialchars($order['staff']); ?>"
                    readonly
                >
            </div>

            <div class="col-md-3">
                <label class="form-label fw-bold">
                    Customer
                </label>

                <input
                    type="text"
                    class="form-control"
                    value="<?php echo htmlspecialchars($order['customer']); ?>"
                    readonly
                >
            </div>

        </div>

    </div>
</div>


<!-- ===================================== -->
<!-- ADD PRODUCT FORM -->
<!-- ===================================== -->

<div class="card shadow-sm mb-4">

    <div class="card-header bg-success text-white">
        <h5 class="mb-0">
            <i class="bi bi-cart-plus me-2"></i>
            Add Product to Order
        </h5>
    </div>

    <div class="card-body">

        <form id="addProductForm">

            <div class="row g-3 align-items-end">

                <!-- Product Selection -->
                <div class="col-md-6">

                    <label for="productSelect"
                           class="form-label fw-bold">
                        Select Product
                    </label>

                    <select
                        id="productSelect"
                        name="product_num"
                        class="form-select"
                        required
                    >

                        <?php foreach ($products as $product): ?>

                            <option
                                value="<?php echo htmlspecialchars($product['num'], ENT_QUOTES, 'UTF-8'); ?>"
                                data-name="<?php echo htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8'); ?>"
                                data-price="<?php echo $product['price']; ?>"
                                data-image="<?php echo htmlspecialchars($product['image'], ENT_QUOTES, 'UTF-8'); ?>"
                            >
                                <?php
                                    echo htmlspecialchars(
                                        $product['num'] . ' - ' . $product['name'],
                                        ENT_QUOTES,
                                        'UTF-8'
                                    );
                                ?>
                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <!-- Quantity -->
                <div class="col-md-3">

                    <label for="productQuantity"
                           class="form-label fw-bold">
                        Quantity
                    </label>

                    <input
                        type="number"
                        id="productQuantity"
                        name="quantity"
                        class="form-control"
                        min="1"
                        step="1"
                        value="1"
                        required
                    >

                </div>

                <!-- Add Button -->
                <div class="col-md-3">

                    <button
                        type="submit"
                        class="btn btn-success w-100"
                    >
                        <i class="bi bi-plus-lg me-1"></i>
                        Add Product
                    </button>

                </div>

            </div>

        </form>

        <!-- Product Preview -->
        <div class="row align-items-center g-3 mt-3">

            <div class="col-auto">

                <img
                    id="productPreview"
                    src=""
                    alt="Selected Product"
                    class="img-thumbnail"
                    style="
                        width: 110px;
                        height: 110px;
                        object-fit: contain;
                    "
                >

                <div
                    id="noImagePreview"
                    class="border rounded bg-light
                           text-muted d-none
                           align-items-center
                           justify-content-center"
                    style="
                        width: 110px;
                        height: 110px;
                        font-size: 12px;
                    "
                >
                    No Image
                </div>

            </div>

            <div class="col">

                <h6 id="previewName" class="mb-1"></h6>

                <p class="text-muted mb-0">
                    Unit Price:
                    <strong id="previewPrice">
                        RM 0.00
                    </strong>
                </p>

            </div>

        </div>

        <div id="orderMessage" class="mt-3"></div>

    </div>
</div>


<!-- ===================================== -->
<!-- PRODUCTS IN ORDER -->
<!-- ===================================== -->

<div class="card shadow-sm mb-4">

    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">
            <i class="bi bi-list-check me-2"></i>
            Products in Order
        </h5>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered
                          table-striped align-middle">

                <thead class="table-dark">

                    <tr>
                        <th>No.</th>
                        <th>Image</th>
                        <th>Product Number</th>
                        <th>Product Name</th>
                        <th>Unit Price (RM)</th>
                        <th>Quantity</th>
                        <th>Total (RM)</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody id="orderItemsBody">

                    <tr data-product-num="<?php echo htmlspecialchars($defaultItem['num'], ENT_QUOTES, 'UTF-8'); ?>">

                        <td class="row-number">1</td>

                        <td class="item-image">

                            <?php if ($defaultItem['image'] !== ''): ?>

                                <img
                                    src="<?php echo htmlspecialchars($defaultItem['image'], ENT_QUOTES, 'UTF-8'); ?>"
                                    alt="Model 1"
                                    class="img-thumbnail"
                                    style="
                                        width: 70px;
                                        height: 70px;
                                        object-fit: contain;
                                    "
                                >

                            <?php else: ?>

                                <span class="text-muted small">
                                    No Image
                                </span>

                            <?php endif; ?>

                        </td>

                        <td class="item-num">
                            <?php echo htmlspecialchars($defaultItem['num']); ?>
                        </td>

                        <td class="item-name">
                            <?php echo htmlspecialchars($defaultItem['name']); ?>
                        </td>

                        <td class="item-price" data-price="25">
                            25.00
                        </td>

                        <td class="item-quantity">1</td>

                        <td class="item-total">25.00</td>

                        <td>

                            <button
                                type="button"
                                class="btn btn-warning btn-sm mb-1"
                                onclick="editQuantity(this)"
                            >
                                Edit
                            </button>

                            <button
                                type="button"
                                class="btn btn-danger btn-sm mb-1"
                                onclick="deleteItem(this)"
                            >
                                Delete
                            </button>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

        <!-- Grand Total -->
        <div class="d-flex justify-content-end mt-3">

            <div class="text-end">

                <h4>
                    Grand Total:
                    <span class="text-success" id="grandTotal">
                        RM 25.00
                    </span>
                </h4>

            </div>

        </div>

        <hr>

        <!-- Navigation Buttons -->
        <div class="d-flex flex-wrap gap-2">

            <a href="orders.php" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i>
                Back to Orders
            </a>

            <a href="invoice.php" class="btn btn-primary">
                <i class="bi bi-printer me-1"></i>
                View Invoice
            </a>

        </div>

        <p class="text-muted small mt-3 mb-0">
            Note: This is a frontend demonstration.
            Changes to this order are not saved permanently.
        </p>

    </div>
</div>


<!-- ===================================== -->
<!-- JAVASCRIPT -->
<!-- ===================================== -->

<script>

// DOM elements
const productSelect = document.getElementById('productSelect');
const productQuantity = document.getElementById('productQuantity');
const addProductForm = document.getElementById('addProductForm');
const orderItemsBody = document.getElementById('orderItemsBody');

const productPreview = document.getElementById('productPreview');
const noImagePreview = document.getElementById('noImagePreview');
const previewName = document.getElementById('previewName');
const previewPrice = document.getElementById('previewPrice');

const grandTotalElement = document.getElementById('grandTotal');
const orderMessage = document.getElementById('orderMessage');


// Format money
function formatMoney(amount) {
    return Number(amount).toFixed(2);
}


// Display feedback
function showOrderMessage(message, type = 'success') {

    orderMessage.textContent = '';

    const alertBox = document.createElement('div');

    alertBox.className = 'alert alert-' + type;
    alertBox.textContent = message;

    orderMessage.appendChild(alertBox);
}


// Update selected product preview
function updateProductPreview() {

    const selected = productSelect.selectedOptions[0];

    if (!selected) {
        return;
    }

    const name = selected.dataset.name;
    const price = Number(selected.dataset.price);
    const image = selected.dataset.image;

    previewName.textContent = name;
    previewPrice.textContent = 'RM ' + formatMoney(price);

    if (image) {

        productPreview.src = image;
        productPreview.classList.remove('d-none');

        noImagePreview.classList.add('d-none');
        noImagePreview.classList.remove('d-flex');

    } else {

        productPreview.removeAttribute('src');
        productPreview.classList.add('d-none');

        noImagePreview.classList.remove('d-none');
        noImagePreview.classList.add('d-flex');
    }
}


// Calculate total for all rows
function updateGrandTotal() {

    const rows = orderItemsBody.querySelectorAll('tr');

    let grandTotal = 0;

    rows.forEach((row, index) => {

        row.querySelector('.row-number').textContent = index + 1;

        const price = Number(
            row.querySelector('.item-price').dataset.price
        );

        const quantity = Number(
            row.querySelector('.item-quantity').textContent
        );

        const total = price * quantity;

        row.querySelector('.item-total').textContent =
            formatMoney(total);

        grandTotal += total;
    });

    grandTotalElement.textContent =
        'RM ' + formatMoney(grandTotal);
}


// Create product image cell
function setProductImage(cell, image, name) {

    cell.textContent = '';

    if (image) {

        const img = document.createElement('img');

        img.src = image;
        img.alt = name;
        img.className = 'img-thumbnail';

        img.style.width = '70px';
        img.style.height = '70px';
        img.style.objectFit = 'contain';

        cell.appendChild(img);

    } else {

        const span = document.createElement('span');

        span.className = 'text-muted small';
        span.textContent = 'No Image';

        cell.appendChild(span);
    }
}


// Add selected product to order
addProductForm.addEventListener('submit', function(event) {

    event.preventDefault();

    const selected = productSelect.selectedOptions[0];

    const num = selected.value;
    const name = selected.dataset.name;
    const price = Number(selected.dataset.price);
    const image = selected.dataset.image;

    const quantity = Number(productQuantity.value);

    if (!Number.isSafeInteger(quantity) || quantity < 1) {

        showOrderMessage(
            'Please enter a valid quantity.',
            'danger'
        );

        return;
    }

    const rows = Array.from(
        orderItemsBody.querySelectorAll('tr')
    );

    // If product already exists, increase quantity
    const existingRow = rows.find(row => {
        return row.dataset.productNum === num;
    });

    if (existingRow) {

        const currentQuantity = Number(
            existingRow.querySelector('.item-quantity').textContent
        );

        existingRow.querySelector('.item-quantity').textContent =
            currentQuantity + quantity;

        showOrderMessage(
            name + ' quantity updated successfully.'
        );

    } else {

        const row = document.createElement('tr');

        row.dataset.productNum = num;

        // Number
        const numberCell = row.insertCell();
        numberCell.className = 'row-number';

        // Image
        const imageCell = row.insertCell();
        imageCell.className = 'item-image';

        setProductImage(imageCell, image, name);

        // Product number
        const numCell = row.insertCell();
        numCell.className = 'item-num';
        numCell.textContent = num;

        // Product name
        const nameCell = row.insertCell();
        nameCell.className = 'item-name';
        nameCell.textContent = name;

        // Unit price
        const priceCell = row.insertCell();
        priceCell.className = 'item-price';
        priceCell.dataset.price = price;
        priceCell.textContent = formatMoney(price);

        // Quantity
        const quantityCell = row.insertCell();
        quantityCell.className = 'item-quantity';
        quantityCell.textContent = quantity;

        // Total
        const totalCell = row.insertCell();
        totalCell.className = 'item-total';
        totalCell.textContent = formatMoney(price * quantity);

        // Actions
        const actionCell = row.insertCell();

        actionCell.innerHTML = `
            <button
                type="button"
                class="btn btn-warning btn-sm mb-1"
                onclick="editQuantity(this)"
            >
                Edit
            </button>

            <button
                type="button"
                class="btn btn-danger btn-sm mb-1"
                onclick="deleteItem(this)"
            >
                Delete
            </button>
        `;

        orderItemsBody.appendChild(row);

        showOrderMessage(
            name + ' added successfully.'
        );
    }

    updateGrandTotal();

    productQuantity.value = 1;
});


// Edit quantity
function editQuantity(button) {

    const row = button.closest('tr');

    const quantityCell = row.querySelector('.item-quantity');

    const currentQuantity = Number(quantityCell.textContent);

    const input = prompt(
        'Enter new quantity:',
        currentQuantity
    );

    if (input === null) {
        return;
    }

    const newQuantity = Number(input);

    if (!Number.isSafeInteger(newQuantity) || newQuantity < 1) {

        showOrderMessage(
            'Quantity must be a positive whole number.',
            'danger'
        );

        return;
    }

    quantityCell.textContent = newQuantity;

    updateGrandTotal();

    showOrderMessage(
        'Product quantity updated successfully.'
    );
}


// Delete product
function deleteItem(button) {

    const row = button.closest('tr');

    const productName =
        row.querySelector('.item-name').textContent;

    const confirmed = confirm(
        'Remove ' + productName + ' from this order?'
    );

    if (!confirmed) {
        return;
    }

    row.remove();

    updateGrandTotal();

    showOrderMessage(
        'Product removed successfully.'
    );
}


// Initialize page
productSelect.addEventListener('change', updateProductPreview);

updateProductPreview();
updateGrandTotal();

</script>


<?php
$content = ob_get_clean();
require_once 'layout.php';
?>
