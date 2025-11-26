<?php
require_once '../init.php';
// Защита страницы: только для администраторов
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header('Location: /login.php');
    exit();
}
// Подключаем соединение с MongoDB
require_once 'mongo_connect.php';
include '../templates/header.php';

// --- ЛОГИКА ДЛЯ ВЫПОЛНЕНИЯ ЗАПРОСОВ ---
$results = [];
$query_name = $_GET['query'] ?? ''; // Получаем имя запроса из URL
$dynamic_query_info = ''; // Для хранения текста динамического запроса

// --- Обработка ДИНАМИЧЕСКОЙ ФОРМЫ ---
if ($query_name === 'dynamic_filter') {
    $filter = []; // Фильтр по умолчанию - пустой
    $options = []; // Опции (сортировка, лимит) по умолчанию - пустые

    // --- 1. Обрабатываем ФИЛЬТРАЦИЮ ---
    if (!empty($_GET['field']) && !empty($_GET['value'])) {
        $field = $_GET['field'];
        $operator = $_GET['operator'];
        $value = $_GET['value'];

        if (in_array($field, ['price', 'stock', 'discounts.regular']) && is_numeric($value)) {
            $value = (float)$value;
        }

        $mongo_operator = '$' . $operator;
        
        if ($operator === 'in') {
            $value = array_map('trim', explode(',', $value));
        }
        
        $filter = [$field => [$mongo_operator => $value]];
    }

    // --- 2. Обрабатываем СОРТИРОВКУ ---
    if (!empty($_GET['sort_field'])) {
        $sort_field = $_GET['sort_field'];
        $sort_order = isset($_GET['sort_order']) ? (int)$_GET['sort_order'] : -1; // -1 по умолчанию
        $options['sort'] = [$sort_field => $sort_order];
    }
    
    // --- 3. Обрабатываем ЛИМИТ ---
    if (!empty($_GET['limit'])) {
        $options['limit'] = (int)$_GET['limit'];
    }

    // Выполняем запрос с собранными фильтром и опциями
    $results = $productsCollection->find($filter, $options)->toArray();
    
    // Формируем строку для отображения
    $dynamic_query_info = 'Filter: ' . json_encode($filter) . ', Options: ' . json_encode($options);
}

// --- СТАТИЧНЫЕ ЗАПРОСЫ (остаются для наглядности) ---

if ($query_name === 'all_products') {
    $results = $productsCollection->find()->toArray();
}
if ($query_name === 'filter_category') {
    $results = $productsCollection->find(['category' => 'Toys'])->toArray();
}
if ($query_name === 'sort_price_desc') {
    $results = $productsCollection->find([], ['sort' => ['price' => -1]])->toArray();
}
if ($query_name === 'limit_2') {
    $results = $productsCollection->find([], ['limit' => 2])->toArray();
}
if ($query_name === 'in_categories') {
    $results = $productsCollection->find(['category' => ['$in' => ['Toys', 'Decor']]])->toArray();
}
if ($query_name === 'count_all') {
    $count = $productsCollection->countDocuments();
    $results = [['Total products' => $count]];
}
if ($query_name === 'count_expensive') {
    $count = $productsCollection->countDocuments(['price' => ['$gt' => 25]]);
    $results = [['Products with price > $25' => $count]];
}
if ($query_name === 'group_by_category') {
    $results = $productsCollection->aggregate([['$group' => ['_id' => '$category', 'count' => ['$sum' => 1]]]])->toArray();
}
if ($query_name === 'avg_price') {
    $results = $productsCollection->aggregate([['$group' => ['_id' => null, 'avgPrice' => ['$avg' => '$price']]]])->toArray();
}
if ($query_name === 'supplier_country') {
    $results = $productsCollection->find(['suppliers.country' => 'USA'])->toArray();
}
if ($query_name === 'has_tag') {
    $results = $productsCollection->find(['tags' => 'new'])->toArray();
}
if ($query_name === 'discount_gt_5') {
    $results = $productsCollection->find(['discounts.regular' => ['$gt' => 5]])->toArray();
}
if ($query_name === 'group_advanced') {
    $results = $productsCollection->aggregate([['$group' => ['_id' => '$category', 'avgPrice' => ['$avg' => '$price'], 'totalStock' => ['$sum' => '$stock']]]])->toArray();
}
if ($query_name === 'top_categories') {
    $results = $productsCollection->aggregate([['$group' => ['_id' => '$category', 'count' => ['$sum' => 1]]], ['$sort' => ['count' => -1]], ['$limit' => 2]])->toArray();
}
if ($query_name === 'pipeline_example') {
    $results = $productsCollection->aggregate([['$match' => ['price' => ['$gt' => 20]]], ['$group' => ['_id' => '$category', 'total' => ['$sum' => '$stock']]], ['$sort' => ['total' => -1]], ['$project' => ['_id' => 0, 'category' => '$_id', 'totalStock' => '$total']]])->toArray();
}
if ($query_name === 'text_search') {
    $results = $productsCollection->find(['$text' => ['$search' => 'plushie']])->toArray();
}

?>
<div class="content-with-columns">
<div class="page-container" style="max-width: 1200px;">
    <h1>Admin: Database Queries</h1>
    <p>This page demonstrates various MongoDB queries.</p>

    <!-- ДИНАМИЧЕСКАЯ ФОРМА -->
    <fieldset style="border: 2px solid var(--accent-color); padding: 1.5rem; margin: 2rem 0; border-radius: 5px;">
    <legend style="padding: 0 0.5rem; font-family: var(--font-main); font-size: 1.2rem;">Dynamic Query Builder</legend>
    <form action="analytics.php" method="GET" style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
        <input type="hidden" name="query" value="dynamic_filter">
        
        <!-- Фильтрация -->
        <select name="field" style="padding: 0.5rem; background-color: var(--surface-color); color: var(--primary-text-color); border: 1px solid #555;">
            <option value="">-- Filter Field --</option>
            <option value="category">category</option>
            <option value="price">price</option>
            <option value="stock">stock</option>
            <option value="tags">tags</option>
            <option value="suppliers.country">suppliers.country</option>
            <option value="discounts.regular">discounts.regular</option>
        </select>

        <select name="operator" style="padding: 0.5rem; background-color: var(--surface-color); color: var(--primary-text-color); border: 1px solid #555;">
            <option value="eq">Equals (=)</option>
            <option value="gt">Greater Than (>)</option>
            <option value="lt">Less Than (<)</option>
            <option value="in">In (comma separated)</option>
        </select>

        <input type="text" name="value" placeholder="Filter Value" style="padding: 0.5rem; flex-grow: 1; background-color: var(--surface-color); color: var(--primary-text-color); border: 1px solid #555;">

        <!-- Сортировка и Лимит -->
        <select name="sort_field" style="padding: 0.5rem; background-color: var(--surface-color); color: var(--primary-text-color); border: 1px solid #555;">
            <option value="">-- Sort Field --</option>
            <option value="price">price</option>
            <option value="stock">stock</option>
            <option value="category">category</option>
        </select>

        <select name="sort_order" style="padding: 0.5rem; background-color: var(--surface-color); color: var(--primary-text-color); border: 1px solid #555;">
            <option value="1">Ascending</option>
            <option value="-1">Descending</option>
        </select>
        
        <input type="number" name="limit" placeholder="Limit" min="1" style="padding: 0.5rem; width: 80px; background-color: var(--surface-color); color: var(--primary-text-color); border: 1px solid #555;">

        <button type="submit" class="btn-buy-small">Run Query</button>
    </form>
</fieldset>

   <!-- Меню со статичными запросами -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-bottom: 2rem;">
        
        <div>
            <h4>Simple Queries</h4>
            <ul style="list-style: none; padding: 0;">
                <li><a href="?query=all_products">1. Select All</a></li>
                <li><a href="?query=filter_category">2. Filter (Category='Toys')</a></li>
                <li><a href="?query=sort_price_desc">3. Sort (Price DESC)</a></li>
                <li><a href="?query=limit_2">4. Limit (2)</a></li>
                <li><a href="?query=in_categories">5. Operator $in (Toys, Decor)</a></li>
            </ul>
        </div>
        
        <div>
            <h4>Aggregation</h4>
            <ul style="list-style: none; padding: 0;">
                <li><a href="?query=count_all">6. Count All</a></li>
                <li><a href="?query=count_expensive">7. Count (Price > $25)</a></li>
                <li><a href="?query=group_by_category">8. Group by Category</a></li>
                <li><a href="?query=avg_price">9. Average Price</a></li>
            </ul>
        </div>

        <div>
            <h4>Complex Queries (Lab #5)</h4>
             <ul style="list-style: none; padding: 0;">
                <li><a href="?query=supplier_country">10. Nested (Supplier from USA)</a></li>
                <li><a href="?query=has_tag">11. Array (Has 'new' tag)</a></li>
                <li><a href="?query=discount_gt_5">12. Sub-doc (Discount > 5)</a></li>
            </ul>
        </div>

        <div>
            <h4>Advanced Aggregation</h4>
             <ul style="list-style: none; padding: 0;">
                <li><a href="?query=group_advanced">13. AvgPrice & TotalStock by Cat</a></li>
                <li><a href="?query=top_categories">14. Top 2 Categories</a></li>
                <li><a href="?query=pipeline_example">15. Full Pipeline</a></li>
            </ul>
        </div>

         <div>
            <h4>Indexes & Search</h4>
             <ul style="list-style: none; padding: 0;">
                <li><a href="?query=text_search">16. Text Search ('plushie')</a></li>
                <li style="font-size:0.8em; color:gray; padding-top: 0.5rem;">(Indexes are created in setup script)</li>
            </ul>
        </div>
    </div>
    
    <!-- Вывод результатов -->
    <?php if (!empty($results)): ?>
    <h3 style="margin-top:2rem;">
        Query Results: 
        <code style="color:var(--accent-color);">
            <?php 
                // Если это был динамический запрос, показываем сам фильтр, иначе - имя запроса
                echo $query_name === 'dynamic_filter' ? $dynamic_query_info : $query_name; 
            ?>
        </code>
    </h3>
    <pre style="background-color: #000; padding: 1rem; border-radius: 5px; white-space: pre-wrap; word-wrap: break-word;">
        <?php print_r($results); ?>
    </pre>
    <?php endif; ?>

</div>
</div>
<?php include '../templates/footer.php'; ?>