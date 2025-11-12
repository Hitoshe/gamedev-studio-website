# Используем официальный образ PHP 8.2 FPM (основан на Debian)
FROM php:8.2-fpm

# Устанавливаем расширения для работы с PostgreSQL
# Команда 'apt-get' используется, так как этот образ основан на Debian
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_pgsql

# Устанавливаем зависимости и само расширение через PECL
RUN apt-get install -y libssl-dev && \
    pecl install mongodb && \
    docker-php-ext-enable mongodb

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer