# Work Logger

## Overview

Work Logger is a web application built to efficiently manage tasks, track working hours, and generate reports for invoicing. The application utilizes Laravel on the backend for its robust framework and Vue.js on the frontend for a responsive and dynamic user interface.

## Features

### 1. Laravel Jetstream Integration

Work Logger is scaffolded using Laravel Jetstream, allowing for a quick and easy setup of the application's boilerplate. Jetstream provides essential authentication, API support, and other features that enhance the development process.

### 2. Task Management

The primary purpose of Work Logger is to facilitate task management. Users can create contacts, assign tasks to them, and log the number of hours spent on each task. This functionality is crucial for businesses looking to keep track of project progress and employee productivity.

### 3. Reporting

Work Logger offers the ability to generate comprehensive reports of completed tasks. These reports serve as a valuable resource for assessing project timelines, individual performance, and overall productivity. The generated reports can be exported or used to create invoices for clients.

### 4. Stripe API Integration

To streamline the payment process, Work Logger integrates with the Stripe API. This enables secure and efficient payment processing, allowing businesses to manage financial transactions seamlessly.

## Setup Instructions

Follow these steps to set up the Work Logger application on your local environment:

### Prerequisites

-   Ensure you have PHP, Composer, Node.js, and npm installed on your machine.
-   Set up a MySQL or another compatible database server.

### Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/joselara/worklogger
    ```

2. Navigate to the project directory:

    ```bash
    cd work-logger
    ```

3. Install PHP dependencies:

    ```bash
    composer install
    ```

4. Install Node.js dependencies:

    ```bash
    pnpm install && pnpm run dev
    ```

5. Copy the `.env.example` file to `.env` and configure the database connection settings:

    ```bash
    cp .env.example .env
    ```

6. Generate the application key:

    ```bash
    php artisan key:generate
    ```

7. Migrate the database:

    ```bash
    php artisan migrate
    ```

8. Seed the database with sample data (optional):

    ```bash
    php artisan db:seed
    ```

9. Start the development server:

    ```bash
    php artisan serve
    ```

10. Access the application in your browser at `http://localhost:8000`.

## Usage

1. Register for an account or log in if you already have one.
2. Create contacts and assign tasks to them.
3. WIP: Log hours for each task.
4. Todo: Generate reports to analyze completed tasks.
5. Todo: Integrate with Stripe API for payment processing.

Feel free to contribute to the project by submitting bug reports, feature requests, or pull requests.
