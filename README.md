
# 🎓 Student Registration System

A web based student registration system built with **Laravel** to register and manage student information. It includes CRUD for students and **Laravel Breeze** authentication.

---

## 🚀 Features

### Core
- ➕ Add new students
- 📄 View all students
- ✏️ Edit student details
- 🗑️ Delete student records

### Additional
- 🔐 Authentication via Laravel Breeze (login, register, password reset)

---

## 🛠️ Tech Stack
- **Framework**: Laravel (latest stable)
- **Database**: MySQL
- **Frontend**: Blade templates
- **Build Tool**: Vite
- **IDE**: VS Code
- **DB GUI**: MySQL Workbench

---

## 📦 Prerequisites
Make sure you have:
- PHP (compatible with Laravel 12)
- Composer
- Node.js & npm
- MySQL Server
- Laravel environment (Herd, XAMPP, Laragon, etc.)

---

## 🗄️ Database Configuration
1. Create a MySQL database named `studentregister`.
2. Copy `.env.example` to `.env` (if not present):
   ```bash
   cp .env.example .env
   ```
3. Update **.env** database fields:
   ```env
   DB_DATABASE=studentregister
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   DB_HOST=127.0.0.1
   DB_PORT=3306
   ```
4. Generate app key & run migrations:
   ```bash
   php artisan key:generate
   php artisan migrate
   ```

> **Troubleshooting:**
> - Ensure MySQL server is running
> - Verify `.env` DB credentials
> - If using Herd, keep project inside Herd directory (recommended)

---

## ▶️ Quick Start

### Option A: One liner install script (macOS/Linux)
```bash
curl -sSL https://raw.githubusercontent.com/your-org/your-repo/main/install.sh | bash
```

### Option B: PowerShell install (Windows)
```powershell
irm https://raw.githubusercontent.com/your-org/your-repo/main/install.ps1 | iex
```

> Replace `your-org/your-repo` with your actual GitHub path, or run the local scripts included in this repo: `./install.sh` (macOS/Linux) or `./install.ps1` (Windows PowerShell).

---

## ▶️ Run Manually (without scripts)
```bash
# 1) Install PHP deps
composer install

# 2) Install frontend deps
npm install

# 3) Build assets for dev
npm run dev

# 4) Configure env & DB
cp -n .env.example .env || true
php artisan key:generate
php artisan migrate

# 5) Start servers
# If not using Herd
php artisan serve
# Visit the URL shown (usually http://127.0.0.1:8000)
```

---

## 📁 Project Structure
```
project-root/
├── resources/
│   └── views/                # Blade templates (frontend)
├── routes/
│   └── web.php               # Web routes
├── app/
│   ├── Models/               # Eloquent models
│   └── Http/
│       └── Controllers/
│           └── StudentController.php
├── database/
│   └── migrations/           # Database schema definitions
└── public/
```

---

## 🧪 Common Commands
```bash
# Run dev asset server
npm run dev

# Build for production
npm run build

# Run migrations & seeders (if any)
php artisan migrate --seed

# Rollback last migration batch
php artisan migrate:rollback
```

---

## 🔒 Authentication (Breeze)
If Breeze isn't installed yet (fresh clone without vendor assets), you can add it with:
```bash
composer require laravel/breeze --dev
php artisan breeze:install blade
npm install && npm run dev
```
---

## 📄 License
This project is licensed under the MIT License. See `LICENSE` for details.

---

## 🙌 Contributing
1. Fork the repo
2. Create your feature branch: `git checkout -b feat/your-feature`
3. Commit: `git commit -m "feat: add your feature"`
4. Push: `git push origin feat/your-feature`
5. Open a Pull Request



<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
