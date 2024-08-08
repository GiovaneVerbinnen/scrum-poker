# Generate a dockerfile for a laravel application
# Usage: dockerfile [options] <name>
FROM php:7.4-fpm

# Install dependencies and required extensions (postgres and nodejs)
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    npm \
    nodejs

RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd
# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory

WORKDIR /var/www

# Copy existing application directory contents

COPY . /var/www

# Install Composer dependencies

RUN composer install

# Install NPM dependencies
RUN npm install

# Copy existing application directory permissions

COPY --chown=www-data:www-data . /var/www

# Expose port 8080

EXPOSE 8080

# Run Laravel Artisan commands

CMD php artisan serve --port=8080 --host=0.0.0.0
