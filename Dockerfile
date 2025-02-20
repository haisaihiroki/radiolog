FROM php:8.2-apache

# Install necessary packages and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    nodejs \
    npm && \
    docker-php-ext-install \
    zip \
    bcmath \
    pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /radiolog

# Copy application files
ADD . /radiolog

# Set permissions
RUN chown -R www-data:www-data /radiolog

# Install PHP and Node.js dependencies
RUN composer require kylekatarnls/update-helper \
    php-parallel-lint/php-console-color && \
    composer install && \
    npm install

# Configure Apache
ENV APACHE_DOCUMENT_ROOT=/radiolog/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf && \
    echo ' \
<Directory /radiolog/public>\n \
    Options FollowSymLinks\n \
    AllowOverride All\n \
    Require all granted\n \
</Directory>\n' >> /etc/apache2/apache2.conf && \
    ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load