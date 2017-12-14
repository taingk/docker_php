# Simple php 7.1

<br>

### Développeur

<br>

TAING Kévin
@taingk

<br>

# Application

<br>

### Architecture

<br>

- Volume sur container php:apache

<br>

```
~/app
```

<br>

- Dump MySQL

<br>

```
~/data
```

<br>

- docker-compose.yml et Dockerfile

<br>

```
~/docker
```

<br>

- Alias docker

<br>

```
~/Makefile
```

<br>

### Lancer notre projet

<br>

- Lancer le projet

<br>

```
make start
```

<br>

- Lancer en daemon

<br>

```
make daemon
```

<br>

- Arreter le projet

<br>

```
make stop
```

<br>

- Logs php

<br>

```
make logs
```

<br>

- Dump MySQL dans ~/data

<br>

```
make dump
```

<br>

- Restore la bdd

<br>

```
make restore
```

<br>

- Restart apache

<br>

```
make r_apache
```

<br>

### En local une fois docker lancé

<br>

- Serveur apache

<br>

```
http://localhost:8080/
```

<br>

- Phpmyadmin

<br>

```
http://localhost:8081/
```

<br>

- Logs des requêtes MySQL

<br>

1. On rentre dans le container MySQL
```
docker exec -ti mysql_simple mysql -u root --password=root
```
2. On regarde ou sont stockés les données de log et on copie l'url dans la colonne general\_log_file
```
SHOW VARIABLES LIKE "general_log%";
[copier url de la colonne general_log_file]
```
3. On active les logs et on quitte le container MySQL
```
SET GLOBAL general_log = 'ON';
[quitter mysql avec ctrl + d]
```
4. Affichage des logs en temps réel
```
docker exec -ti mysql_simple tail -f [url copié]
```

<br>

### MySQL connexion

<br>

```
host   : mysql_simple
user   : root
pass   : root
dbname : app
```
