.PHONY: start-server start-db db stop-db

start-server:
	php -S localhost:9000

start-db:
	docker run \
	-e MYSQL_ROOT_HOST=% \
	-e MYSQL_ROOT_PASSWORD=temp_password \
	-e MYSQL_USER=gxc353_1 \
	-e MYSQL_PASSWORD=temp_password \
	-e MYSQL_DATABASE=gxc353_1 \
	-e TZ=America/Montreal \
	--name mysql-353 \
	--rm \
	-d \
	-p 3306:3306 \
	mysql

db:
	docker exec \
	-it \
	mysql-353 \
	mysql -ugxc353_1 -ptemp_password gxc353_1

stop-db:
	docker stop mysql-353
