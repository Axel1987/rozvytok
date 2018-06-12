include .env

all: | ${APP_ENV}
test: | docker-build docker-up composer-install
dev: | docker-build docker-up composer-install
prod: | docker-build docker-up-no-daemon composer-install

##### composer #####

composer-install:
	docker-compose -f docker-compose-${APP_ENV}.yml exec php-fpm composer install

##### build and up #####

docker-build:
	docker-compose -f docker-compose-${APP_ENV}.yml build

docker-up:
	docker-compose -f docker-compose-${APP_ENV}.yml up

docker-up-no-daemon:
	docker-compose -f docker-compose-${APP_ENV}.yml up -d

### Yii commands ###

migrations:
	docker-compose -f docker-compose-${APP_ENV}.yml exec php php yii migrations

setup-db:
	docker-compose -f docker-compose-${APP_ENV}.yml exec php php yii migrations/setup