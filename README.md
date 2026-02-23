# College Management System

A comprehensive Laravel-based College Management System for managing academic departments, faculty, courses, and institutional activities.

## Features

- **Department Management**: Create and manage academic departments
- **Faculty Management**: Handle faculty information and assignments
- **Course Management**: Manage courses, programs, and enrollment
- **Activity Logging**: Track system events and activities
- **Settings Configuration**: Centralized configuration management
- **RESTful API**: Complete API endpoints for all resources

## Database Schema

### Core Tables

1. **Departments**
   - Academic divisions (Computer Science, Engineering, etc.)
   - Department head information
   - Contact details and location

2. **Faculty**
   - Teacher/Professor information
   - Linked to departments
   - Qualification and specialization details

3. **Courses**
   - Academic programs and subjects
   - Linked to departments
   - Duration, fees, and seat information

4. **Activities**
   - System logs and events
   - Event management
   - Activity tracking

5. **Settings**
   - Global site configuration
   - Institutional information
   - System preferences

## Installation

1. **Clone the repository**
   ```bash
   cd /path/to/your/directory
   # Laravel project already created in college-management-system directory
   ```

2. **Database Setup**
   - Create a MySQL database named `college_management`
   - Update `.env` file with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=college_management
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

3. **Run Migrations and Seeders**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

4. **Start the Development Server**
   ```bash
   php artisan serve
   ```

## API Endpoints

### Departments
- `GET /api/departments` - List all departments
- `POST /api/departments` - Create new department
- `GET /api/departments/{id}` - Get department details
- `PUT /api/departments/{id}` - Update department
- `DELETE /api/departments/{id}` - Delete department

### Faculty
- `GET /api/faculty` - List all faculty members
- `GET /api/faculty/{id}` - Get faculty details
- `GET /api/departments/{id}/faculty` - Get faculty by department

### Courses
- `GET /api/courses` - List all courses
- `GET /api/courses/{id}` - Get course details
- `GET /api/departments/{id}/courses` - Get courses by department

### Settings
- `GET /api/settings` - List all settings
- `GET /api/settings/{key}` - Get specific setting
- `POST /api/settings` - Create/update setting

## Default Admin User

After running the seeders, you can login with:
- Email: `admin@college.edu`
- Password: `password`

## Project Structure

```
college-management-system/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── DepartmentController.php
│   │       ├── FacultyController.php
│   │       ├── CourseController.php
│   │       └── SettingController.php
│   └── Models/
│       ├── Department.php
│       ├── Faculty.php
│       ├── Course.php
│       ├── Activity.php
│       └── Setting.php
├── database/
│   ├── migrations/
│   │   ├── create_departments_table.php
│   │   ├── create_faculty_table.php
│   │   ├── create_courses_table.php
│   │   ├── create_activities_table.php
│   │   └── create_settings_table.php
│   └── seeders/
│       ├── DepartmentSeeder.php
│       ├── FacultySeeder.php
│       ├── CourseSeeder.php
│       └── SettingSeeder.php
├── routes/
│   └── web.php
└── .env
```

## Technologies Used

- **Laravel 12.x** - PHP Framework
- **MySQL** - Database
- **PHP 8.3** - Server-side language
- **Composer** - Dependency Management

## Development

To start development:
1. Ensure all dependencies are installed
2. Configure your database in `.env`
3. Run migrations and seeders
4. Start the development server with `php artisan serve`

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).# sndt
