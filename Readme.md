Secure Laravel Task Management System
Project Description

This project is a Secure Web Application developed using the Laravel framework.
It is a Task Management System that allows users to securely create, view, update, and delete tasks while enforcing secure coding practices based on OWASP Top 10 and OWASP ASVS guidelines.

The system demonstrates:

Secure authentication and authorization

Role-based access control (Admin & User)

Input validation and output encoding

Logging and monitoring through audit logs

Protection against common web vulnerabilities such as SQL Injection and XSS

⚙️ Installation Steps
1️⃣ Prerequisites

Make sure the following are installed:

PHP 8.1+

Composer

MySQL / MariaDB

Node.js & NPM

Git

2️⃣ Clone the Repository
git clone https://github.com/Hgkua5209/secure-laravel-app.git
cd secure-laravel-app

3️⃣ Install Dependencies
composer install
npm install
npm run build

4️⃣ Environment Configuration

Copy the example environment file:

cp .env.example .env


Edit .env and configure your database:

DB_DATABASE=secureapp
DB_USERNAME=root
DB_PASSWORD=

5️⃣ Generate Application Key
php artisan key:generate

6️⃣ Database Setup

Create the database manually in MySQL:

CREATE DATABASE secureapp;


Run migrations:

php artisan migrate


(Optional) Seed roles manually:

INSERT INTO roles (id, name, guard_name, created_at, updated_at)
VALUES
(1, 'Admin', 'web', NOW(), NOW()),
(2, 'User', 'web', NOW(), NOW());


