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
5. Open container url in browser 
