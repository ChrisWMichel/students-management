#!/bin/bash

echo "Creating necessary directories..."
# Create necessary directories
mkdir -p bootstrap/cache
mkdir -p storage/framework/views

echo "Setting permissions..."
# Set permissions
chmod -R 775 bootstrap/cache
chmod -R 775 storage/framework/views

echo "Running artisan commands..."
# Run artisan commands
php artisan config:clear
php artisan config:cache
php artisan view:clear
php artisan route:clear
php artisan route:cache
php artisan optimize:clear

echo "Deployment script executed successfully."
