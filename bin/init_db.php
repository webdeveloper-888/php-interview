<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

define('BASE_PATH', dirname(__DIR__));

use App\Database\Seeder;

$varPath = BASE_PATH . '/var';
if (!is_dir($varPath)) {
    mkdir($varPath, 0775, true);
}

Seeder::init();

echo "Database initialized.\n";
