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
1. For `feat/HL-<number>` and `fix/HL-<number>` branches:
   Format: `HL-#<number>. <description>`
   Example: `HL-#123. Add habit streak endpoint`
2. For `hotfix/*` branches:
   Format: `hotfix. <description>`
   Example: `hotfix. Fix production token validation`
3. For `release/*` branches, commit message check is skipped.

### Pull Request Title
1. For `feat/HL-<number>` branch:
   Format: `Feat/HL-#<number>. <short description>`
   Example: `Feat/HL-#123. Add habit streak endpoint`
2. For `fix/HL-<number>` branch:
   Format: `Fix/HL-#<number>. <short description>`
   Example: `Fix/HL-#456. Fix habit archive validation`
3. For `hotfix/*` branch:
   Format: `Hotfix. <short description>`
   Example: `Hotfix. Fix production token validation`
4. For `release/dd.mm.yy-vx.y.z` branch:
   Format: `Release/dd.mm.yy-vx.y.z`
   Example: `Release/16.02.26-v1.3.0`

### PR Body (recommended)
1. Add closing keyword to auto-close ticket when PR is merged.
2. Format: `Closes #<number>`
3. Example: `Closes #123`
