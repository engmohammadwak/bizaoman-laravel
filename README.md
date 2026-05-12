# BizaOman - Laravel + Filament Dashboard

## 🚀 المشروع
موقع BizaOman مبني بـ Laravel 11 مع داشبورد Filament كامل للتحكم في الموقع.

## ✨ المميزات
- تحكم كامل في الألوان واللوجو واسم الموقع
- إدارة الفريق، الخدمات، العملاء، الشهادات
- استقبال رسائل التواصل
- إعدادات الموقع الكاملة من الداشبورد
- دعم اللغة العربية والإنجليزية

## 📦 التثبيت
```bash
git clone https://github.com/engmohammadwak/bizaoman-laravel.git
cd bizaoman-laravel
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

## 🔐 الداشبورد
رابط الداشبورد: `/admin`
- Email: `admin@bizaoman.com`
- Password: `password`

## 🛠️ التقنيات
- Laravel 11
- Filament 3
- Tailwind CSS
- Alpine.js
- MySQL
