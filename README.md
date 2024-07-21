<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Blog System
A Laravel-based blog system featuring CRUD operations for news categories and news items, visitor comments, a user-friendly interface, and a public API for paginated news. The admin panel is built using FilamentPHP.

# Features
**CRUD Operations for News Categories:** Create, Read, Update, Delete categories for news.
**CRUD Operations for News:** Create, Read, Update, Delete news items, with scheduling capabilities.
**Visitor Comments:** Allow visitors to add comments to news items.
**Interface for Reading News:** Display news articles with details and comments.
**Public API:** Fetch paginated news items with their details.
**Admin Panel:** Manage categories and news through an admin panel built with FilamentPHP.

# Requirements
PHP 8.1 or higher
Composer
MySQL
Laravel (latest version)
FilamentPHP

# Installation
**Clone the Repository:**
git clone https://github.com/Raneem-ayman/blog-system.git
cd blog-system

**Install Dependencies:**
composer install

**Set Up Environment File:**
Copy the .env.example file to .env and update it with your database configuration.

**Generate Application Key:**
php artisan key:generate

**Run Migrations:**
php artisan migrate

**Seed the Database (Optional):**
php artisan db:seed

**Start the Development Server:**
php artisan serve

**Admin Panel**
Access the admin panel at http://localhost:8000/admin to manage news categories, news items, and scheduling.



