FROM php:8.2-fpm

RUN apt-get update  &&  apt-get install -y \
    libpq-dev \
    wget \
    git \
    zlib1g-dev \
    libzip-dev \
    openssl \
    libpng-dev \
    libicu-dev \
    libfreetype6-dev \
    libjpeg-dev \
    nano
RUN pecl install  xdebug \
    && docker-php-ext-enable xdebug

RUN docker-php-ext-configure intl
# GD is a PHP extension that provides image processing capabilities, such as creating and manipulating images (e.g., JPEG, PNG, GIF).
RUN docker-php-ext-configure gd \
    --with-jpeg=/usr/include/ \
    --with-freetype=/usr/include/

RUN docker-php-ext-install pdo pdo_mysql gd intl

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY config/docker-php-ext-enable.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# **Добавляем строку для копирования php.ini**
RUN cp "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

#создаем папку для логов
RUN mkdir -p /var/log/php-fpm && chown www-data:www-data /var/log/php-fpm

WORKDIR /www

#RUN pecl install xdebug-3.2.0 && docker-php-ext-enable xdebug


