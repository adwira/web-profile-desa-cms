# Gunakan PHP dengan Apache agar bisa serve Laravel langsung
FROM php:8.3-apache

# Install ekstensi yang dibutuhkan
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libxml2-dev libicu-dev nodejs npm \
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

# Set permission
RUN chmod -R 775 storage bootstrap/cache

# Enable mod_rewrite untuk Laravel routing
RUN a2enmod rewrite
RUN echo '<Directory /var/www/html>\n\
    AllowOverride All\n\
    </Directory>' > /etc/apache2/conf-available/laravel.conf && \
    a2enconf laravel

# Expose port 80
EXPOSE 80

CMD ["apache2-foreground"]
