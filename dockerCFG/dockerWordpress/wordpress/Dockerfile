FROM php:7.3-apache

# apache user
RUN usermod -u 1000 www-data \
    && groupmod -g 1000 www-data \
    && apt-get update \
    && apt-get install -y \
        libfreetype6-dev \
        libmagickwand-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        libzip-dev \
        jpegoptim \
        optipng \
        gifsicle \
        sendmail \
        git-core \
        build-essential \
        openssl \
        libssl-dev \
        python2.7 \
        zip \
        vim \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install -j$(nproc) zip \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install gettext \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-enable mysqli \
    && pecl install xdebug-beta \
        imagick \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-enable imagick \
    && ln -s /usr/bin/python2.7 /usr/bin/python \
    && a2enmod rewrite && a2enmod ssl \
    && usermod -u 1000 www-data \
    && groupmod -g 1000 www-data \
    && mkdir -p /etc/letsencrypt/live \
    && chown www-data:www-data /var/www/html -R

COPY config/php.ini /usr/local/etc/php/
COPY config/000-default.conf /etc/apache2/sites-enabled


# composer
RUN curl -S https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer self-update

# node
RUN curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.33.11/install.sh | bash \
    && export NVM_DIR="$HOME/.nvm" \
    && . $NVM_DIR/nvm.sh \
    && nvm install v8.9.2 \
    && nvm use v8.9.2 \
    && nvm alias default v8.9.2 \
    && npm install -g npm


#COPY entrypoint.sh /usr/local/bin/
#RUN ["chmod", "+x", "/usr/local/bin/entrypoint.sh"]

#ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

# USER root