<p align="center">
  <img src="https://github.com/VGontier-cmd/BlueWiCan/blob/master/public/images/stellantis-small-logo.png?raw=true"/>
  
  
  <div align="center">
  
   <a href="">[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)</a>
   <a href="">![Last Update](https://img.shields.io/github/last-commit/VGontier-cmd/BlueWiCan)</a>
   <a href="">[![Maintenance](https://img.shields.io/badge/Maintained%3F-no-red.svg)](https://bitbucket.org/lbesson/ansi-colors)</a>
  
  </div>
</p>

# BlueWiCan App

The BlueWiCan project aims at developing a web application able to receive CAN frames sent directly from a Bluetooth or Wifi module named BlueWiCan. This application will allow the user to visualize the CAN data and analyze them in real-time.



## Authors

- [@VGontier-cmd](https://www.github.com/VGontier-cmd)
- [@Gimly-76](https://www.github.com/Gimly-76)
- [@NathanCarel](https://www.github.com/NathanCarel)


## Introduction

Welcome to the BlueWiCan project !

This project was realized for an engineering school end of study project for a French company : <a href="https://www.stellantis.com">Stellantis</a>.

This documentation will provide all the necessary information to understand the operation of the application, including installation instructions, user guides and technical specifications. We hope this documentation will help you get the most out of the BlueWiCan application.


## Technologies used

This application was developed using the Laravel framework, a PHP framework using the MVC architecture to build web applications.

Here is the list of technologies used to build this first piece of application:

- __Laravel 9__, PHP MVC framework
- __PHP >= 8.0__, essential for the use of the version 9 of Laravel
- __Composer__, a package manager (for PHP libraries)
- __MySQL__, as database server.
- __Node.js__
- __Vue.js__, a javascript framework used for web interfaces
- __Bootstrap__, a collection of tools useful for the creation of web design and web applications.


## How to install

Clone the projet

```
$ git clone https://github.com/VGontier-cmd/BlueWiCan
```

Once the folder is downloaded, open a terminal at the root of the project and run the following command to reinstall all php packages in the /vendor folder.
```
$ compose install
```

This command allows you to install the dependencies of your application, defined in the composer.json file. The composer.json file contains a list of PHP packages that your Laravel application depends on to run. These packages include third-party libraries, tools and dependencies of the Laravel framework itself. When you run the compose install command, Composer reads the composer.json file, downloads the listed packages, installs those packages, and stores them in your application's vendor folder. This command will also create a composer.lock file that stores the exact version of each installed package, ensuring that your application uses the same package versions on all environments.

The compose install command is often used when installing a Laravel application for the first time, after a branch merge or when adding new packages to the application. It is important to note that you must run this command every time you update your composer.json file for the changes to take effect.

In short, this is an easy way to install all the dependencies your Laravel application needs to run.

Do the same for JavaScript dependencies by running the npm install command to install the dependencies defined in the package.json file.

```
$ npm install 
```

When you run the npm install command, npm reads the package.json file, downloads the listed packages, installs these packages and stores them in the /node_modules folder of your project.

This command will also create a package-lock.json file that stores the exact version of each installed package, ensuring that your application uses the same package versions on all environments.

It is important to note that the /node_modules folder can contain a large number of files, depending on the number and size of the installed packages. It is therefore advisable to ignore it in your version manager (for example Git) by adding node_modules to your .gitignore file.


## Database 

In order to configure your local database, open the project in your IDE.

A .env configuration file located at the root of the project gathers environment variables allowing to configuration of the application and the database.

```
DB_CONNECTION=mysql 
DB_HOST=127.0.0.1 
DB_PORT=3306 
DB_DATABASE=BlueWiCan 
DB_USERNAME=root 
DB_PASSWORD=
```

Replace these variables already present in the file with the configuration above.

Note that the application caches different files like .env and web.php in the /bootstrap folder (nothing to do with the CSS framework). Therefore, each time you modify these files it is important to run the following command to empty the caches.

```
$ php artisan optimize
```

The management of your database is done in the /database folder. This folder also contains a sub-folder for database migrations /database/migrations in which you will find all the database migrations for adding, deleting, and modifying tables.

Here is an example of a migration we created for the addition of the can_datas table.


This table contains the following fields:

- __data_id__: the primary key of the auto-incrementing table.
- __id__ : the id of the frame
- __data__: the data of the frame
- __length__ : the size of the frame
- __created_at__ : creation date of the frame
- __updated_at__ : date of modification of the frame
- The __created_at__ and __updated_at__ columns are created by the timestamps method.

You can create your own migrations, for more information consult the Laravel documentation.

To create the database and all the tables, you can execute the migrations with the following command
```
$ php artisan migrate 
```
You can now access your local database with phpMyAdmin.


## How to use 

To start using and developing the application you need to start your apache server, either using the Laravel server by running the following command:
```
$ php artisan serve
```
Or you can use UWAMP, WAMPP, XAMPP, or Laragon if you don't want to complicate your life (recommended for Laravel projects).

Laravel uses a modern front-end build tool that provides an extremely fast development environment and packages your code for production. When building applications with Laravel, you'll typically use Vite to bundle your application's CSS and JavaScript files into production-ready assets.

You can configure your assets in the vite.config.js file at the root of the project.


Therefore, to compile the style and script assets you need to run the following command in a VSCODE terminal.

```
$ npm run dev
```

Let the server run quickly while you develop in order to compile the JS or SCSS scripts if you make any changes.


Then go to your local web application via your browser.

## Important Note

Most of the files in Laravel are cached. So when modifying them, it may be helpful to run the following command

```
$ php artisan optimize
```

Learn more about this subject to better understand, especially with the <a href="https://laravel.com/docs/9.x">documentation of Laravel</a>.

