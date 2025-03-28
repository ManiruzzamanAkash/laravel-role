<img src="https://demo.laradashboard.com/images/logo/lara-dashboard.png" style="width: 100%;"/>

**Lara Dashboard** - A project which manages Role, Permissions and every actions of your Laravel application. A complete solution for Role based Access Control in Laravel with Tailwind CSS integrated with all starting features including dark/lite mode, charts, tables, forms and so on...

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
 
## Project Setup
Git clone -
```console
git clone git@github.com:laradashboard/laradashboard.git
```

Go to project folder -
```console
cd laradashboard
```

Install Composer & Node Dependencies -
```console
composer install
npm install
```

Create database called - `laradashboard`

Create `.env` file by copying `.env.example` file

Generate Artisan Key or necessary linkings
```console
php artisan key:generate
php artisan storage:link
```

Migrate Database with seeder -
```console
php artisan migrate:fresh --seed
```

Run Project -
```php
php artisan serve
npm run dev
```

Since, there is any problem to seeder, Please import the .sql file directly - https://github.com/laradashboard/laradashboard/blob/master/database/sql/laradashboard.sql

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

### Other Pages
Custom Error Pages
![alt text][errorPageImage]


[dashboardImage]: https://i.ibb.co.com/Kp7VD7kD/dashboard.png "Dashboard Page Laravel Role Management"
[dashboardDarkMode]: https://i.ibb.co.com/KxGHDWM9/Screenshot-2025-03-26-at-11-12-32-AM.png "Dashboard Page Dark Mode"
[roleListImage]: https://i.ibb.co.com/ZpBtjZf6/role.png "2-Laravel-Manage-Roles"
[roleCreateImage]: https://i.ibb.co.com/NdwcDdfB/role-create.png "3-Laravel-Role-Create"
[roleEditImage]: https://i.ibb.co.com/vxr970jJ/role-edit.png "4-Laravel-Role-Edit"
[userListImage]:  https://i.ibb.co.com/ymXN6BHc/users.png "5-Laravel-Users-Manage" 
[userCreateImage]: https://i.ibb.co.com/TMMr1HbR/user-create.png "6-Laravel-User-Create"
[userLoginImage]: https://i.ibb.co.com/HDXh1G6W/login.png "7-Login-Page"
[errorPageImage]: https://i.ibb.co.com/Lhz7XH7C/403.png "8 - Error Page Handling"
[sidebarDyanamic]: https://i.ibb.co/Jpq6X8x/9-Sidebar-Manage-Dynamically.png "9-Sidebar-Manage-Dynamically"
[moduleListPage]: https://i.ibb.co.com/k62YKzC5/Module-List-Page.png
[moduleCreatePage]: https://i.ibb.co.com/xqMZ37Cy/Module-Upload-Page.png

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
