FROM php:7.1-fpm-alpine

# install php extensions #
RUN docker-php-ext-install mysqli pdo_mysql

# install composer #
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

WORKDIR /site/api