# Используем официальный образ PHP 8.1 FPM с Nginx
FROM php:8.1-fpm

# Устанавливаем расширения для работы с PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql