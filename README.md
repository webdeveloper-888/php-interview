# PHP Catalog Exercise (MVC)

This is a PHP version of the product catalog exercise using a basic MVC layout and Composer dependencies.

## Structure

```
php_clone/
├── bin/
│   └── init_db.php
├── public/
│   ├── index.php
│   └── assets/
│       └── style.css
├── src/
│   ├── Controller/
│   ├── Database/
│   ├── Model/
│   └── View/
├── views/
│   ├── base.php
│   ├── list.php
│   ├── detail.php
│   └── 404.php
├── var/
│   └── catalog.db
└── composer.json
```

## Setup (local)

```bash
cd php_clone
composer install
composer run init-db
php -S 127.0.0.1:8000 -t public public/index.php
```

Open http://127.0.0.1:8000

## Setup (docker)

```bash
docker compose up --build
docker compose exec app composer run init-db
```

Open http://127.0.0.1:8000

## Candidate tasks

The interviewee should complete the tasks below.

### Task 0 - Database (required)

- Create the `products` table with the fields: id, name, category, price, stock, description, created_at.
- Insert at least 8 sample products in different categories.
- Run `composer run init-db` and confirm the DB is created without errors.

### Task 1 - Product list (required)

- Implement the `/` route to read all products and pass them to the template.
- Render a table (or cards) with name, category, price, and stock.
- The product name should link to the detail page.
- Show the total number of products listed.

### Task 2 - Product detail (required)

- Implement the `/product/{id}` route to fetch the product by id.
- If the product does not exist, return a 404.
- Show all fields in the template.
- Format price with 2 decimals and the EUR symbol.
- Visually indicate whether the product is in stock or out of stock.
- Include a "back to list" link.

### Extra - Filter by category (bonus)

- Add `?category=<name>` support to the `/` route.
- Add a select/form with available categories.
- Auto-filter when a category is selected.

## Notes

- Database uses SQLite at `var/catalog.db`.
- Routes:
  - `/` lists products
  - `/product/{id}` shows details
