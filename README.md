# Laravel Role Permission Management System - Laravel `7.x` `9.x`

A project which manage Role, Permissions and every actions of your Laravel application. A complete solution for Role based Access Control in Laravel.

**Live Demo:** http://laravel-role.herokuapp.com
```
Username - superadmin
password - 12345678
```
> **Note:** Don't try to modify the Super Admin (Role & admin) data, just for Heroku deployment.

## Requirements:
- Laravel `7.x` | `9.7`
- Spatie role permission package  `3.1.3`


## Versions:
- Laravel `7.x` & PHP -`7.x`
    - Tag - https://github.com/ManiruzzamanAkash/laravel-role/releases/tag/Laravel7.x
    - Branch - https://github.com/ManiruzzamanAkash/laravel-role/tree/Laravel7.x

- Laravel `9.7` & PHP - `8.x`


## Project Setup
Git clone -
```console
git clone https://github.com/ManiruzzamanAkash/laravel-role.git
```

Go to project folder -
```console
cd laravel-role
```

Install Laravel Dependencies -
```console
composer install
```

Create database called - `laravel_role`

Create `.env` file by copying `.env.example` file

Generate Artisan Key (If needed) -
```console
php artisan key:generate
```

Migrate Database with seeder -
```console
php artisan migrate --seed
```

Run Project -
```php
php artisan serve
```

Since, there is any problem to seeder, Please import the .sql file directly - https://github.com/ManiruzzamanAkash/laravel-role/blob/master/database/sql/laravel_role.sql

So, You've got the project of Laravel Role & Permission Management on your http://localhost:8000

## How it works
1. Login using Super Admin Credential -
    1. Username - `superadmin`
    1. Password - `12345678`
2. Create Admin
3. Create Role
4. Assign Permission to Roles
5. Assign Multiple Role to an admin
6. Check by login with the new credentials.
7. If you've not enough permission to do any task, you'll get a warning message.

## Learn More & Discussion
https://devsenv.com/tutorials/laravel-role-permission-management-system-full-example-with-source-code



### Login & Dashboard Page
![alt text][adminLoginImage]
![alt text][dashboardImage]

### Role Pages
Role List
![alt text][roleListImage]
Role Create
![alt text][roleCreateImage]
Role Edit
![alt text][roleEditImage]

### Admin Pages
Admin List
![alt text][adminListImage]
Admin Create
![alt text][adminCreateImage]

### Other Pages
Custom Error Pages
![alt text][errorPageImage]
Dynamic Sidebar Manage
![alt text][sidebarDyanamic]



[dashboardImage]: https://i.ibb.co/WyxWFp7/1-Laravel-Role-Dashboard.png "Dashboard Page Laravel Role Management"
[roleListImage]: https://i.ibb.co/80jM3Q7/2-Laravel-Manage-Roles.png "2-Laravel-Manage-Roles"
[roleCreateImage]: https://i.ibb.co/kgM1ShW/3-Laravel-Role-Create.png "3-Laravel-Role-Create"
[roleEditImage]: https://i.ibb.co/b6jNPFr/4-Laravel-Role-Edit.png "4-Laravel-Role-Edit"
[adminListImage]: https://i.ibb.co/xY2N6Qd/5-Laravel-Admin-Manage.png "5-Laravel-Admin-Manage"
[adminCreateImage]: https://i.ibb.co/Drcn6Xn/6-Laravel-Admin-Create.png "6-Laravel-Admin-Create"
[adminLoginImage]: https://i.ibb.co/4g4vs4g/7-Login-Page.png "7-Login-Page"
[errorPageImage]: https://i.ibb.co/HYcvRH4/8-Error-Page-Handle.png "8 - Error Page Handling"
[sidebarDyanamic]: https://i.ibb.co/Jpq6X8x/9-Sidebar-Manage-Dynamically.png "9-Sidebar-Manage-Dynamically"

## Wanna talk with me
Please mail me at - manirujjamanakash@gmail.com


## Support
If you like my work you may consider buying me a ☕ / 🍕

<a href="https://www.patreon.com/maniruzzaman" target="_blank" title="Buy Me A Coffee"> <img src="https://camo.githubusercontent.com/45ce6667a35b63fd6a1ba6978d030a7f52ff5b1b262c5c8aa3ece29afc469ac8/68747470733a2f2f63646e2e6275796d6561636f666665652e636f6d2f627574746f6e732f76322f64656661756c742d7265642e706e67" alt="ManiruzzamanAkash" width="200" />
 </a>

## Contribution
Contribution is open. Create Pull-request and I'll add it to the project if it's good enough.
