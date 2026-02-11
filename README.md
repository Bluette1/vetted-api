# 🐾 Vetted API

> Calm insights. Thoughtful care.  
> The backend RESTful API for **Vetted**, a modern pet wellness and health tracking application.

---

## 🚀 Overview

**Vetted API** provides a robust backend infrastructure for pet owners to proactively manage their pets' health. It focuses on pattern recognition, wellness tracking, and secure medical record storage.

Built with **Laravel 11**, this API handles everything from authentication and weighted history tracking to a rule-based "Insight Engine" that detects behavioral or health anomalies.

## ✨ Core Features

-   **🔐 Secure Authentication**: Token-based API authentication using **Laravel Sanctum**.
-   **🐶 Pet Management**: Comprehensive pet profiles including species, breed, and automated weight history tracking.
-   **📁 Health Records**: Digital vault for medical events (vaccinations, medications, vet visits) with **secure document/image uploads**.
-   **📊 Wellness Monitoring**: Daily tracking for appetite, energy, mood, and activity with 1-5 rating systems.
-   **🧠 Insight Engine**: Rule-based logic that monitors data trends to provide proactive health summaries (e.g., alert if appetite drops for multiple days).
-   **🔗 Vet Sharing**: Generation of unique, secure tokens for read-only public access to pet health summaries for veterinarians.
-   **🎯 Training & Habits**: Goal-setting system for skills and habits with completion tracking.

## 🛠️ Tech Stack

-   **Framework**: [Laravel 11.x](https://laravel.com)
-   **Language**: PHP 8.2+
-   **Database**: MySQL / PostgreSQL (currently configured for MySQL)
-   **Auth**: Laravel Sanctum
-   **Storage**: Local Driver (linked to public disk)

## ⚙️ Installation & Setup

### 1. Clone the repository
```bash
git clone https://github.com/Bluette1/vetted-api.git
cd vetted-api
```

### 2. Install dependencies
```bash
composer install
```

### 3. Environment Configuration
Copy the example environment file and update your database credentials.
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Setup
Ensure your database exists and is accessible, then run the migrations.
```bash
php artisan migrate
```

### 5. Storage Link
Enable public access to uploaded health documents.
```bash
php artisan storage:link
```

### 6. Run the server
```bash
php artisan serve
```

## 📖 API Documentation

Refer to [BACKEND_API_SPECS.md](./BACKEND_API_SPECS.md) for detailed information on endpoints, request parameters, and example responses.

## 📄 License

Original project by [Bluette1](https://github.com/Bluette1). Shared under the MIT License.
