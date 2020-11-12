FROM library/php:7.4.10-fpm

RUN apt-get update && apt-get install -y \
    apt-utils \
    curl \
    wget \
    git \
    zip \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo_mysql \
    && pecl install xdebug-2.9.5 \
    && docker-php-ext-enable xdebug

#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD ./images/php/php.ini /usr/local/etc/php/conf.d/40-custom.ini

#COPY ./web/composer.json /var/www/composer.json
#COPY ./web/composer.lock /var/www/composer.lock

WORKDIR /var/www

#RUN composer install --no-interaction

CMD ["php-fpm"]