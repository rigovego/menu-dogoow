FROM php:8.3-fpm-alpine

WORKDIR /app

# Instalar paquetes necesarios
RUN apk add --no-cache \
    nginx \
    nodejs \
    npm \
    curl \
    git \
    unzip \
    bash \
    postgresql-dev \
    libxml2-dev \
    oniguruma-dev \
    icu-dev \
    libzip-dev \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    sqlite-dev

# Instalar extensiones PHP necesarias para Laravel
RUN docker-php-ext-install \
    pdo \
    pdo_pgsql \
    pdo_sqlite \
    mbstring \
    xml \
    intl \
    zip \
    bcmath \
    exif \
    pcntl

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar archivos del proyecto
COPY . /app

# Instalar dependencias PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Instalar dependencias frontend y compilar assets
RUN npm install && npm run build

# Preparar carpetas de Laravel
RUN mkdir -p /app/storage/framework/cache \
    /app/storage/framework/sessions \
    /app/storage/framework/views \
    /app/storage/logs \
    /run/nginx

# Permisos
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

# Copiar configuración de nginx
COPY nginx.conf /etc/nginx/http.d/default.conf

# Dar permisos de ejecución al script de arranque
RUN chmod +x /app/start.sh

EXPOSE 10000

CMD ["/app/start.sh"]