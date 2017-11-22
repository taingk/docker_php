start:
	docker-compose -f docker/compose/docker-compose.yml up --build
daemon:
	docker-compose -f docker/compose/docker-compose.yml up -d --build
stop:
	docker-compose -f docker/compose/docker-compose.yml down
logs:
	docker logs -f apache_simple
dump:
	docker exec mysql_simple /usr/bin/mysqldump -u root --password=root app > data/backup.sql && cat data/backup.sql | docker exec -i mysql_simple /usr/bin/mysql -u root --password=root app
