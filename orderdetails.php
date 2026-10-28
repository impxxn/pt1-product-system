
<?php
ob_start();
?>

<!-- Page Title -->
<div class="card shadow border-0 border-start border-5 border-primary mb-4">
    <div class="card-body">
        <h2 class="mb-1">Order Details</h2>
        <p class="text-muted mb-0">
            Order O001 for Alice Johnson
        </p>
    </div>
</div>

<!-- Order Information -->
<div class="card shadow-sm mb-4">
    <div class="card-body">

        <div class="row g-3">

            <div class="col-md-4">
                <small class="text-muted">
                    Order Date
                </small>
                <div>
                    <strong>2026-10-03</strong>
                </div>
            </div>

            <div class="col-md-4">
                <small class="text-muted">
                    Staff
                </small>
                <div>
                    <strong>Jane Smith</strong>
                </div>
            </div>

            <div class="col-md-4">
                <small class="text-muted">
                    Customer
                </small>
                <div>
                    <strong>Alice Johnson</strong>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- Add Product Form -->
<div class="card shadow-sm mb-4">
    <div class="card-body">

        <h5 class="mb-3">
            <i class="bi bi-plus-square text-primary me-2"></i>
            Add Product
        </h5>

        <form id="addProductForm">

            <div class="row g-3">

                <!-- Product -->
                <div class="col-md-6">
                    <label for="product_num" class="form-label">
                        Product
                        <span class="text-danger">*</span>
                    </label>

                    <select name="product_num"
                            id="product_num"
                            class="form-select"
                            required>

                        <option value="">
                            Select Product
                        </option>

                        <option value="P001"
                                data-name="Road Bike"
                                data-price="1200">
                            Road Bike - RM1,200.00
                        </option>

                    </select>
                </div>

                <!-- Quantity -->
                <div class="col-md-6">
                    <label for="quantity" class="form-label">
                        Quantity
                        <span class="text-danger">*</span>
                    </label>

                    <input type="number"
                           name="quantity"
                           id="quantity"
                           class="form-control"
                           value="1"
                           min="1"
                           step="1"
                           required>
                </div>

            </div>

            <hr class="mt-4">

            <button type="submit"
                    class="btn btn-primary">

                <i class="bi bi-plus-square me-1"></i>
                Add Product
            </button>

            <button type="reset"
                    class="btn btn-secondary">

                <i class="bi bi-x-circle me-1"></i>
                Cancel
            </button>

        </form>

    </div>
</div>

<!-- Products in Order -->
<div class="card shadow-sm mb-4">
    <div class="card-body">

        <div class="row align-items-center mb-3">

            <div class="col">
                <h5 class="mb-0">
                    <i class="bi bi-cart-check text-primary me-2"></i>
                    Products in Order
                </h5>
            </div>

            <div class="col-auto">
                <a href="invoice.php"
                   class="btn btn-sm btn-success">

                    <i class="bi bi-receipt me-1"></i>
                    View Invoice
                </a>
            </div>

        </div>

        <div class="table-responsive">

            <table class="table table-striped table-hover">

                <thead class="table-dark">
                    <tr>
                        <th>Product</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody id="orderItems">

                    <!-- Dummy Product -->
                    <tr>
                        <td>Road Bike</td>
                        <td>RM1,200.00</td>
                        <td>1</td>
                        <td>RM1,200.00</td>

                        <td>
                            <button type="button"
                                    class="btn btn-sm btn-warning"
                                    onclick="editProduct(this)"
                                    title="Edit Product">

                                <i class="bi bi-pencil"></i>
                            </button>

                            <button type="button"
                                    class="btn btn-sm btn-danger"
                                    onclick="deleteProduct(this)"
                                    title="Delete Product">

                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>

                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="3"
                            class="text-end fw-bold">
                            Grand Total:
                        </td>

                        <td colspan="2"
                            class="fw-bold"
                            id="grandTotal">
                            RM1,200.00
                        </td>
                    </tr>
                </tfoot>

            </table>

        </div>

        <a href="orders.php"
           class="btn btn-secondary">

            <i class="bi bi-arrow-left me-1"></i>
            Back to Orders
        </a>

    </div>
</div>

<!-- JavaScript for Demo Interaction -->
<script>

// Format price as Malaysian Ringgit
function formatRM(amount) {
    return 'RM' + amount.toLocaleString('en-MY', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

// Recalculate grand total
function calculateGrandTotal() {
    let total = 0;

    document.querySelectorAll('#orderItems tr').forEach(row => {
        const cells = row.querySelectorAll('td');

        if (cells.length >= 4) {
            const price = parseFloat(
                cells[1].textContent.replace(/[^0-9.]/g, '')
            ) || 0;

            const quantity = parseInt(cells[2].textContent) || 0;

            total += price * quantity;
        }
    });

    document.getElementById('grandTotal').textContent = formatRM(total);
}

// Add product
document.getElementById('addProductForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const select = document.getElementById('product_num');
    const quantityInput = document.getElementById('quantity');

    if (!this.checkValidity()) {
        this.reportValidity();
        return;
    }

    const option = select.options[select.selectedIndex];
    const name = option.dataset.name;
    const price = parseFloat(option.dataset.price);
    const quantity = parseInt(quantityInput.value, 10);

    if (!name || !Number.isFinite(price) ||
        !Number.isInteger(quantity) || quantity < 1) {
        return;
    }

    const tbody = document.getElementById('orderItems');
    const row = document.createElement('tr');

    // Create product cells safely
    [name, formatRM(price), quantity, formatRM(price * quantity)]
        .forEach(value => {
            const td = document.createElement('td');
            td.textContent = value;
            row.appendChild(td);
        });

    const actionCell = document.createElement('td');

    const editBtn = document.createElement('button');
    editBtn.type = 'button';
    editBtn.className = 'btn btn-sm btn-warning me-1';
    editBtn.title = 'Edit Product';
    editBtn.innerHTML = '<i class="bi bi-pencil"></i>';
    editBtn.addEventListener('click', () => editProduct(editBtn));

    const deleteBtn = document.createElement('button');
    deleteBtn.type = 'button';
    deleteBtn.className = 'btn btn-sm btn-danger';
    deleteBtn.title = 'Delete Product';
    deleteBtn.innerHTML = '<i class="bi bi-trash"></i>';
    deleteBtn.addEventListener('click', () => deleteProduct(deleteBtn));

    actionCell.append(editBtn, deleteBtn);
    row.appendChild(actionCell);
    tbody.appendChild(row);

    calculateGrandTotal();
    this.reset();
});

// Edit quantity
function editProduct(button) {
    const row = button.closest('tr');
    const cells = row.querySelectorAll('td');

    const currentQuantity = parseInt(cells[2].textContent, 10);
    const input = prompt('Enter new quantity:', currentQuantity);

    if (input === null) return;

    const quantity = Number(input);

    if (!Number.isInteger(quantity) || quantity < 1) {
        alert('Please enter a valid quantity.');
        return;
    }

    const price = parseFloat(
        cells[1].textContent.replace(/[^0-9.]/g, '')
    );

    cells[2].textContent = quantity;
    cells[3].textContent = formatRM(price * quantity);

    calculateGrandTotal();
}

// Delete product
function deleteProduct(button) {
    if (confirm('Are you sure you want to delete this product?')) {
        button.closest('tr').remove();
        calculateGrandTotal();
    }
}

// Initial total
calculateGrandTotal();

</script>

<?php
$content = ob_get_clean();
require_once 'layout.php';
?>
