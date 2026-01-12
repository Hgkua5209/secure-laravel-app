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

Security Features Summary
✔ Input Validation

All user input is validated using Laravel’s validation rules.

Prevents malformed and malicious input.

✔ SQL Injection Protection

Uses Laravel Eloquent ORM, which utilizes prepared statements.

✔ Authentication & Session Security

Secure password hashing (Bcrypt)

CSRF protection enabled

Secure session cookies (HttpOnly & Secure flags)

✔ Access Control

Role-Based Access Control (RBAC)

Authorization via Policies and Middleware

✔ Output Encoding (XSS Protection)

Blade templates escape output automatically using {{ }}

✔ Logging & Monitoring

Security-related actions logged in audit_logs

Logs accessible only by Admin users

Stored securely in storage/logs/laravel.log

How to Run the Application

Start the Laravel development server:

php artisan serve


Open the browser and visit:

http://127.0.0.1:8000

Dependencies
Backend

Laravel Framework

Spatie Laravel Permission

Laravel Breeze (Authentication)

Frontend

Blade Templating Engine

Tailwind CSS

Vite

🖼️ Screenshots of the System

📌 Include screenshots such as:

Welcome Page
![Dashboard](screenshots/dashboard.png)

Login Page
![Dashboard](screenshots/dashboard.png)

Register Page
![Dashboard](screenshots/dashboard.png)

Dashboard (User & Admin)
![Dashboard](screenshots/dashboard.png)

Task Management Page
![Dashboard](screenshots/dashboard.png)

Audit Logs Page
![Dashboard](screenshots/dashboard.png)
