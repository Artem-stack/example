FROM php:8.0-fpm

RUN apt-get update \
&& docker-php-install  pdo pdo_mysql