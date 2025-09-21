# Используем официальный образ PHP 8.2 FPM (основан на Debian)
FROM php:8.2-fpm

# Устанавливаем расширения для работы с PostgreSQL
# Команда 'apt-get' используется, так как этот образ основан на Debian
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql