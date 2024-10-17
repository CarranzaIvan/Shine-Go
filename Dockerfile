# Usar la imagen oficial de PHP con PHP-FPM
FROM php:8.2-fpm

# Instalar extensiones necesarias para Laravel y netcat-openbsd
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libonig-dev \
    libzip-dev \
    curl \
    gnupg \
    netcat-openbsd \
    && docker-php-ext-install pdo pdo_mysql zip mbstring

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalar Node.js y NPM (versión 18.x)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Copiar los archivos del proyecto al contenedor
COPY . .

# Dar permisos a las carpetas necesarias
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public

# Instalar las dependencias de Composer
RUN composer install --optimize-autoloader --no-dev

# Instalar dependencias de frontend y compilar assets
RUN npm install && npm run build

# Ejecutar las migraciones automáticamente
RUN php artisan migrate --force

EXPOSE 9000

CMD ["php-fpm"]
