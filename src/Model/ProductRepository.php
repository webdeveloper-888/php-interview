<?php

declare(strict_types=1);

namespace App\Model;

use App\Database\Connection;

final class ProductRepository
{
    public function all(): array
    {
        $pdo = Connection::get();
        $stmt = $pdo->query('SELECT * FROM products');

        return $stmt->fetchAll();
    }

    public function find(int $id): ?array
    {
        $pdo = Connection::get();
        $stmt = $pdo->prepare('SELECT * FROM products');
        $stmt->execute(['id' => $id]);
        $product = $stmt->fetch();

        return $product ?: null;
    }
}
