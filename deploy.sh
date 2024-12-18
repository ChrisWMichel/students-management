#!/bin/bash

echo "Starting deployment script..."

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
php artisan config:clear || echo "config:clear failed"
php artisan config:cache || echo "config:cache failed"
php artisan view:clear || echo "view:clear failed"
php artisan route:clear || echo "route:clear failed"
php artisan route:cache || echo "route:cache failed"
php artisan optimize:clear || echo "optimize:clear failed"

echo "Deployment script executed successfully."
