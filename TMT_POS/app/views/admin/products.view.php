<?php 
$db2 = new Database();
$products2 = $db2->query("SELECT * FROM products WHERE stock <= 10 OR stock = 0");

// Check if any products were returned
if (!empty($products2)): ?>
    <button id="toggleAlerts" class="btn btn-secondary mb-3">Show Notif</button>
    <div id="alertsContainer" style="display: none;">
        <?php foreach ($products2 as $product2): ?>
            <?php if ($product2['stock'] == 0): ?>
                <div class="alert alert-danger" role="alert">
                    <strong>Out of Stock:</strong> Product <?= esc($product2['description']) ?> is out of stock!
                </div>
            <?php else: ?>
                <div class="alert alert-warning" role="alert">
                    <strong>Warning:</strong> Product <?= esc($product2['description']) ?> has reached the critical level! Current stock: <?= esc($product2['stock']) ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

    <input type="text" class="form-control" id="searchInput" placeholder="Search..." style="width: 50%; float: right;">

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var toggleButton = document.getElementById('toggleAlerts');
        var alertsContainer = document.getElementById('alertsContainer');
        var searchInput = document.getElementById('searchInput');
        var tableRows = document.querySelectorAll('.table tbody tr');
        var tableHeader = document.querySelector('.table thead tr');

        // Toggle visibility of alerts
        toggleButton.addEventListener('click', function() {
            if (alertsContainer.style.display === 'none') {
                alertsContainer.style.display = 'block';
                toggleButton.innerText = 'Hide Notif'; // Change button text to "Hide Notif" when alerts are shown
            } else {
                alertsContainer.style.display = 'none';
                toggleButton.innerText = 'Show Notif'; // Change button text to "Show Notif" when alerts are hidden
            }
        });

        // Search functionality
        searchInput.addEventListener('keyup', function(event) {
            var query = event.target.value.toLowerCase();

            tableRows.forEach(function(row, index) {
                if (index !== 0) { // Skip header row
                    var cells = row.getElementsByTagName('td');
                    var found = false;

                    Array.from(cells).forEach(function(cell) {
                        var cellText = cell.textContent.toLowerCase();
                        if (cellText.indexOf(query) > -1) {
                            found = true;
                        }
                    });

                    if (found) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        });
    });
</script>

<br><br>
<th>
    <a href="index.php?pg=product-new">
        <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new</button>
    </a>
    <a href="index.php?pg=barcode.view">
        <button class="btn btn-primary btn-sm"><i class="fa fa-barcode"></i> Barcode</button>
    </a>
</th>

<div class="table-responsive">
    <!-- Table section -->
    <table class="table table-striped table-hover">
        <tr>
            <th>Barcode</th><th>Product</th><th>Category</th><th>Stock</th><th>Price</th><th>Image</th><th>Date</th><th>Encoder</th><th>Action</th>
        </tr>

        <?php if (!empty($products)):?>
            <?php foreach ($products as $product):?>
                <tr>
                    <td><?=esc($product['barcode'])?></td>
                    <td>
                        <a href="index.php?pg=product-edit&id=<?=$product['id']?>">
                            <?=esc($product['description'])?>
                        </a>    
                    </td>
                    <td>
                            <?=esc($product['category'])?>
                    </td>
                    <td>
                        <?php 
                        // Check if stock is exactly 0
                        if ($product['stock'] == 0): ?>
                            <!-- Display in red -->
                            <span style="color: red; font-weight: bold;">
                                <?= esc($product['stock']) ?>
                            </span>
                        <?php elseif ($product['stock'] <= 10): ?>
                            <!-- Display in orange -->
                            <span style="color: orange; font-weight: bold;">
                                <?= esc($product['stock']) ?>
                            </span>
                        <?php else: ?>
                            <?= esc($product['stock']) ?>
                        <?php endif; ?>
                    </td>

                    <td><?=esc($product['amount'])?></td>
                    <td>
                        <img src="<?=crop($product['image'])?>" style="width: 100%;max-width:100px;" >
                    </td>
                    <td><?=date("jS M, Y",strtotime($product['date']))?></td>
                    <td>
                            <?=esc($product['encoder'])?>
                    </td>
                    <td>
                        <a href="index.php?pg=product-edit&id=<?=$product['id']?>">
                            <button class="btn btn-success btn-sm">Edit</button>
                        </a>
                        <a href="index.php?pg=product-delete&id=<?=$product['id']?>">
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach;?>
        <?php endif;?>
        
    </table>
    <?php 
    $pager->display($totalProducts)?>
</div>
