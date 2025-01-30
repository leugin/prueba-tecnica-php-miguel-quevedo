# Utiliza la imagen oficial de PHP
FROM php:8.1

# Actualiza los paquetes del sistema e instala las bibliotecas necesarias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    zlib1g-dev \
    libicu-dev \
    g++ \
    libmagickwand-dev \
    libxslt-dev \
    unzip \
    p7zip-full

# Configura la extensión gd
RUN docker-php-ext-configure gd --with-freetype --with-jpeg

RUN docker-php-ext-install mbstring exif pcntl bcmath gd zip

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establece el directorio de trabajo
WORKDIR /var/www/html

