FROM php:7.4-fpm

RUN pecl install redis-5.3.3 \
    && pecl install xdebug-3.0.2 \
    && docker-php-ext-enable redis xdebug

RUN apt-get update \
     && apt-get install -y libzip-dev \
     && docker-php-ext-install zip

COPY php.ini /usr/local/etc/php/php.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/

RUN ls -ak