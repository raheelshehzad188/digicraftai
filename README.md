# DigiCraft AI — Digital Agency CMS

Laravel 12 + Filament 3 CMS built on the DOT.NET digital agency HTML template.

## Features

- Dynamic home page sections
- Admin color scheme controls (with **Reset to defaults**)
- Drag-and-drop menu builder
- CRUD for projects, teams, services, pricing, testimonials
- CMS pages + contact inbox

## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

Requires **PHP 8.2+**.

## Admin

- URL: `/admin`
- Email: `admin@digicraftai.test`
- Password: `password`
