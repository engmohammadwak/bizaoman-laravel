# 🚀 دليل التثبيت الكامل - BizaOman Laravel

## المتطلبات
- PHP 8.2+
- Composer
- Node.js & NPM
- MySQL

## خطوات التثبيت

### 1. Clone المشروع
```bash
git clone https://github.com/engmohammadwak/bizaoman-laravel.git
cd bizaoman-laravel
```

### 2. تثبيت الـ Dependencies
```bash
composer install
npm install && npm run build
```

### 3. إعداد البيئة
```bash
cp .env.example .env
php artisan key:generate
```

### 4. إعداد قاعدة البيانات
عدّل `.env` وضع بيانات الـ MySQL:
```
DB_DATABASE=bizaoman
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 5. تشغيل الـ Migrations والـ Seeder
```bash
php artisan migrate --seed
php artisan storage:link
```

### 6. تشغيل المشروع
```bash
php artisan serve
```

## 🔐 الداشبورد
- الرابط: `http://localhost:8000/admin`
- Email: `admin@bizaoman.com`
- Password: `password`

## 🎨 التحكم الكامل من الداشبورد

| الميزة | الوصف |
|--------|-------|
| إعدادات الموقع | اسم الموقع، اللوجو، الـ Favicon |
| الألوان | 7 ألوان قابلة للتغيير (Navbar, Footer, Primary, إلخ) |
| الخدمات | إضافة/تعديل/حذف الخدمات |
| الفريق | إدارة أعضاء الفريق مع الصور |
| العملاء | عملاء عامون وخاصون مع اللوجو |
| الشهادات | رفع وإدارة الشهادات والجوائز |
| الرسائل | استقبال رسائل التواصل مع إشعارات |
| السوشيال ميديا | روابط LinkedIn, Twitter, Instagram, Facebook, YouTube |
| Hero Section | تعديل عنوان ونص وصورة القسم الرئيسي |
| SEO | Meta Description وGoogle Analytics |
