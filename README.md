![swim](https://github.com/user-attachments/assets/78a482b8-eb9a-4b90-a732-54b754b269df)

# 🏊‍♀️ Swim Club Laravel Application

This is a Laravel-based web application built for managing a swimming club's operations. The system supports different user roles including **Club Officials**, **Coaches**, and **Swimmers**, and enables them to manage squads, swimmers, training performance, race results, and events.

## 👤 User Roles

The application supports three user roles:

- **Club Official**: Full access to manage all resources.
- **Coach**: Can view and manage their assigned squad(s).
- **Swimmer**: Can view their own performance and assigned squad.

## ⚙️ Technologies Used

- Laravel 11
- PHP 8.x
- Tailwind CSS
- SQLite (default) or MySQL (optional)
- Herd (for local Laravel development)

## 📂 Features

- User authentication and role-based access control
- CRUD functionality for:
  - Swimmers
  - Coaches
  - Squads
  - Training performances
  - Race performances
  - Events
- Display of training and race results
- Dynamic linking between squads and coaches/swimmers
- Laravel Blade templating

## 🚀 Getting Started
### Prerequisites
- PHP 8.1 or higher
- Composer
- Node.js & NPM
- SQLite or MySQL
- [Herd](https://herd.laravel.com/) (recommended for running locally)

### Installation
1. **Clone the repository**:
   git clone https://github.com/pegah-khm/Swim-Club-Laravel-Application.git
   cd Swim-Club-Laravel-Application

2. **Install Dependencies**
    composer install
    npm install && npm run dev

3. **Configure Database**
   Update .env with your preferred DB connection. Example for SQLite:
      DB_CONNECTION=sqlite
      DB_DATABASE=/absolute/path/to/database.sqlite

4. **Run migrations and seeders**
   php artisan migrate:fresh --seed
   
5. **Serve the application**
   If using Herd, go to: http://swim-club.test
   Or run:
   php artisan serve

## 👥 Demo Accounts
These user roles are seeded by default:

| Role          | Email              | Password    |
|---------------|--------------------|-------------|
| Club Official | admin@admin.com    | Admin12345  |
| Swimmer       | s1@swimmer.com     | S11111111   |
| Coach         | c1@coach.com       | C11111111   |

## 📌 Notes
This project is optimised for local development.
It includes factories and seeders for easy testing.
Role-based access is enforced via custom middleware.

📨 Contact
For any questions or collaboration:
Pegah Khodakarami
[📧 LinkedIn](https://www.linkedin.com/in/pegah-khodakarami-54880b57/)
