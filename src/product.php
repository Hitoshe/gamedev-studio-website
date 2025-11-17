<?php
require_once 'init.php';
require_once 'admin/mongo_connect.php';
$current_lang = $_SESSION['lang'] ?? 'en';

// --- Получаем товар по его 'slug' из URL ---
if (!isset($_GET['slug'])) {
    header('Location: /merch.php');
    exit();
}
$slug = $_GET['slug'];
$product = $productsCollection->findOne(['slug' => $slug]);
if (!$product) {
    die("Product not found!");
}

// --- Обработка формы отзыва (НОВАЯ ЛОГИКА) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rating'])) {
    if (!isset($_SESSION['user_id'])) {
        die("You must be logged in to leave a review.");
    }
    $purchased_items = $_SESSION['purchased_items'] ?? [];
    if (!in_array((string)$product['_id'], $purchased_items)) {
        die("You can only review items you have purchased.");
    }
    
    // Ищем существующий отзыв от этого пользователя для этого товара
    $filter = [
        'product_id' => $product['_id'],
        'user_id' => $_SESSION['user_id']
    ];
    
    // Данные для обновления или вставки
    $update = [
        '$set' => [
            'user_email' => $_SESSION['user_email'],
            'rating' => (int)$_POST['rating'],
            'comment' => $_POST['comment'],
            'created_at' => new MongoDB\BSON\UTCDateTime()
        ]
    ];

    // Опция 'upsert' => true создаст новый документ, если он не найден
    $options = ['upsert' => true];

    // Выполняем операцию "обновить или вставить"
    $reviewsCollection->updateOne($filter, $update, $options);

    header('Location: product.php?slug=' . $slug);
    exit();
}

// --- Получаем отзывы с учетом сортировки  ---
$sort_order = $_GET['sort'] ?? 'newest'; // по умолчанию - новые
$sort_options = [];
if ($sort_order === 'highest') {
    $sort_options = ['sort' => ['rating' => -1]];
} elseif ($sort_order === 'lowest') {
    $sort_options = ['sort' => ['rating' => 1]];
} else {
    $sort_options = ['sort' => ['created_at' => -1]];
}

$reviewsCursor = $reviewsCollection->find(['product_id' => $product['_id']], $sort_options);
$reviews = $reviewsCursor->toArray();

// --- Считаем средний рейтинг ---
$total_rating = 0;
$review_count = count($reviews);
$user_can_review = isset($_SESSION['user_id']) && in_array((string)$product['_id'], $_SESSION['purchased_items'] ?? []);

foreach ($reviews as $review) {
    $total_rating += $review['rating'];
}
$average_rating = $review_count > 0 ? $total_rating / $review_count : 0;

include 'templates/header.php';
?>
<div class="content-with-columns">
<div class="page-container product-page">
    
    <div class="product-details-grid">
        <div class="product-image">
            <img src="<?php echo $product['image']; ?>" alt="<?php echo htmlspecialchars($product['name'][$current_lang]); ?>">
        </div>
        <div class="product-info">
            <h1><?php echo htmlspecialchars($product['name'][$current_lang]); ?></h1>
            <p class="price">$<?php echo number_format($product['price'], 2); ?></p>
            <div class="rating-summary">
                <?php for($i = 1; $i <= 5; $i++): ?>
                    <i class="fa-star <?php echo $i <= round($average_rating) ? 'fas' : 'far'; ?>"></i>
                <?php endfor; ?>
                <span>(<?php echo $review_count; ?> reviews)</span>
            </div>
            <p><?php echo htmlspecialchars($product['description'][$current_lang]); ?></p>
            
            <!-- ИЗМЕНЕНО: Добавлена форма с количеством -->
            <form action="add_to_cart.php" method="POST" class="add-to-cart-form">
                <input type="number" name="quantity" value="1" min="1" max="99" class="quantity-input">
                <input type="hidden" name="product_id" value="<?php echo $product['_id']; ?>">
                <button type="submit" class="btn-buy"><?php echo t('MERCH_ADD_TO_CART'); ?></button>
            </form>
        </div>
    </div>

    <!-- Секция отзывов -->
    <div class="reviews-section">
        <h2>Reviews</h2>

        <!-- ИЗМЕНЕНО: Добавлены кнопки сортировки -->
        <div class="sort-options">
            Sort by:
            <a href="?slug=<?php echo $slug; ?>&sort=newest" class="<?php if($sort_order === 'newest') echo 'active'; ?>">Newest</a> |
            <a href="?slug=<?php echo $slug; ?>&sort=highest" class="<?php if($sort_order === 'highest') echo 'active'; ?>">Highest Rated</a> |
            <a href="?slug=<?php echo $slug; ?>&sort=lowest" class="<?php if($sort_order === 'lowest') echo 'active'; ?>">Lowest Rated</a>
        </div>

        <!-- Форма для добавления отзыва (видна только "купившим") -->
        <?php if ($user_can_review): ?>
        <form action="product.php?slug=<?php echo $slug; ?>" method="POST" class="review-form">
            <h4><?php echo t('MERCH_LEAVE_REVIEW'); ?></h4>
            <div class="star-rating">
                <input type="radio" id="5-stars" name="rating" value="5" /><label for="5-stars" class="star">&#9733;</label>
                <input type="radio" id="4-stars" name="rating" value="4" /><label for="4-stars" class="star">&#9733;</label>
                <input type="radio" id="3-stars" name="rating" value="3" /><label for="3-stars" class="star">&#9733;</label>
                <input type="radio" id="2-stars" name="rating" value="2" /><label for="2-stars" class="star">&#9733;</label>
                <input type="radio" id="1-star" name="rating" value="1" required /><label for="1-star" class="star">&#9733;</label>
            </div>
            <textarea name="comment" placeholder="Your review..." rows="4"></textarea>
            <button type="submit" class="btn-buy-small">Submit Review</button>
        </form>
        <?php endif; ?>

        <!-- Список существующих отзывов -->
        <div class="reviews-list">
            <?php foreach ($reviews as $review): ?>
            <div class="review-item">
                <div class="review-header">
                    <strong><?php echo explode('@', $review['user_email'])[0]; ?></strong>
                    <div class="review-stars">
                    <?php for($i = 0; $i < $review['rating']; $i++): ?>
                        <i class="fas fa-star"></i>
                    <?php endfor; ?>
                    </div>
                </div>
                <p><?php echo htmlspecialchars($review['comment']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>
</div>
<?php include 'templates/footer.php'; ?>