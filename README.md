# Laravel Project with MongoDB

## Prerequisites

- PHP 8.2 
- Composer
- MongoDB and MongoDB PHP Extension enabled in php.ini (`ext-mongodb`)

## 1. Clone the Repository

Clone the repository to your local machine:

```bash
git clone https://github.com/bethodg/roberto-delgado-gonzalez-tendencys-test.git
```
## 2. Install Dependencies

### Step 1: Install PHP Dependencies
First, you need to install the PHP dependencies required by the project using Composer. Composer is a dependency manager for PHP that helps you manage your project libraries and packages.

Run the following command in your project root directory to install all the necessary PHP dependencies:

```bash
composer install
```
This command will read the composer.json file in your project and install all the listed dependencies into the vendor directory.

### Step 2: Install MongoDB PHP Extension

If you haven't installed the MongoDB PHP extension (ext-mongodb), you'll need to do so. This extension is required for Laravel to interact with MongoDB.

You can install the extension using the following command:

```bash
pecl install mongodb
```
After the installation, make sure to enable the extension by adding it to your php.ini file:

```bash
extension=mongodb.so
```
Finally, restart your web server (e.g., Apache or Nginx) to apply the changes.

## 3. Configure the .env File

Open the .env file and configure the MongoDB Atlas connection:
```bash
DB_CONNECTION=mongodb
MONGO_DB_DSN=mongodb+srv://betithowfl92:robertodelgado@cluster0.sl0u2.mongodb.net/?retryWrites=true&w=majority
DB_DATABASE=laravel
DB_AUTHENTICATION_DATABASE=admin
```
### (OPTIONAL)

If you want to create your own connection in Mongo Atlas, you will need to replace the previous data for the connection and then run migrations
```bash
php artisan migrate
```

## 4. Start the Development Server

Start the Laravel development server in your route of proyect

```bash
php artisan serve
```










