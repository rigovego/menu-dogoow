#!/bin/sh
set -e

cd /app

echo "Iniciando dogoow..."

# Crear enlace de storage si no existe
php artisan storage:link || true

# Limpiar cachés viejas
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true

# Generar caché de config si existe APP_KEY
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Iniciar PHP-FPM en segundo plano
php-fpm -D

# Iniciar nginx en primer plano
nginx -g "daemon off;"