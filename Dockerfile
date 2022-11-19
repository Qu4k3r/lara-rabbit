FROM php:fpm-alpine3.15

WORKDIR /var/www

RUN apk update && apk upgrade && \
    apk add libzip-dev curl \
    postgresql-dev && \
    docker-php-ext-install zip

RUN docker-php-ext-install -j$(nproc) pdo \
    pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R 1000:1000 .

EXPOSE 3000
