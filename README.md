# Currency Rate App

## Overview

A simple Laravel Nova application with a custom tool to show exchange rates of INR v/s USD, INR v/s GBP and INR v/s EUR using
[exchangeratesapi.io](http://exchangeratesapi.io) API.

## Installation

Clone the application and go to root directory and run
```bash
composer install
```
This will install all dependencies along with the custom nova tool.

##### After this follow the listed steps:
- Create a .env file by copying .env.example and update database config details like database name, username and password
- Generate APP_KEY
```bash
php artisan key:generate
```
- Run migrations to create table
```bash
php artisan migrate
```
- Create a user using which you'll be logging in the application
```bash
php artisan nova:user
```
- Finally, fire up Laravel's local development server using the Artisan CLI's
```bash
php artisan serve
```

## Usage

- Navigate to [http://127.0.0.1:8000/nova/login](http://127.0.0.1:8000/nova/login) and login using the user details created during the installation
phase.
- Select Exchange Rate from the left sidebar and you'll be able to see the tool.
- Add any number in the input field and you'll be able to see the conversion rate of the currencies with INR.

Thank You!