
<?php
// =============================================
// PT1 - PRODUCTS MANAGEMENT
// 30 Protein Shaker Bottle Models
// PHP + Bootstrap 5
// Dummy Data (No Database)
// =============================================

// Function to detect product images automatically
function getProductImage($modelNumber)
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

// Generate 30 products
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
        'image' => getProductImage($i)
    ];
}

// Start page content
ob_start();
?>

<!-- ===================================== -->
<!-- PAGE HEADER -->
<!-- ===================================== -->

<div class="d-flex flex-wrap justify-content-between
            align-items-center gap-3 mb-4">

    <div>
        <h2 class="mb-1">
            <i class="bi bi-box-seam text-primary me-2"></i>
            Products Management
        </h2>

        <p class="text-muted mb-0">
            Protein Shaker Bottle Collection
        </p>
    </div>

    <span class="badge bg-primary fs-6">
        30 Products
    </span>

</div>


<!-- ===================================== -->
<!-- PRODUCT FORM -->
<!-- ===================================== -->

<div class="card shadow-sm mb-4">

    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">
            <i class="bi bi-plus-circle me-2"></i>
            Product Form
        </h5>
    </div>

    <div class="card-body">

        <form id="productForm">

            <div class="row g-3">

                <!-- Product Number -->
                <div class="col-md-4">

                    <label for="productNum" class="form-label">
                        Product Number
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="productNum"
                        name="product_num"
                        placeholder="Example: P031"
                        required
                    >

                </div>

                <!-- Product Name -->
                <div class="col-md-4">

                    <label for="productName" class="form-label">
                        Product Name
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="productName"
                        name="product_name"
                        placeholder="Protein Shaker Bottle"
                        required
                    >

                </div>

                <!-- Product Price -->
                <div class="col-md-4">

                    <label for="productPrice" class="form-label">
                        Price (RM)
                    </label>

                    <input
                        type="number"
                        class="form-control"
                        id="productPrice"
                        name="product_price"
                        min="0.01"
                        step="0.01"
                        placeholder="25.00"
                        required
                    >

                </div>

                <!-- Buttons -->
                <div class="col-12">

                    <button
                        type="submit"
                        class="btn btn-primary"
                        id="saveProductBtn"
                    >
                        <i class="bi bi-plus-lg me-1"></i>
                        Add Product
                    </button>

                    <button
                        type="reset"
                        class="btn btn-secondary"
                    >
                        Clear
                    </button>

                </div>

            </div>

        </form>

        <div id="productMessage" class="mt-3"></div>

        <p class="text-muted small mt-2 mb-0">
            This is a frontend demonstration.
            Product changes are not saved permanently.
        </p>

    </div>

</div>


<!-- ===================================== -->
<!-- PRODUCT LIST -->
<!-- ===================================== -->

<div class="card shadow-sm mb-4">

    <div class="card-header bg-dark text-white
                d-flex flex-wrap justify-content-between
                align-items-center gap-2">

        <h5 class="mb-0">
            <i class="bi bi-list-ul me-2"></i>
            Product List
        </h5>

        <span class="badge bg-light text-dark"
              id="productCount">
            30 Products
        </span>

    </div>

    <div class="card-body">

        <!-- Search -->
        <div class="row mb-3">

            <div class="col-md-6">

                <input
                    type="search"
                    class="form-control"
                    id="searchProduct"
                    placeholder="Search product number or name..."
                >

            </div>

        </div>

        <!-- Responsive Table -->
        <div class="table-responsive">

            <table class="table table-bordered
                          table-striped table-hover
                          align-middle">

                <thead class="table-dark">

                    <tr>
                        <th>No.</th>
                        <th>Image</th>
                        <th>Product Number</th>
                        <th>Product Name</th>
                        <th>Price (RM)</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody id="productTableBody">

                    <?php foreach ($products as $index => $product): ?>

                    <tr>

                        <!-- Number -->
                        <td>
                            <?php echo $index + 1; ?>
                        </td>

                        <!-- Image -->
                        <td class="text-center">

                            <?php if ($product['image'] !== ''): ?>

                                <img
                                    src="<?php
                                        echo htmlspecialchars(
                                            $product['image'],
                                            ENT_QUOTES,
                                            'UTF-8'
                                        );
                                    ?>"
                                    alt="<?php
                                        echo htmlspecialchars(
                                            $product['name'],
                                            ENT_QUOTES,
                                            'UTF-8'
                                        );
                                    ?>"
                                    class="img-thumbnail"
                                    style="
                                        width: 90px;
                                        height: 90px;
                                        object-fit: contain;
                                    "
                                    loading="lazy"
                                >

                            <?php else: ?>

                                <div class="border rounded bg-light
                                            text-muted d-flex
                                            align-items-center
                                            justify-content-center"
                                     style="
                                         width: 90px;
                                         height: 90px;
                                         font-size: 12px;
                                     ">
                                    No Image
                                </div>

                            <?php endif; ?>

                        </td>

                        <!-- Product Number -->
                        <td>
                            <?php echo htmlspecialchars(
                                $product['num'],
                                ENT_QUOTES,
                                'UTF-8'
                            ); ?>
                        </td>

                        <!-- Product Name -->
                        <td>
                            <?php echo htmlspecialchars(
                                $product['name'],
                                ENT_QUOTES,
                                'UTF-8'
                            ); ?>
                        </td>

                        <!-- Price -->
                        <td>
                            <?php echo number_format(
                                $product['price'],
                                2
                            ); ?>
                        </td>

                        <!-- Actions -->
                        <td>

                            <button
                                type="button"
                                class="btn btn-warning btn-sm mb-1"
                                onclick="editProduct(this)"
                            >
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </button>

                            <button
                                type="button"
                                class="btn btn-danger btn-sm mb-1"
                                onclick="deleteProduct(this)"
                            >
                                <i class="bi bi-trash"></i>
                                Delete
                            </button>

                        </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

        <p
            id="noProductsMessage"
            class="text-center text-muted d-none"
        >
            No matching products found.
        </p>

    </div>

</div>


<!-- ===================================== -->
<!-- JAVASCRIPT FUNCTIONS -->
<!-- ===================================== -->

<script>

// Elements
const productForm = document.getElementById('productForm');
const productTableBody = document.getElementById('productTableBody');
const searchProduct = document.getElementById('searchProduct');
const productCount = document.getElementById('productCount');
const productMessage = document.getElementById('productMessage');
const noProductsMessage = document.getElementById('noProductsMessage');
const saveProductBtn = document.getElementById('saveProductBtn');

let editingRow = null;


// Show messages safely
function showMessage(message, type = 'success') {

    productMessage.textContent = '';

    const alertBox = document.createElement('div');

    alertBox.className = 'alert alert-' + type;
    alertBox.textContent = message;

    productMessage.appendChild(alertBox);
}


// Update row numbering and total
function updateNumbers() {

    const rows = productTableBody.querySelectorAll('tr');

    rows.forEach((row, index) => {
        row.cells[0].textContent = index + 1;
    });

    productCount.textContent = rows.length + ' Products';
}


// Search products
function filterProducts() {

    const keyword = searchProduct.value.toLowerCase().trim();

    const rows = productTableBody.querySelectorAll('tr');

    let visibleCount = 0;

    rows.forEach(row => {

        const productNum =
            row.cells[2].textContent.toLowerCase();

        const productName =
            row.cells[3].textContent.toLowerCase();

        const matches =
            productNum.includes(keyword) ||
            productName.includes(keyword);

        row.style.display = matches ? '' : 'none';

        if (matches) {
            visibleCount++;
        }

    });

    noProductsMessage.classList.toggle(
        'd-none',
        visibleCount > 0
    );
}

searchProduct.addEventListener('input', filterProducts);


// Add or update product
productForm.addEventListener('submit', function(event) {

    event.preventDefault();

    const num = document.getElementById('productNum').value.trim();
    const name = document.getElementById('productName').value.trim();
    const price = Number(
        document.getElementById('productPrice').value
    );

    if (!num || !name || !Number.isFinite(price) || price <= 0) {

        showMessage(
            'Please enter valid product details.',
            'danger'
        );

        return;
    }

    const rows = Array.from(
        productTableBody.querySelectorAll('tr')
    );

    // Check duplicate product number
    const duplicate = rows.some(row => {

        return row !== editingRow &&
            row.cells[2].textContent.trim().toLowerCase() ===
            num.toLowerCase();

    });

    if (duplicate) {

        showMessage(
            'Product number already exists.',
            'danger'
        );

        return;
    }

    if (editingRow) {

        // Update existing product
        editingRow.cells[2].textContent = num;
        editingRow.cells[3].textContent = name;
        editingRow.cells[4].textContent = price.toFixed(2);

        const image = editingRow.cells[1].querySelector('img');

        if (image) {
            image.alt = name;
        }

        showMessage('Product updated successfully.');

        editingRow = null;

    } else {

        // Add new product
        const row = productTableBody.insertRow();

        row.insertCell().textContent = '';
        row.insertCell().textContent = 'No Image';
        row.insertCell().textContent = num;
        row.insertCell().textContent = name;
        row.insertCell().textContent = price.toFixed(2);

        const actionCell = row.insertCell();

        actionCell.innerHTML = `
            <button
                type="button"
                class="btn btn-warning btn-sm mb-1"
                onclick="editProduct(this)"
            >
                Edit
            </button>

            <button
                type="button"
                class="btn btn-danger btn-sm mb-1"
                onclick="deleteProduct(this)"
            >
                Delete
            </button>
        `;

        showMessage('Product added successfully.');
    }

    productForm.reset();
    saveProductBtn.textContent = 'Add Product';

    updateNumbers();
    filterProducts();

});


// Edit product
function editProduct(button) {

    const row = button.closest('tr');

    editingRow = row;

    document.getElementById('productNum').value =
        row.cells[2].textContent.trim();

    document.getElementById('productName').value =
        row.cells[3].textContent.trim();

    document.getElementById('productPrice').value =
        row.cells[4].textContent.trim();

    saveProductBtn.textContent = 'Update Product';

    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}


// Delete product
function deleteProduct(button) {

    const row = button.closest('tr');

    const confirmed = confirm(
        'Are you sure you want to delete this product?'
    );

    if (!confirmed) {
        return;
    }

    if (editingRow === row) {

        editingRow = null;
        productForm.reset();
        saveProductBtn.textContent = 'Add Product';
    }

    row.remove();

    updateNumbers();
    filterProducts();

    showMessage('Product deleted successfully.');
}


// Reset edit mode
productForm.addEventListener('reset', function() {

    editingRow = null;
    saveProductBtn.textContent = 'Add Product';

});

</script>


<?php
// Send content to reusable layout
$content = ob_get_clean();

require_once 'layout.php';
?>
