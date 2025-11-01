# Dockerfile for Laravel (single container, Apache)
FROM php:8.3-apache

# --- 1) System deps & PHP extensions ---
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev libicu-dev \
    nodejs npm gnupg2 ca-certificates \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# --- 2) Working dir ---
WORKDIR /var/www/html

# --- 3) Copy all sources first (so artisan exists) ---
COPY . .

# --- 4) Composer: install composer binary, allow superuser (build runs as root) ---
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# --- 5) Composer install but avoid running scripts that require artisan before all files are ready ---
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts
RUN composer run-script post-autoload-dump || true

# --- 6) Build frontend (Vite) ---
RUN npm ci --silent || npm install --silent
RUN npm run build --silent

# --- 7) Permissions (ensure Apache user can write storage & cache) ---
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# --- 8) Apache config: set DocumentRoot to public ---
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN a2enmod rewrite
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf

# --- 9) Laravel commands on container start ---
# Jalankan semua perintah artisan langsung sebelum Apache dijalankan
CMD chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache && \
    php artisan key:generate --no-interaction && \
    php artisan migrate --force && \
    php artisan db:seed --force && \
    php artisan storage:link && \
    php artisan config:cache && \
    apache2-foreground
