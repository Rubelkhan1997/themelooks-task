# Project Installation Guide

This guide provides step-by-step instructions for installing  Pos, a Laravel-based application, on your local machine.

# Prerequisites

Before you begin, ensure that you have the following prerequisites installed:

- PHP (version >= 8.1)
- Composer
- MySQL or any other supported database server

# Installation Steps

1. Clone the Repository:

git clone https://github.com/Rubelkhan1997/themelooks-task.git
   
2. Navigate to the Project Directory:

cd themelooks-task

3. Copy the Environment File:

copy .env.example and save it as a .env file Create a database name "themelooks" and import it into the Database. Adjust the database credentials in the .env file according to your MySQL configuration  

4. Install PHP Dependencies via Composer:

composer install

5. Generate Application Key:

php artisan key:generate

6. Start the Development Server:

 php artisan serve
  
7. Access the Application:

Open your web browser and navigate to [http://localhost:8000] or the specified URL.
