build: ## build development environment with laradock
	if ! [ -f .env ];then cp .env.example .env;fi
	docker-compose build
	docker-compose run --rm php-cli composer install
	docker-compose run --rm php-cli php artisan key:generate
	docker-compose run --rm npm npm install
	docker-compose run --rm npm npm run dev
	docker-compose up -d
	docker-compose run --rm php-cli php artisan migrate

clear-docker:
	## Container を削除
	docker rm $(docker ps -q -a)
	## Imageを削除
	docker rmi $(docker images -q)
	## 何も出ないことを確認
	docker images -q
	docker system prune && docker image prune && docker network prune