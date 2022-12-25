FROM php:8.1-fpm

RUN apt-get update \
&& docker-php-ext-install pdo pdo_mysql

RUN apt-get install -y nodejs npm

COPY . /var/www/cutcode-shop-docker
RUN npm install
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.37.2/install.sh | bash
