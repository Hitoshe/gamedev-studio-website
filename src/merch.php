<?php
require_once 'init.php';
require_once 'admin/mongo_connect.php';

$products = $productsCollection->find();
$current_lang = $_SESSION['lang'] ?? 'en';

// --- СЧИТАЕМ КОЛИЧЕСТВО ТОВАРОВ В КОРЗИНЕ ---
$cart_item_count = 0;
if (!empty($_SESSION['cart'])) {
    $cart_item_count = array_sum($_SESSION['cart']);
}
// ---------------------------------------------

include 'templates/header.php';
?>
<div class="content-with-columns">
    <div class="page-container merch-page">
        
        <!-- ЗАГОЛОВОК С КОРЗИНОЙ -->
        <div class="page-header-with-cart">

            <!-- Переключатель валют слева -->
            <div class="currency-switcher-page">
             <a href="?currency=USD" class="<?php if($current_currency == 'USD') echo 'active'; ?>">$</a>
             <a href="?currency=EUR" class="<?php if($current_currency == 'EUR') echo 'active'; ?>">€</a>
             <a href="?currency=RUB" class="<?php if($current_currency == 'RUB') echo 'active'; ?>">₽</a>
             <a href="?currency=BYN" class="<?php if($current_currency == 'BYN') echo 'active'; ?>">BYN</a>
             <a href="?currency=CNY" class="<?php if($current_currency == 'CNY') echo 'active'; ?>">¥</a>
            </div>

            <h1><?php echo t('HEADER_MERCH'); ?></h1>
            <a href="/cart.php" class="cart-icon-link">
                <i class="fas fa-shopping-cart"></i>
                <?php if ($cart_item_count > 0): ?>
                    <span class="cart-counter"><?php echo $cart_item_count; ?></span>
                <?php endif; ?>
            </a>    
        </div>

        <div class="products-grid">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <a href="product.php?slug=<?php echo $product['slug']; ?>">
                        <div class="product-image-container">
                            <img src="<?php echo $product['image']; ?>" alt="<?php echo htmlspecialchars($product['name'][$current_lang]); ?>">
                        </div>
                        <div class="product-info">
                            <h3><?php echo htmlspecialchars($product['name'][$current_lang]); ?></h3>
                        </div>
                    </a>
                    <div class="product-card-footer">
                    <span class="price"><?php echo format_price($product['price']); ?></span>
                    <form action="add_to_cart.php" method="POST" class="add-to-cart-form">
                    <input type="number" name="quantity" value="1" min="1" max="99" class="quantity-input">
                    <input type="hidden" name="product_id" value="<?php echo $product['_id']; ?>">
                    <button type="submit" class="btn-buy-small"><?php echo t('MERCH_ADD_TO_CART'); ?></button>
                </form>
            </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php include 'templates/footer.php'; ?>