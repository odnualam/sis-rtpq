## Sistem Informasi Santri Rumah Tahfidz Pejuang Quran

```
# Requirements:
PHP 8.0
MySQL 8.0

# First, clone:
git clone https://github.com/fransiscusrolandamalau/sis-rtpq.git

# Then, use it:
composer install
cp .env.example .env
php artisan key:generate
create db "sis-rtpq" then import sql file in database/sis-rtpq.sql

# Open .env then change the following line according to your database you want to use
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

# Run application
php artisan serve
```
