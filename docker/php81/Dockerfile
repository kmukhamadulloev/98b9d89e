FROM php:8.1-fpm

RUN groupadd -g 1000 myuser && \
    useradd -u 1000 -g 1000 -s /bin/bash -m myuser && \
    usermod -aG sudo myuser && \
    echo 'myuser:mypass' | chpasswd

RUN docker-php-ext-install \
    pdo_mysql