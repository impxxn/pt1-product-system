
<?php
// PT1 - ORDER DETAILS
// 30 Protein Shaker Bottle Models
// Per-order temporary storage

function findShakerImage($number)
{
    $extensions = [
        'jpg', 'jpeg', 'png', 'webp',
        'JPG', 'JPEG', 'PNG', 'WEBP'
    ];

    foreach ($extensions as $ext) {
        $file = 'model' . $number . '.' . $ext;

        if (is_file(__DIR__ . '/images/' . $file)) {
            return 'images/' . $file;
        }
    }

    return '';
}

$products = [];

for ($i = 1; $i <= 30; $i++) {
    $products[] = [
        'num' => 'P' . str_pad($i, 3, '0', STR_PAD_LEFT),
        'name' => 'Protein Shaker Bottle - Model ' . $i,
        'price' => 25.00,
        'image' => findShakerImage($i)
    ];
}

ob_start();
?>

<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h2 class="mb-1">
            <i class="bi bi-receipt text-primary me-2"></i>
            Order Details
        </h2>
        <p class="text-muted mb-0" id="orderHeading">
            Manage products for Order O001
        </p>
    </div>

    <a href="orders.php" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i>
        Back to Orders
    </a>
</div>

<!-- ORDER INFORMATION -->
<div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Order Information</h5>
    </div>

    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label fw-bold">Order Number</label>
                <input type="text" class="form-control"
                       id="displayOrderNum" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label fw-bold">Order Date</label>
                <input type="date" class="form-control"
                       id="displayOrderDate" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label fw-bold">Staff</label>
                <input type="text" class="form-control"
                       id="displayStaff" readonly>
            </div>

            <div class="col-md-3">
                <label class="form-label fw-bold">Customer</label>
                <input type="text" class="form-control"
                       id="displayCustomer" readonly>
            </div>
        </div>
    </div>
</div>

<!-- ADD PRODUCT -->
<div class="card shadow-sm mb-4">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0">Add Product to Order</h5>
    </div>

    <div class="card-body">
        <form id="addProductForm">
            <div class="row g-3 align-items-end">
                <div class="col-md-6">
                    <label for="productSelect" class="form-label">
                        Select Product
                    </label>

                    <select id="productSelect"
                            class="form-select" required>
                        <?php foreach ($products as $product): ?>
                            <option
                                value="<?= htmlspecialchars($product['num'], ENT_QUOTES, 'UTF-8') ?>"
                                data-name="<?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?>"
                                data-price="<?= $product['price'] ?>"
                                data-image="<?= htmlspecialchars($product['image'], ENT_QUOTES, 'UTF-8') ?>">
                                <?= htmlspecialchars($product['num'] . ' - ' . $product['name'], ENT_QUOTES, 'UTF-8') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="productQuantity" class="form-label">
                        Quantity
                    </label>
                    <input type="number" id="productQuantity"
                           class="form-control" min="1"
                           step="1" value="1" required>
                </div>

                <div class="col-md-3">
                    <button type="submit" class="btn btn-success w-100">
                        <i class="bi bi-plus-lg me-1"></i>
                        Add Product
                    </button>
                </div>
            </div>
        </form>

        <div class="d-flex align-items-center gap-3 mt-4">
            <img id="productPreview" alt="Selected product"
                 class="img-thumbnail"
                 style="width:100px;height:100px;object-fit:contain;">

            <div id="noImagePreview"
                 class="border rounded bg-light text-muted d-none align-items-center justify-content-center"
                 style="width:100px;height:100px;font-size:12px;">
                No Image
            </div>

            <div>
                <h6 id="previewName" class="mb-1"></h6>
                <p class="text-muted mb-0">
                    Unit Price:
                    <strong id="previewPrice">RM 25.00</strong>
                </p>
            </div>
        </div>

        <div id="orderMessage" class="mt-3"></div>
    </div>
</div>

<!-- ORDER ITEMS -->
<div class="card shadow-sm mb-4">
    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">Products in Order</h5>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
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

                <tbody id="orderItemsBody"></tbody>
            </table>
        </div>

        <p id="emptyOrderMessage"
           class="text-center text-muted d-none">
            No products in this order.
        </p>

        <div class="text-end mt-3">
            <h4>
                Grand Total:
                <span class="text-success" id="grandTotal">
                    RM 0.00
                </span>
            </h4>
        </div>

        <hr>

        <div class="d-flex flex-wrap gap-2">
            <a href="orders.php" class="btn btn-secondary">
                Back to Orders
            </a>

            <button type="button" id="viewInvoiceBtn"
                    class="btn btn-primary">
                <i class="bi bi-printer me-1"></i>
                View Invoice
            </button>
        </div>

        <p class="text-muted small mt-3 mb-0">
            Demo only. Products are saved temporarily
            for each order in this browser tab.
        </p>
    </div>
</div>

<script>
(() => {
    const products = <?= json_encode(
        $products,
        JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT
    ) ?>;

    const defaultOrder = {
        number: 'O001',
        date: '2026-10-03',
        staff: 'Jane Smith',
        customer: 'Alice Johnson'
    };

    function getSelectedOrder() {
        try {
            const saved = sessionStorage.getItem('pt1_selected_order');
            const order = saved ? JSON.parse(saved) : null;

            if (order && typeof order.number === 'string') {
                return order;
            }
        } catch (error) {
            console.warn('Invalid order data:', error);
        }

        return defaultOrder;
    }

    const order = getSelectedOrder();
    const storageKey = 'pt1_items_' + order.number;

    document.getElementById('displayOrderNum').value = order.number;
    document.getElementById('displayOrderDate').value = order.date;
    document.getElementById('displayStaff').value = order.staff;
    document.getElementById('displayCustomer').value = order.customer;

    document.getElementById('orderHeading').textContent =
        'Manage products for Order ' + order.number;

    const productSelect = document.getElementById('productSelect');
    const quantityInput = document.getElementById('productQuantity');
    const tbody = document.getElementById('orderItemsBody');
    const messageBox = document.getElementById('orderMessage');

    const defaultItems = order.number === 'O001'
        ? [{
            num: 'P001',
            name: 'Protein Shaker Bottle - Model 1',
            price: 25,
            quantity: 1,
            image: products[0].image
        }]
        : [];

    function loadItems() {
        try {
            const saved = sessionStorage.getItem(storageKey);

            if (saved !== null) {
                const parsed = JSON.parse(saved);
                if (Array.isArray(parsed)) return parsed;
            }
        } catch (error) {
            console.warn('Cannot load order items:', error);
        }

        return structuredClone(defaultItems);
    }

    let items = loadItems();

    function saveItems() {
        sessionStorage.setItem(storageKey, JSON.stringify(items));
    }

    function showMessage(text, type = 'success') {
        messageBox.textContent = '';
        const alert = document.createElement('div');
        alert.className = 'alert alert-' + type;
        alert.textContent = text;
        messageBox.appendChild(alert);
    }

    function money(value) {
        return Number(value).toFixed(2);
    }

    function addCell(row, value) {
        const cell = row.insertCell();
        cell.textContent = value;
        return cell;
    }

    function renderItems() {
        tbody.textContent = '';
        let grandTotal = 0;

        items.forEach((item, index) => {
            const total = item.price * item.quantity;
            grandTotal += total;

            const row = tbody.insertRow();

            addCell(row, index + 1);

            const imageCell = row.insertCell();

            if (item.image) {
                const img = document.createElement('img');
                img.src = item.image;
                img.alt = item.name;
                img.className = 'img-thumbnail';
                img.style.width = '70px';
                img.style.height = '70px';
                img.style.objectFit = 'contain';
                imageCell.appendChild(img);
            } else {
                imageCell.textContent = 'No Image';
            }

            addCell(row, item.num);
            addCell(row, item.name);
            addCell(row, money(item.price));
            addCell(row, item.quantity);
            addCell(row, money(total));

            const actions = row.insertCell();

            const editBtn = document.createElement('button');
            editBtn.type = 'button';
            editBtn.className = 'btn btn-warning btn-sm me-1 mb-1';
            editBtn.textContent = 'Edit';
            editBtn.addEventListener('click', () => editQuantity(item.num));

            const deleteBtn = document.createElement('button');
            deleteBtn.type = 'button';
            deleteBtn.className = 'btn btn-danger btn-sm mb-1';
            deleteBtn.textContent = 'Delete';
            deleteBtn.addEventListener('click', () => deleteItem(item.num));

            actions.appendChild(editBtn);
            actions.appendChild(deleteBtn);
        });

        document.getElementById('grandTotal').textContent =
            'RM ' + money(grandTotal);

        document.getElementById('emptyOrderMessage')
            .classList.toggle('d-none', items.length > 0);
    }

    function updatePreview() {
        const selected = productSelect.selectedOptions[0];
        if (!selected) return;

        document.getElementById('previewName').textContent =
            selected.dataset.name;

        document.getElementById('previewPrice').textContent =
            'RM ' + money(selected.dataset.price);

        const img = document.getElementById('productPreview');
        const fallback = document.getElementById('noImagePreview');

        if (selected.dataset.image) {
            img.src = selected.dataset.image;
            img.classList.remove('d-none');
            fallback.classList.add('d-none');
            fallback.classList.remove('d-flex');
        } else {
            img.removeAttribute('src');
            img.classList.add('d-none');
            fallback.classList.remove('d-none');
            fallback.classList.add('d-flex');
        }
    }

    document.getElementById('addProductForm')
        .addEventListener('submit', event => {
            event.preventDefault();

            const selected = productSelect.selectedOptions[0];
            const quantity = Number(quantityInput.value);

            if (!Number.isSafeInteger(quantity) || quantity < 1) {
                showMessage('Enter a valid quantity.', 'danger');
                return;
            }

            const existing = items.find(
                item => item.num === selected.value
            );

            if (existing) {
                existing.quantity += quantity;
            } else {
                items.push({
                    num: selected.value,
                    name: selected.dataset.name,
                    price: Number(selected.dataset.price),
                    quantity: quantity,
                    image: selected.dataset.image
                });
            }

            saveItems();
            renderItems();
            quantityInput.value = 1;

            showMessage('Product added successfully.');
        });

    function editQuantity(number) {
        const item = items.find(product => product.num === number);
        if (!item) return;

        const answer = prompt('Enter new quantity:', item.quantity);
        if (answer === null) return;

        const quantity = Number(answer);

        if (!Number.isSafeInteger(quantity) || quantity < 1) {
            showMessage('Quantity must be a positive whole number.', 'danger');
            return;
        }

        item.quantity = quantity;
        saveItems();
        renderItems();

        showMessage('Quantity updated successfully.');
    }

    function deleteItem(number) {
        if (!confirm('Remove this product from the order?')) return;

        items = items.filter(item => item.num !== number);
        saveItems();
        renderItems();

        showMessage('Product removed successfully.');
    }

    document.getElementById('viewInvoiceBtn')
        .addEventListener('click', () => {
            saveItems();

            sessionStorage.setItem(
                'pt1_selected_order',
                JSON.stringify(order)
            );

            window.location.href = 'invoice.php';
        });

    productSelect.addEventListener('change', updatePreview);

    updatePreview();
    renderItems();
})();
</script>

<?php
$content = ob_get_clean();
require_once 'layout.php';
?>
