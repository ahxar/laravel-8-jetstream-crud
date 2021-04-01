# Laravel 8 with Jetstream (Inertia Vue.js) + CRUD

## Features

-   CRUD
-   Users Management for Admin
-   Posts Management for Users

## Requirement

-   Composer
-   Node.js
-   PHP 7.3 or later
-   MySQL 5.7 or later

## Installation

```
git clone https://github.com/faropedia/laravel-8-jetstream-crud
cd laravel-8-jetstream-crud
cp .env.example .env
```

Open `.env`, change `DB_DATABASE` according to your needs, then create a database with that name.

```
composer install
npm install
npm run dev

php artisan key:generate
php artisan migrate
php artisan storage:link

php artisan serve
```

Go to http://localhost:8000
