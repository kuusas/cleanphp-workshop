FROM php:7.2-apache

WORKDIR /var/www

# Apache cnfiguration
COPY symfony2.conf /etc/apache2/sites-enabled/000-default.conf
RUN a2enmod rewrite

# PHP configuration
RUN apt-get update && apt-get install -y \
  git \
  unzip \
  libzip-dev \
  && docker-php-ext-install zip \
  && docker-php-ext-install pdo_mysql

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

RUN usermod -u 1000 www-data

EXPOSE 80
