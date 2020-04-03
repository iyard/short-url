setup:
	composer install
	cp .env.example .env
	php artisan key:generate --ansi
	touch database/database.sqlite || true
	php artisan migrate
	npm install

serve:
	php artisan serve

watch:
	npm run watch

migrate:
	php artisan migrate

console:
	php artisan tinker

test:
	php artisan test

lint:
	composer phpcs

lint-fix:
	composer phpcbf
