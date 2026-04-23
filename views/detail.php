<?php

declare(strict_types=1);

$inStock = (int)$product['stock'] > 0;
?>
<article class="product-detail">
    <h2><?php echo htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
    <p class="category">Category: <?php echo htmlspecialchars($product['category'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p class="price">Price: <?php echo number_format((float)$product['price'], 2); ?> EUR</p>
    <p class="stock <?php echo $inStock ? 'in-stock' : 'out-of-stock'; ?>">
        <?php echo $inStock ? 'In stock' : 'Out of stock'; ?>
    </p>
    <p class="description">
        <?php echo htmlspecialchars($product['description'] ?? 'No description provided.', ENT_QUOTES, 'UTF-8'); ?>
    </p>
    <p class="created">Created at: <?php echo htmlspecialchars($product['created_at'], ENT_QUOTES, 'UTF-8'); ?></p>

    <a class="back-link" href="/">&larr; Back to list</a>
</article>
