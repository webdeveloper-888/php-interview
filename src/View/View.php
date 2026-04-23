<?php

declare(strict_types=1);

namespace App\View;

final class View
{
    public function render(string $template, array $data): void
    {
        $viewsPath = BASE_PATH . '/views';

        extract($data, EXTR_SKIP);

        ob_start();
        require $viewsPath . '/' . $template . '.php';
        $content = ob_get_clean();

        require $viewsPath . '/base.php';
    }
}
