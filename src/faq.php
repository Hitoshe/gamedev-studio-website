<?php require_once 'init.php'; ?>
<?php include 'templates/header.php'; ?>

<div class="page-container">
    <h1>Frequently Asked Questions (FAQ)</h1>
    
    <div class="faq-item">
        <h3>Question 1: What is Burden of Flame about?</h3>
        <p>A survival horror with roguelike elements, Coop.</p>
    </div>

    <div class="faq-item">
        <h3>Question 2: What platforms is the games available on?</h3>
        <p>PC only.</p>
    </div>

    <div class="faq-item">
        <h3>Question 3: When will Burden of Flame be released?</h3>
        <p>We will inform you about this on the website.</p>
    </div>

    <div class="faq-item">
        <h3>Question 4: How much Burden of Flame will cost?</h3>
        <p>Around 6$.</p>
    </div>

    <!-- Больше вопросов и ответов по мере необходимости -->

</div>

<style>
/* Стили для этой страницы, можно вынести в style.css */
.page-container {
    padding: 4rem 10%;
    max-width: 900px;
    margin: 0 auto;
}
.faq-item {
    margin-bottom: 2rem;
    border-bottom: 1px solid #333;
    padding-bottom: 1.5rem;
}
.faq-item h3 {
    color: var(--accent-color);
}
</style>

<?php include 'templates/footer.php'; ?>