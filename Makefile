docker_web = laravel-web-container
docker_db  = laravel-db-container
phpcbf-cmd=./vendor/bin/phpcbf --standard=./phpcs.xml -p --colors app config routes tests

build: #Build docker containers
	@sudo docker-compose build --no-cache

start: #Containers start
	sudo docker-compose up -d

stop: #Containers stop
	sudo docker-compose down

#Containers stop and then start
restart: stop start

connect_web: #Connect to the web container
	sudo docker exec -it $(docker_web) bash

connect_db: #Connect to the db container
	sudo docker exec -it $(docker_db) bash

install: #Connect to web container and install dependencies
	@composer install

env:
	cp ./.env.example ./.env

pre-commit:
	cp .githooks/pre-commit .git/hooks/pre-commit && chmod 775 .git/hooks/pre-commit

fix-cs:
	$(phpcbf-cmd)
