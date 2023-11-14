## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects,


## About Livewire

The most productive way to build your next web app, Powerful, dynamic, **front-end** UIs without leaving PHP.

## Installation


## Prerequisites

Before you begin, ensure you have met the following requirements:

- [PHP](https://www.php.net/) (>= 8.1)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) and [NPM](https://www.npmjs.com/) (for asset compilation)
- [MySQL](https://www.mysql.com/) or other database system

## Getting Started

These instructions will help you set up and run the project on your local machine.

1.**Clone the repository:**

    ``bash     git clone https://github.com/your-username/project-name.git     ``

2.**Navigate to the project folder:**

    ``bash     cd project-name     ``

3.**Install Composer dependencies:**

    ``bash     composer install     ``

4.**Create a copy of the `.env` file:**

    ``bash     cp .env.example .env     ``

    Update the database configuration in the`.env` file with your database credentials.

5.**Generate an application key:**

    ``bash     php artisan key:generate     ``

6.**Run database migrations and seeders:**

    ``bash     php artisan migrate --seed     ``

7.**Install NPM dependencies and compile assets:**

    ``bash     npm install && npm run dev     ``

8.**Serve the application:**

    ``bash     php artisan serve     ``

    Your application should now be available at[http://localhost:8000](http://localhost:8000).

## Additional Steps

-**Livewire Documentation:**

    Refer to the[Livewire documentation](https://laravel-livewire.com/docs) for detailed information on using Livewire in your Laravel application.

-**Laravel Documentation:**

    Visit the[Laravel documentation](https://laravel.com/docs) for more details on Laravel features and configuration.

## ERD

Link : [ERD Pemesanan Kendaraan](https://whimsical.com/pemesanan-kendaraan-SMC7pfmeEeQEDCZWsrqetr)


## ERD

* **Akses Admin :** 

    Email : admin@mail.com

    password : password

* **Akses Pihak:**

    Email :  manager@mail.com

    password : password
