# Gunakan base image resmi PHP dengan FPM
FROM php:8.3-fpm-alpine

# Install ekstensi yang dibutuhkan Laravel
RUN apk add --no-cache \
    git curl zip unzip libpng-dev libjpeg-turbo-dev libfreetype-dev \
    oniguruma-dev libxml2-dev bash nodejs npm icu-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl

# Set working directory
WORKDIR /var/www/html

# Copy composer.json & install dependencies
COPY composer.json composer.lock ./
RUN curl -sS https://getcomposer.org/installer | php \
    && php composer.phar install --no-dev --optimize-autoloader --no-interaction

# Copy semua file project
COPY . .

# Build frontend assets
RUN npm install && npm run build

# Set permission storage & bootstrap
RUN chmod -R 775 storage bootstrap/cache

# Expose port 9000 untuk PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]
