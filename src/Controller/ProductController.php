<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\ProductRepository;
use App\View\View;

final class ProductController
{
    private ProductRepository $repository;
    private View $view;

    public function __construct()
    {
        $this->repository = new ProductRepository();
        $this->view = new View();
    }

    public function index(): void
    {
        $products = $this->repository->all();
        $total = count($products);

        $this->view->render('list', [
            'products' => $products,
            'total' => $total,
        ]);
    }

    public function show(array $params): void
    {
        $id = (int)($params['id'] ?? 0);
        $product = $this->repository->find($id);

        if ($product === null) {
            http_response_code(404);
            $this->notFound();
            return;
        }

        $this->view->render('detail', [
            'product' => $product,
        ]);
    }

    public function notFound(): void
    {
        $this->view->render('404', []);
    }
}
