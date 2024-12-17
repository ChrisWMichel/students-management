#!/bin/bash

# Run migrations and seeders
php artisan migrate:fresh --force
php artisan db:seed --force
