<?php

declare(strict_types=1);

namespace App\Database;

use PDO;

final class Seeder
{
    public static function init(): void
    {
        $pdo = Connection::get();

        $pdo->exec(
            'CREATE TABLE IF NOT EXISTS products (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL,
                category TEXT NOT NULL,
                price DECIMAL(10, 2) NOT NULL,
                stock INTEGER NOT NULL DEFAULT 0,
                description TEXT,
                created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
            )'
        );

        $existing = (int)$pdo->query('SELECT COUNT(*) FROM products')->fetchColumn();
        if ($existing > 0) {
            return;
        }

        $statement = $pdo->prepare(
            'INSERT INTO products (name, category, price, stock, description) VALUES
            (:name, :category, :price, :stock, :description)'
        );

        $items = [
            [
                'name' => 'Mechanical Keyboard K70',
                'category' => 'Peripherals',
                'price' => 129.90,
                'stock' => 12,
                'description' => 'Aluminum frame, red switches, RGB backlight.',
            ],
            [
                'name' => 'Gaming Mouse G502',
                'category' => 'Peripherals',
                'price' => 69.00,
                'stock' => 30,
                'description' => 'High precision sensor and adjustable weights.',
            ],
            [
                'name' => 'USB-C Dock Pro',
                'category' => 'Accessories',
                'price' => 119.50,
                'stock' => 7,
                'description' => '12-in-1 dock with HDMI and Ethernet.',
            ],
            [
                'name' => '27-inch 4K Monitor',
                'category' => 'Displays',
                'price' => 349.99,
                'stock' => 5,
                'description' => 'IPS panel, HDR, 60Hz refresh rate.',
            ],
            [
                'name' => 'Studio Headset',
                'category' => 'Audio',
                'price' => 89.90,
                'stock' => 0,
                'description' => 'Closed-back headphones with balanced sound.',
            ],
            [
                'name' => 'Portable SSD 1TB',
                'category' => 'Storage',
                'price' => 139.00,
                'stock' => 18,
                'description' => 'USB 3.2 Gen 2, read up to 1050MB/s.',
            ],
            [
                'name' => 'Ergonomic Mouse Pad',
                'category' => 'Accessories',
                'price' => 14.90,
                'stock' => 50,
                'description' => 'Gel wrist rest and anti-slip base.',
            ],
            [
                'name' => 'Bluetooth Speaker Mini',
                'category' => 'Audio',
                'price' => 39.90,
                'stock' => 22,
                'description' => 'Compact speaker with 10-hour battery.',
            ]
        ];

        foreach ($items as $item) {
            $statement->execute($item);
        }
    }
}
