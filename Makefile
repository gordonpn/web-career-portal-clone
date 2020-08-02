.PHONY: start start-server start-db-d db stop-db run dump start-db

start: start-db-d start-server

start-server:
	php -S localhost:9000

start-db-d:
	docker run \
	-e MYSQL_DATABASE=gxc353_1 \
	-e MYSQL_PASSWORD=temp_password \
	-e MYSQL_ROOT_HOST=% \
	-e MYSQL_ROOT_PASSWORD=temp_password \
	-e MYSQL_USER=gxc353_1 \
	-e TZ=America/Montreal \
	-v ${PWD}/sql/init:/docker-entrypoint-initdb.d \
	--name mysql-353 \
	--rm \
	-d \
	-p 3306:3306 \
	mysql

start-db:
	docker run \
	-e MYSQL_DATABASE=gxc353_1 \
	-e MYSQL_PASSWORD=temp_password \
	-e MYSQL_ROOT_HOST=% \
	-e MYSQL_ROOT_PASSWORD=temp_password \
	-e MYSQL_USER=gxc353_1 \
	-e TZ=America/Montreal \
	-v ${PWD}/sql/init:/docker-entrypoint-initdb.d \
	--name mysql-353 \
	--rm \
	-p 3306:3306 \
	mysql

db:
	docker exec \
	-it \
	mysql-353 \
	mysql -ugxc353_1 -ptemp_password gxc353_1

dump:
	docker exec mysql-353 /usr/bin/mysqldump -uroot -ptemp_password gxc353_1 > db_dump.sql

stop-db:
	docker stop mysql-353

run:
	bash -c "trap 'trap - SIGINT SIGTERM ERR; $(MAKE) stop-db; exit' SIGINT SIGTERM ERR; $(MAKE) start"
