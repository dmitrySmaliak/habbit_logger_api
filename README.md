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

## 4. Git Workflow Rules

### Branch Name
- Feature branch: `feat/HL-<number>` (example: `feat/HL-123`)
- Fix branch: `fix/HL-<number>` (example: `fix/HL-456`)
- Hotfix branch: `hotfix/<description>` (example: `hotfix/login-timeout`)
- Release branch: `release/dd.mm.yy-vx.y.z` (example: `release/16.02.26-v1.3.0`)

### Commit Message
- For `feat/HL-<number>` and `fix/HL-<number>` branches, each commit must start with:
  - `HL-<number>.`
  - example for `feat/HL-123`: `HL-123. Add habit streak endpoint`
- For `hotfix/*` branches, each commit must start with:
  - `hotfix.`
  - example: `hotfix. Fix production token validation`
- For `release/*` branches, commit message check is skipped.

### Pull Request Title
- For `feat/HL-<number>` branch:
  - `Feat/HL-<number>. <short description>`
  - example: `Feat/HL-123. Add habit streak endpoint`
- For `fix/HL-<number>` branch:
  - `Fix/HL-<number>. <short description>`
  - example: `Fix/HL-456. Fix habit archive validation`
- For `hotfix/*` branch:
  - `Hotfix. <short description>`
  - example: `Hotfix. Fix production token validation`
- For `release/dd.mm.yy-vx.y.z` branch:
  - `Release/dd.mm.yy-vx.y.z`
  - example: `Release/16.02.26-v1.3.0`
