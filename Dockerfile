FROM php:7.4-apache
RUN docker-php-ext-install pdo pdo_mysql mysqli
COPY . /var/www/html
EXPOSE 80
