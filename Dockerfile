FROM php:7.0-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get update && apt-get upgrade -y

LABEL Maintainer="Yohannes Petrick" \
email = "yohannes.patrick03@gmail.com" \
version = "1.0"

COPY . /var/www/html
EXPOSE 80 443
