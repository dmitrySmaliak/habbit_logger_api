# Habit Logger API

API-only project based on Laravel.

## 1. Prepare Project
1. Clone repository.
2. Run `cp .env.example .env` and set environment variables.
3. Run `make init`.

## 2. Run Project
1. Run `make start`.
2. API is available at `http://localhost:8000`.
3. phpMyAdmin is available at `http://localhost:8080`.

phpMyAdmin credentials:
- login: `root`
- password: value from `DB_ROOT_PASSWORD` in `.env`

## 3. Useful Commands
- `make php-bash`
- `make migrate`
- `make rollback`
- `make php-lint`
- `make down`
