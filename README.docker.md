# Docker dev setup

## Start

```bash
docker compose up --build
```

## Initialize database

In another terminal:

```bash
docker compose exec app composer run init-db
```

App: http://127.0.0.1:8000
