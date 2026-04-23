# PHP Catalog Exercise (MVC)

This is a PHP version of the product catalog exercise using a basic MVC layout and Composer dependencies.

## Structure

```
php_interview/
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

## Setup

```bash
cd php_interview
composer install
composer run init-db
php -S 127.0.0.1:8000 -t public public/index.php
```

Open http://127.0.0.1:8000

## Notes

- Database uses SQLite at `var/catalog.db`.
- Routes:
  - `/` lists products
  - `/product/{id}` shows details
