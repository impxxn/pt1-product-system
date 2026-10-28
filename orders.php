
<?php
// PT1 - ORDERS MANAGEMENT
// Dummy data + sessionStorage integration

$orders = [
    [
        'num' => 'O001',
        'date' => '2026-10-03',
        'staff_num' => 'S001',
        'staff_name' => 'Jane Smith',
        'customer_num' => 'C001',
        'customer_name' => 'Alice Johnson'
    ]
];

$staffs = [
    ['num' => 'S001', 'name' => 'Jane Smith']
];

$customers = [
    ['num' => 'C001', 'name' => 'Alice Johnson']
];

ob_start();
?>

<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <h2 class="mb-1">
            <i class="bi bi-cart-check text-primary me-2"></i>
            Orders Management
        </h2>
        <p class="text-muted mb-0">Manage customer orders</p>
    </div>
    <span class="badge bg-primary fs-6" id="headerCount">1 Order</span>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Order Form</h5>
    </div>

    <div class="card-body">
        <form id="orderForm">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="orderNum" class="form-label">Order Number</label>
                    <input type="text" class="form-control"
                           id="orderNum" name="order_num"
                           placeholder="Example: O002" required>
                </div>

                <div class="col-md-6">
                    <label for="orderDate" class="form-label">Order Date</label>
                    <input type="date" class="form-control"
                           id="orderDate" name="order_date" required>
                </div>

                <div class="col-md-6">
                    <label for="staffSelect" class="form-label">Staff</label>
                    <select class="form-select" id="staffSelect"
                            name="staff_num" required>
                        <option value="">-- Select Staff --</option>
                        <?php foreach ($staffs as $staff): ?>
                            <option
                                value="<?= htmlspecialchars($staff['num'], ENT_QUOTES, 'UTF-8') ?>"
                                data-name="<?= htmlspecialchars($staff['name'], ENT_QUOTES, 'UTF-8') ?>">
                                <?= htmlspecialchars($staff['num'] . ' - ' . $staff['name'], ENT_QUOTES, 'UTF-8') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="customerSelect" class="form-label">Customer</label>
                    <select class="form-select" id="customerSelect"
                            name="customer_num" required>
                        <option value="">-- Select Customer --</option>
                        <?php foreach ($customers as $customer): ?>
                            <option
                                value="<?= htmlspecialchars($customer['num'], ENT_QUOTES, 'UTF-8') ?>"
                                data-name="<?= htmlspecialchars($customer['name'], ENT_QUOTES, 'UTF-8') ?>">
                                <?= htmlspecialchars($customer['num'] . ' - ' . $customer['name'], ENT_QUOTES, 'UTF-8') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary"
                            id="saveOrderBtn">
                        Add Order
                    </button>
                    <button type="reset" class="btn btn-secondary">Clear</button>
                </div>
            </div>
        </form>

        <div id="orderMessage" class="mt-3"></div>

        <p class="text-muted small mt-2 mb-0">
            Demo only. Orders are saved temporarily in this browser tab.
        </p>
    </div>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Order List</h5>
        <span class="badge bg-light text-dark" id="orderCount">1 Order</span>
    </div>

    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="search" id="searchOrder"
                       class="form-control"
                       placeholder="Search order, date, staff or customer...">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Order Number</th>
                        <th>Order Date</th>
                        <th>Staff</th>
                        <th>Customer</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="orderTableBody"></tbody>
            </table>
        </div>

        <p class="text-center text-muted d-none" id="noOrdersMessage">
            No matching orders found.
        </p>
    </div>
</div>

<script>
(() => {
    const STORAGE_KEY = 'pt1_orders';

    const defaultOrders = <?= json_encode(
        $orders,
        JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT
    ) ?>;

    const form = document.getElementById('orderForm');
    const tbody = document.getElementById('orderTableBody');
    const numInput = document.getElementById('orderNum');
    const dateInput = document.getElementById('orderDate');
    const staffSelect = document.getElementById('staffSelect');
    const customerSelect = document.getElementById('customerSelect');
    const saveBtn = document.getElementById('saveOrderBtn');
    const searchInput = document.getElementById('searchOrder');
    const messageBox = document.getElementById('orderMessage');

    let editingNumber = null;

    function readOrders() {
        try {
            const saved = sessionStorage.getItem(STORAGE_KEY);
            if (saved !== null) {
                const data = JSON.parse(saved);
                if (Array.isArray(data)) return data;
            }
        } catch (error) {
            console.warn('Cannot read orders:', error);
        }
        return structuredClone(defaultOrders);
    }

    let orders = readOrders();

    function saveOrders() {
        sessionStorage.setItem(STORAGE_KEY, JSON.stringify(orders));
    }

    function showMessage(text, type = 'success') {
        messageBox.textContent = '';
        const alert = document.createElement('div');
        alert.className = 'alert alert-' + type;
        alert.textContent = text;
        messageBox.appendChild(alert);
    }

    function makeCell(row, value) {
        const cell = row.insertCell();
        cell.textContent = value;
        return cell;
    }

    function makeButton(label, className, callback) {
        const button = document.createElement('button');
        button.type = 'button';
        button.className = className + ' btn-sm me-1 mb-1';
        button.textContent = label;
        button.addEventListener('click', callback);
        return button;
    }

    function renderOrders() {
        tbody.textContent = '';

        const keyword = searchInput.value.toLowerCase().trim();
        let visible = 0;

        orders.forEach((order, index) => {
            const searchText = [
                order.num, order.date,
                order.staff_name, order.customer_name
            ].join(' ').toLowerCase();

            if (!searchText.includes(keyword)) return;

            visible++;

            const row = tbody.insertRow();

            makeCell(row, index + 1);
            makeCell(row, order.num);
            makeCell(row, order.date);
            makeCell(row, order.staff_name);
            makeCell(row, order.customer_name);

            const actions = row.insertCell();

            actions.appendChild(makeButton(
                'Details', 'btn btn-info',
                () => openOrder(order, 'orderdetails.php')
            ));

            actions.appendChild(makeButton(
                'Invoice', 'btn btn-success',
                () => openOrder(order, 'invoice.php')
            ));

            actions.appendChild(makeButton(
                'Edit', 'btn btn-warning',
                () => editOrder(order.num)
            ));

            actions.appendChild(makeButton(
                'Delete', 'btn btn-danger',
                () => deleteOrder(order.num)
            ));
        });

        const count = orders.length;
        const label = count + (count === 1 ? ' Order' : ' Orders');

        document.getElementById('headerCount').textContent = label;
        document.getElementById('orderCount').textContent = label;

        document.getElementById('noOrdersMessage')
            .classList.toggle('d-none', visible > 0);
    }

    function openOrder(order, destination) {
        sessionStorage.setItem(
            'pt1_selected_order',
            JSON.stringify({
                number: order.num,
                date: order.date,
                staff: order.staff_name,
                customer: order.customer_name
            })
        );

        sessionStorage.setItem(
            'pt1_active_order_number',
            order.num
        );

        window.location.href = destination;
    }

    function editOrder(number) {
        const order = orders.find(item => item.num === number);
        if (!order) return;

        editingNumber = number;
        numInput.value = order.num;
        dateInput.value = order.date;
        staffSelect.value = order.staff_num;
        customerSelect.value = order.customer_num;

        saveBtn.textContent = 'Update Order';
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function deleteOrder(number) {
        if (!confirm('Delete Order ' + number + '?')) return;

        orders = orders.filter(order => order.num !== number);
        saveOrders();

        sessionStorage.removeItem('pt1_items_' + number);

        if (editingNumber === number) {
            form.reset();
        }

        renderOrders();
        showMessage('Order deleted successfully.');
    }

    form.addEventListener('submit', event => {
        event.preventDefault();

        const number = numInput.value.trim();
        const date = dateInput.value;
        const staffNumber = staffSelect.value;
        const customerNumber = customerSelect.value;

        if (!number || !date || !staffNumber || !customerNumber) {
            showMessage('Please complete all fields.', 'danger');
            return;
        }

        const duplicate = orders.some(order =>
            order.num.toLowerCase() === number.toLowerCase() &&
            order.num !== editingNumber
        );

        if (duplicate) {
            showMessage('Order number already exists.', 'danger');
            return;
        }

        const newOrder = {
            num: number,
            date: date,
            staff_num: staffNumber,
            staff_name: staffSelect.selectedOptions[0].dataset.name,
            customer_num: customerNumber,
            customer_name: customerSelect.selectedOptions[0].dataset.name
        };

        if (editingNumber !== null) {
            const index = orders.findIndex(
                order => order.num === editingNumber
            );

            if (index !== -1) {
                if (editingNumber !== number) {
                    const oldKey = 'pt1_items_' + editingNumber;
                    const newKey = 'pt1_items_' + number;
                    const oldItems = sessionStorage.getItem(oldKey);

                    if (oldItems !== null) {
                        sessionStorage.setItem(newKey, oldItems);
                        sessionStorage.removeItem(oldKey);
                    }
                }

                orders[index] = newOrder;
            }

            showMessage('Order updated successfully.');
        } else {
            orders.push(newOrder);
            showMessage('Order added successfully.');
        }

        saveOrders();
        form.reset();
        renderOrders();
    });

    form.addEventListener('reset', () => {
        editingNumber = null;
        saveBtn.textContent = 'Add Order';
    });

    searchInput.addEventListener('input', renderOrders);

    renderOrders();
})();
</script>

<?php
$content = ob_get_clean();
require_once 'layout.php';
?>
