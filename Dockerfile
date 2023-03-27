FROM php:8.2-fpm-alpine

RUN docker-php-ext-intstall pdo pdo_mysql
RUN curl -sS http://getcomposer.org/installer | php -- \
        --install-dir=/usr/local/bin --filename=composer

WORKDIR /app
COPY . .
RUN composer install


CMD php artisan serve --host=0.0.0.0
