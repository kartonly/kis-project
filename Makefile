### Команды для запуска приложения
app-start-dev: app-build app-up

app-build: # собираем проект
	docker-compose build --build-arg user=$(shell whoami) --build-arg uid=$(shell id -u)
app-build-no-cache: # собираем без кеша
	docker-compose build --build-arg user=$(shell whoami) --build-arg uid=$(shell id -u) --no-cache
app-up: # поднимаем с колен
	docker-compose up -d
app-up-no-detach: # поднимаем с колен не в фоне
	docker-compose up
app-stop: # останавливаем эту машину
	docker-compose stop
app-down: # удаляем контейнеры
	docker-compose down

### Команды для работы с контейнерами приложения
exec-nginx: # заходим в контейнер с nginx
	docker-compose exec bb-nginx bash
exec-php-fpm: # заходим в контейнер с php
	docker-compose exec bb-php-fpm bash
exec-percona: # заходим в контейнер с percona
	docker-compose exec bb-percona bash

### Установка зависимостей локально с помощью докера
docker-load-vendor:
	docker run --rm --interactive --tty   --volume $PWD:/app   --volume ${COMPOSER_HOME:-$HOME/.composer}:/tmp   composer install --ignore-platform-reqs

### Запуск проверок
app-cs: # проверка code style
	docker-compose exec bb-php-fpm composer app:cs
app-tests: # запуск тестов
	docker-compose exec bb-php-fpm phpunit
app-queue: # запуск очереди Redis
	docker-compose exec bb-php-fpm php artisan queue:work
