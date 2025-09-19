FROM php:8.3-apache

RUN apt-get update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql

COPY . /var/www/html/

RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

EXPOSE 80