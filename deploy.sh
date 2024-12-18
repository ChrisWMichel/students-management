#!/bin/bash

# Create necessary directories
mkdir -p bootstrap/cache
mkdir -p storage/framework/views

# Set permissions
chmod -R 775 bootstrap/cache
chmod -R 775 storage/framework/views

# Run artisan commands
php artisan config:clear
php artisan config:cache
php artisan view:clear
php artisan route:clear
php artisan route:cache
php artisan optimize:clear
