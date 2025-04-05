<img src="/public/images/logo/lara-dashboard.png" style="width: 90%;" />

**Lara Dashboard** - A project which manages Role, Permissions and every actions of your Laravel application. A complete solution for Role based Access Control in Laravel with Tailwind CSS integrated with all starting features including dark/lite mode, charts, tables, logs, forms and so on...

**Demo:** https://demo.laradashboard.com/
```
Email - superadmin@example.com
password - 12345678
```

## Requirements:
- Laravel `7.x` | `9.7` | `11.x` | `12.x`
- Spatie role permission package  `^6.4`
- PHPUnit test package `^11.x`
- Tailwind CSS >= 4.x
- Laravel Modules - https://laravelmodules.com/docs/12/getting-started/introduction
- Laravel Events (A WordPress like action/filter hooks) - https://github.com/tormjens/eventy

## Versions:
- Laravel `7.x` & PHP -`7.x`
    - Tag - https://github.com/ManiruzzamanAkash/laravel-role/releases/tag/Laravel7.x
    - Branch - https://github.com/ManiruzzamanAkash/laravel-role/tree/Laravel7.x

- Laravel `9.7` & PHP - `8.x`
    - Tag - https://github.com/ManiruzzamanAkash/laravel-role/releases/tag/Laravel9.x

- Laravel `11.x`
    - Tag - https://github.com/ManiruzzamanAkash/laravel-role/releases/tag/v11.x-main

- Laravel `12.x` & PHP >= `8.3`
    - Tag - https://github.com/ManiruzzamanAkash/laravel-role/releases/tag/Laravel12.x

- Laravel `12.x` & Tail Admin Template Integration
    - Tag - https://github.com/ManiruzzamanAkash/laravel-role/releases/tag/Laravel12.x-tailadmin

- Laravel `12.x` & Module & Action Log integration
    - Tag - https://github.com/ManiruzzamanAkash/laravel-role/releases/tag/Laravel12.x-module-logs
 
## Project Setup
**Clone and Go Project**
```console
git clone git@github.com:laradashboard/laradashboard.git
cd laradashboard
```

**Install Composer & Node Dependencies**
```console
composer install
npm install
```

**Database & env creation**
- Create database called - `laradashboard`
- Create `.env` file by copying `.env.example` file

**Generate Artisan Key or necessary linkings**
```console
php artisan key:generate
php artisan storage:link
```

**Migrate Database with seeder**
```console
php artisan migrate:fresh --seed && php artisan module:seed
```

**Run Project**
```php
php artisan serve
npm run dev
```

So, You've got the project of Laravel Role & Permission Management on your http://localhost:8000

## Previously From laravel-role
We were previously at https://github.com/ManiruzzamanAkash/laravel-role, so you need to change the URL if you moved from there
```console
git remote set-url origin git@github.com:laradashboard/laradashboard.git
```

## How it works
1. Login using Super Admin Credential -
    1. Email - `superadmin@example.com`
    1. Password - `12345678`
2. Create User
3. Create Role
4. Assign Permission to Roles
5. Assign Multiple Role to an User
6. Check by login with the new credentials.
7. If you've not enough permission to do any task, you'll get a warning message.
8. Dashboard with Beautiful chart integrated
9. Module Based Development - Custom Module Add/Enable/Disable/Delete
10. Monitoring - Every action logs of your application
10. Monitoring - Laravel Pulse

## Learn More & Discussion
https://devsenv.com/tutorials/laravel-role-permission-management-system-full-example-with-source-code

### Login & Dashboard Page
**Login Page**
![alt text][userLoginImage]

**Dashboard Page Lite Mode**
![alt text][dashboardImage]

**Dashboard Page Dark Mode**
![alt text][dashboardDarkMode]

### Role Pages
**Role List**
![alt text][roleListImage]
**Role Create**
![alt text][roleCreateImage]
**Role Edit**
![alt text][roleEditImage]

### Users Pages
**Users List**
![alt text][userListImage]
**User Create**
![alt text][userCreateImage]

### Modules Page
**Module List**
![alt text][moduleListPage]

**Upload Module**
![alt text][moduleCreatePage]

### Monitoring Pages
**Laravel Pulse**
![alt text][laravelPulsePage]

### Other Pages
Custom Error Pages
![alt text][errorPageImage]


[dashboardImage]: /demo-screenshots/Dashboard%20Page%20white%20Mode.png "Dashboard Page Laravel Role Management"
[dashboardDarkMode]:  /demo-screenshots/Dashboard%20Page%20Dark%20Mode.png "Dashboard Page Dark Mode"
[roleListImage]: /demo-screenshots/Role%20List.png "2-Laravel-Manage-Roles"
[roleCreateImage]: /demo-screenshots/Role%20Create.png "3-Laravel-Role-Create"
[roleEditImage]: /demo-screenshots/Role%20Edit.png "4-Laravel-Role-Edit"
[userListImage]:  /demo-screenshots/Users%20List.png "5-Laravel-Users-Manage" 
[userCreateImage]: /demo-screenshots/User%20Create.png "6-Laravel-User-Create"
[userLoginImage]: /demo-screenshots/login.png "7-Login-Page"
[errorPageImage]: /demo-screenshots/Custom%20Error%20Pages.png "8 - Error Page Handling"
[moduleListPage]: /demo-screenshots/Module%20List.png
[moduleCreatePage]: /demo-screenshots/Upload%20Module.png
[laravelPulsePage]: /demo-screenshots/Laravel%20Pulse%20Dashboard%20for%20Monitoring.png

## Wanna talk with me
Please mail me at - manirujjamanakash@gmail.com

## Premium Features
Please visit at Lara Dashboard to get more premium moduels - https://laradashboard.com. Premium modules included CRM, HRM, Course Managements and so on.

## Live Demo
https://demo.laradashboard.com

## Support
If you like my work you may consider buying me a ☕ / 🍕

<a href="https://www.patreon.com/maniruzzaman" target="_blank" title="Buy Me A Coffee">
    Go to Patreon
</a>

## Contribution
Contribution is open. Create Pull-request and I'll add it to the project if it's good enough.
