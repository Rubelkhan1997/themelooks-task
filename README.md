# Project Installation Guide
This guide provides step-by-step instructions for installing  POS, a Laravel-based application, on your local machine.

# Prerequisites
Before you begin, ensure that you have the following prerequisites installed:

- PHP (version >= 8.1)
- Composer
- MySQL or any other supported database server

# Installation Steps
1) Clone the Repository:
    git clone https://github.com/Rubelkhan1997/themelooks-task.git
   
2) Navigate to the Project Directory:
   cd project_name

3) copy .env.example and save it as a .env file Create a database name database-name. Adjust the database credentials in the .env file according to your MySQL configuration

    DB_DATABASE=database-name
    DB_USERNAME=root
    DB_PASSWORD=

4) Then run the following commands
    composer install
    composer dump-autoload
    php artisan key:generate
    php artisan migrate
    php artisan serve
    
5) Access the Application:
   Open your web browser and navigate to [http://localhost:8000] or the specified URL.

   
