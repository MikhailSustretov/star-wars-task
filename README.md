# Star Wars library app

---

### This app is a library of character data from the Star Wars movie series. Also in the application it is possible to add new data about new characters.

#### Requires:

- PHP 8.1.0
- MySql 8.0.28
- Composer 2.2.6
- Laravel Framework 9.5.1
---
#### Getting Started:

- Copy the repository to your local machine.
- Create mysql database.
- From the file **.env.example**, make an **.env file** with changed values of **DB_DATABASE**, **DB_USERNAME**, **
  DB_PASSWORD** to the name of your database, login and password of your mysql.
- Run ```npm install``` in terminal for installing all packages.
- Run ```php artisan key:generate``` in terminal to generate your app key.
- Run ```php artisan module:migrate``` in terminal to create tables and ```php artisan db:seed``` to seed them.
---
#### Project architecture:

- The project was implemented using the standard architecture of the **MVC**. 
- For easier orientation in its structure, the [nwidart/laravel-modules](https://github.com/nWidart/laravel-modules) package is used.
- Implemented a **Repository** pattern to separate the logic of accessing the database from the controller.
- The project contains **Services** to separate the business logic of the request from the controller.
