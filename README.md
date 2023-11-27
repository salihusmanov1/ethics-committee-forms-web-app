
# Ethics Committee Forms Web Application

## Table of Contents
- [Description](#description)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Project Status](#project-status)
- [Getting Started](#getting-started)
- [Installation](#installation)


## Description

The Ethics Committee Forms Web Application is a platform designed for For Final International University students and researchers to easily submit and track their research proposals. The system allows users to register, log in, select forms, and submit them for approval. Admins, specifically deans, have the authority to review, approve, or reject forms, leaving comments for the users.

## Features

- User authentication (Register/Login)
- Form submission and tracking
- Admin panel for dean to approve/reject forms
- Comments on forms by admins
- Edit and delete forms by users if not approved yet


## Technologies Used
- PHP 8.1
- Laravel 10.10
- HTML
- CSS
- JavaScript
- Bootstrap
- MySQL

## Project Status

This project was initiated as part of a summer training program and is currently a work in progress. The development is ongoing, and new features are actively being added. While the core functionality is in place, certain aspects of the application may still be under refinement.


## Getting Started

Follow these steps to get a local copy of the project up and running on your machine.

**User Registration**

To use the application as a user, follow these steps:

1. Navigate to the registration page.
2. Fill in the required information.
3. Submit the registration form.
4. Select any form, fill it and submit.
5. Open App Status Page to see submitted forms and their status.

**Admin Credentials**

To access the admin panel as administrator, use the following credentials:

- **Username:** mirsolikh.usmonov@final.edu.tr
- **Password:** 123456

Please note that there is only one admin account.

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/your-username/ethics-committee-forms-web-app.git

2. Navigate to the project directory:

    ```bash
   cd ethics-committee-forms-web-app

3. Install dependencies:

    ```bash
    composer install

4. Create a copy of the .env file:

    ```bash
    cp .env.example .env

5. Download the MySQL File:
   Download the provided MySQL file from [here](conversion_form.sql).

6. Generate an application key:

    ```bash
    php artisan key:generate

7. Update the .env file with your database credentials.

8. Import the Database:
   Use a MySQL database management tool (e.g., phpMyAdmin, MySQL Workbench) or run the following command in your terminal to import the database:

9. Start the development server:

    ```bash
    php artisan serve


