# API LBry — README

## Description
Lightweight API for the LBry project. API documentation lives in `docs/api` and a Postman collection is available at `docs/api.json`.

## Requirements
- Docker & Docker Compose
- Git

## Quick setup (Laravel Sail)
1. Clone and enter project:
    - git clone <repo> .
2. Copy env and install:
    - cp .env.example .env
    - ./vendor/bin/sail composer install
    - ./vendor/bin/sail artisan key:generate
3. Start containers:
    - ./vendor/bin/sail up -d
4. Run migrations (and seed if needed):
    - ./vendor/bin/sail artisan migrate --seed

## Verify it works on Sail
1. List API routes:
    - ./vendor/bin/sail artisan route:list --path=api
2. Example request (replace with one of the routes from the list):
    - curl -H "Accept: application/json" http://localhost/api/your-route
3. If endpoints require auth, create a user or token via:
    - ./vendor/bin/sail artisan tinker
    - (or use provided seeders)

## Postman & Docs
- API documentation: `docs/api`
- Postman collection: import `docs/api.json` (File → Import → select `docs/api.json` or drag into Postman).

## Useful commands
- Stop containers: `./vendor/bin/sail down`
- Run tests: `./vendor/bin/sail test`
- Artisan inside Sail: `./vendor/bin/sail artisan <command>`

Place further API documentation in `docs/api` and keep `docs/api.json` up to date for Postman.
