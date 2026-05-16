#!/bin/bash

# Chạy migration tự động khi container khởi động
echo "Running database migrations..."
php artisan migrate --force

# Khởi động Apache
echo "Starting Apache..."
apache2-foreground
