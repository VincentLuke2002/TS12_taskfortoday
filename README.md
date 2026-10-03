# Tasks for Today Management System

A CodeIgniter 4 task-management application created for IT0049 Web System Technologies. It includes a date-filtered dashboard, a complete task list, a database-backed profile, and a static developer page.

## Requirements

- PHP 8.2 or newer with `intl`, `mbstring`, and `mysqli`
- Composer 2
- MySQL or MariaDB

## Setup

1. Clone or extract the project.
2. Run `composer install`.
3. Copy `env` to `.env`.
4. Set `CI_ENVIRONMENT = development` in `.env`.
5. Create a MySQL database named `tasks_for_today`.
6. Update the database values in `.env`:

```ini
database.default.hostname = localhost
database.default.database = tasks_for_today
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

7. Set your name for the About page:

```ini
app.developerName = "Vincent Luke Elpedez"
```

8. Create and populate the tables:

```bash
php spark migrate
php spark db:seed DatabaseSeeder
```

9. Start the development server:

```bash
php spark serve
```

Open `http://localhost:8080`.

## Required pages

| Route | Purpose |
|---|---|
| `/` | Displays only tasks where `task_date` is today |
| `/tasks` | Displays every task, grouped and ordered by date |
| `/profile` | Displays the single demo user record |
| `/about` | Identifies the developer and explains the project |

## Database options

The recommended setup uses the migrations and `DatabaseSeeder`. A MySQL export is also included at `database/tasks_for_today.sql`. Both seed paths create ten tasks across five dates and exactly one demo user. Dates are generated relative to the day the data is inserted, so the dashboard always receives current-day records.

## Project structure

- `app/Controllers` contains the four page controllers.
- `app/Models` contains `TaskModel` and `UserModel`.
- `app/Views` contains the shared layout and page views.
- `app/Database/Migrations` defines the assignment schema.
- `app/Database/Seeds/DatabaseSeeder.php` provides sample records.
- `public/assets` contains the original responsive interface.

## Before submitting

- Replace the demo name and email if your instructor expects your own details.
- Set `app.developerName` to your full name.
- Confirm all four routes work on the hosted server.
- Commit the raw files, migrations, seeder, SQL export, and README to GitHub.
- Do not commit `.env` or `vendor`.
