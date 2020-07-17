FROM php:7.4-zts-buster

# Adding parallel extension
RUN pecl install parallel-1.1.3

# Enablign parallel extension
RUN docker-php-ext-enable parallel