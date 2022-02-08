## Sistem Informasi Santri Rumah Tahfidz Pejuang Quran

```
# Requirements:
PHP 8.0

# First, clone:
git clone https://github.com/fransiscusrolandamalau/sis-rtpq.git

# Then, use it:
composer install
cp .env.example .env
php artisan key:generate
create db "kkp_sis-rtpq" then import sql file in database/kkp_sis-rtpq.sql
php artisan serve
```
