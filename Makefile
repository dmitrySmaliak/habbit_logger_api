init:  docker-up app-init
start: docker-up app-start
restart: docker-down docker-up
build: docker-build
down: docker-down
migrate: app-migrate
rollback: app-rollback

docker-up:
	docker-compose up -d

app-start:
	docker-compose exec node npm run dev

docker-build:
	docker-compose exec php-fpm composer install
	docker-compose exec php-fpm php artisan migrate --force
	docker-compose build

docker-down:
	docker-compose down --remove-orphans

app-init:
	docker-compose exec php-fpm composer install
	docker-compose exec php-fpm php artisan key:generate
	docker-compose exec php-fpm php artisan migrate
	docker-compose exec php-fpm php artisan storage:link
	docker-compose exec node npm install
	docker-compose restart

app-migrate:
	docker-compose exec php-fpm php artisan migrate --force

app-rollback:
	docker-compose exec php-fpm php artisan migrate:rollback

app-seed:
	docker-compose exec php-fpm php artisan db:seed

php-bash:
	docker-compose exec php-fpm bash

php-lint:
	docker-compose exec php-fpm vendor/bin/pint

node-bash:
	docker-compose exec node bash

node-lint:
	docker-compose exec node npm run lint
	docker-compose exec node npm run ts:check

permissions:
	sudo chown -R $$USER:www-data storage
	sudo chown -R $$USER:www-data bootstrap/cache
	chmod -R 775 storage
	chmod -R 775 bootstrap/cache
	chmod -R 777 storage/logs/

cache:
	docker-compose exec php-fpm php artisan cache:clear
	docker-compose exec php-fpm php artisan config:clear
	docker-compose exec php-fpm php artisan view:clear
	docker-compose exec php-fpm php artisan route:clear
	docker-compose exec php-fpm php artisan config:cache
