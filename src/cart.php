<?php
require_once 'init.php';
require_once 'admin/mongo_connect.php';
$current_lang = $_SESSION['lang'] ?? 'en';
$cart_items = $_SESSION['cart'] ?? [];
$products_in_cart = [];
$total_price = 0;

if (!empty($cart_items)) {
    $product_ids = array_keys($cart_items);
    $object_ids = array_map(function($id) {
        return new MongoDB\BSON\ObjectId($id);
    }, $product_ids);

    $products = $productsCollection->find(['_id' => ['$in' => $object_ids]]);
    
    foreach ($products as $product) {
        $id = (string)$product['_id'];
        $product['quantity'] = $cart_items[$id];
        $products_in_cart[] = $product;
        $total_price += $product['price'] * $product['quantity'];
    }
}

include 'templates/header.php';
?>
<div class="content-with-columns">
<div class="page-container">
    <h1><?php echo t('MERCH_SHOPPING_CART'); ?></h1>
    <?php if (empty($products_in_cart)): ?>
        <p><?php echo t('MERCH_EMPTY_CART'); ?></p>
        <a href="/merch.php" class="btn-buy"><?php echo t('MERCH_CONTINUE_SHOPPING'); ?></a>
    <?php else: ?>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th></th> <!-- Пустой заголовок для колонки с кнопкой -->
                </tr>
            </thead>
            <tbody>
            <?php foreach ($products_in_cart as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['name'][$current_lang]); ?></td>
                    <td><?php echo format_price($item['price']); ?></td>
                    <td><?php echo format_price($item['price'] * $item['quantity']); ?></td>
                    <td>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                    
                    <td>
                        <form action="remove_from_cart.php" method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $item['_id']; ?>">
                            <button type="submit" class="remove-link">Remove</button>
                        </form>
                    </td>
                    
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <h3>Total: <?php echo format_price($total_price); ?></h3>
        <a href="checkout.php" class="btn-buy"><?php echo t('MERCH_CHECKOUT'); ?></a>
    <?php endif; ?>
</div>
</div>
<?php include 'templates/footer.php'; ?>