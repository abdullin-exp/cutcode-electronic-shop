FROM php:8-fpm

RUN apt-get update \
&& docker-php-ext-install pdo pdo_mysql

RUN apt-get install -y nodejs npm

COPY . /var/www/cutcode-shop-docker
RUN npm install
