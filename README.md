# mysourcing-back
En este proyecto se encuentra el back del test Desarrollador PHP


## Requisitos del Sistema

El sistema corre con docker el cual incluye lo siguiente
- PHP 8.1
- Apache
- Composer
- Mysql

Sera necesario para ejecutarlo contar con docker, para la documentación completa puede consultar
- [Docker Documentación completa](https://docs.docker.com/engine/install/)
## Instalación

Dentro del proyecto esta el archivo DockerFile que contiene todo lo necesario para poder utilizar el sistema,
para esto dentro del proyecto hay el documento de docker-compose para poder crear el contenedor, es necesario ejecutar lo siguiente

```docker-compose up -d```

Para poder iniciar el proyecto de Symfony es necesario despues de construirse el contenedor ejecutar lo siguiente

```docker exec  mysourcing-back_php-apache_1 symfony server:start --port=8080```

Se envía adjunto el dump de la base de dato, pero se puede correr las migraciones para crear la tabla de la base de datos
```docker exec  mysourcing-back_php-apache_1 php bin/console doctrine:migrations:migrate```
