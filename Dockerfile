FROM php:7.4-apache
RUN apt-get update && \
    apt-get install -y git \
        unzip \
        libzip-dev && \
    docker-php-ext-install zip
RUN curl -O https://getcomposer.org/composer-stable.phar && mv composer-stable.phar /usr/local/bin/composer && chmod +x /usr/local/bin/composer
ADD . /radiolog
RUN chown -R www-data:www-data /radiolog
WORKDIR /radiolog
RUN composer global require kylekatarnls/update-helper \
        php-parallel-lint/php-console-color && \
    composer install

ENV APACHE_DOCUMENT_ROOT /radiolog/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf && \
    echo ' \
<Directory /radiolog/public>\n \
	Options FollowSymLinks\n \
	AllowOverride All\n \
	Require all granted\n \
</Directory>\n' >> /etc/apache2/apache2.conf && \
    ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load