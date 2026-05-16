FROM php:8.2-apache

# Cài đặt các thư viện hệ thống cần thiết + Node.js
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    zip \
    unzip \
    git \
    curl \
    nodejs \
    npm

# Cài đặt các extension PHP cho Laravel & Postgres
RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd

# Cài đặt Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Thiết lập thư mục làm việc
WORKDIR /var/www/html

# Copy toàn bộ code vào container
COPY . .

# Cài đặt PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Cài đặt Node dependencies và build Vite assets (CSS/JS)
RUN npm install && npm run build

# Phân quyền cho Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Cấu hình Apache để trỏ vào thư mục public của Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf
RUN a2enmod rewrite

# Mở cổng 80
EXPOSE 80

CMD ["apache2-foreground"]
