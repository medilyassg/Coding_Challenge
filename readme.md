# Product Management App

## Introduction

The Product Management App is a web-based application built using Laravel and Vue.js. It allows users to manage and categorize products. Users can create products from both the web interface and command line. The app also provides a product listing page with sorting by price and filtering by category.

## Features

- **Product Management:**
  - Create new products with details such as name, description, price, and image.
  - Assign products to one or more categories.
  - View and manage products from the web interface.
  - Create products using the command line.

- **Product Listing:**
  - View a list of products.
  - Sort products by price (ascending or descending).
  - Filter products by category.

## Technologies

The application is built using the following technologies:

- **Backend:**
  - Laravel (PHP7)
  - MySQL

- **Frontend:**
  - Vue.js

## Getting Started

### Prerequisites

Before you begin, ensure you have the following software installed:

- Node.js
- Composer
- PHP (version 7 or higher)
- MySQL

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/medilyassg/Coding_Challenge.git
2. Navigate to the backend directory:
   ```bash
   cd Coding_Challenge/backend
3. Install PHP dependencies using Composer:
   ```bash
   composer install
5. Configure your environment variables:

- Create a .env file by copying the .env.example file.
- Update the database and other configuration settings in the .env file.
6. Run database migrations to set up the database:
   ```bash
   php artisan migrate
   php artisan db:seed
7. Start the Laravel development server:
   ```bash
   php artisan serve

The backend should now be accessible at http://localhost:8000.

7. Navigate to the frontend directory:
   ```bash
   cd Coding_Challenge/front-end
8. Install JavaScript dependencies using npm:
   ```bash
    npm install
9. Start the Vue.js development server:
   ```bash
   npm run serve
The frontend should now be accessible at http://localhost:8080.

## Cli Command
- To create a new product from the command line, use the following command
   ```bash
   php artisan product:create 
   
## Routes :
- Access the product listing page to view and manage products by navigating to /.
- To create a new product, visit /product/create in your web browser.

## Installation

- Automated tests are included to cover product creation. You can run the tests for the backend using the   following command:
   ```bash
   cd backend
   php artisan test

