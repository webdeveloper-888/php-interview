<?php

declare(strict_types=1);

?>
<section class="summary">
    <p>Total products: <strong><?php echo (int)$total; ?></strong></p>
</section>

<table class="product-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td>
                    <a href="/product/<?php echo (int)$product['id']; ?>">
                        <?php echo htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8'); ?>
                    </a>
                </td>
                <td><?php echo htmlspecialchars($product['category'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo number_format((float)$product['price'], 2); ?> EUR</td>
                <td><?php echo (int)$product['stock']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
