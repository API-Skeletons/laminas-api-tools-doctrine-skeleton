FROM php:7.3-apache

LABEL maintainer="apiskeletons.com" \
    org.label-schema.docker.dockerfile="/Dockerfile" \
    org.label-schema.name="Reports API" \
    org.label-schema.url="https://apiskeletons.com/" \
    org.label-schema.vcs-url="https://github.com/api-skeletons/laminas-api-tools-doctrine-skeleton"

## Update package information
RUN apt-get update

## Install console tools
RUN apt-get install --yes vim default-mysql-client redis iputils-ping

## Install servers
RUN apt-get install --yes redis-server supervisor

## Configure Apache
RUN a2enmod rewrite
RUN sed -i 's!/var/www/html!/var/www/public!g' /etc/apache2/sites-available/000-default.conf
RUN mv /var/www/html /var/www/public

## Configure supervisor queues
COPY ./.docker/supervisor/* /etc/supervisor/conf.d/

###
## Additional PHP extensions.  To use these extensions uncomment the 
## leading `# ` from the RUN commands.  These are provided to show 
## examples of including other libraries into the PHP installation.
###

##  Install zip libraries and extension
RUN apt-get install --yes git zlib1g-dev libzip-dev
RUN docker-php-ext-install zip

## Install i18n libraries and extensions
RUN apt-get install --yes libicu-dev
RUN docker-php-ext-configure intl 
RUN docker-php-ext-install intl

## Install mbstring for i18n string support
RUN docker-php-ext-install mbstring

## MySQL PDO support
RUN docker-php-ext-install pdo_mysql

## Redis support.  igbinary and libzstd-dev are only needed based on redis 
## pecl options
RUN pecl install igbinary
RUN docker-php-ext-enable igbinary
RUN apt-get install --yes libzstd-dev
RUN pecl install redis
RUN docker-php-ext-enable redis

## Install Composer
RUN curl -sS https://getcomposer.org/installer \
  | php -- --install-dir=/usr/local/bin --filename=composer

ADD . /var/www
WORKDIR /var/www
RUN chmod 777 -R /var/www/data
RUN rm -rf /var/www/data/cache/*

## Configure application
RUN composer install

EXPOSE 80

CMD service supervisor start && \
    service redis-server start && \
    service apache2 start && \
    tail -f /var/log/apache2/access.log
