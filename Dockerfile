FROM php:5.6-apache

# Copy code
COPY . /var/www/html/

RUN a2enmod rewrite