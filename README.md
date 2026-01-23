# PineappleSoup Studio - Official Website

This repository contains the source code for the official website of **PineappleSoup Studio**, a fictional independent game development studio. This project is a full-featured web application built from scratch, designed to serve as a central hub for the studio's community, press, and potential hires.

It demonstrates a wide range of modern web development practices, including a hybrid database model, full localization, a custom admin panel, and an interactive e-commerce prototype, all containerized with Docker.

---

## ✨ Key Features

-   **Dynamic Content Management**: A secure admin panel for publishing and managing news, leveraging a flexible NoSQL database.
-   **Full Localization (i18n)**: Seamlessly switch between English and Russian. The entire site, including dynamic content from the database, is translated.
-   **Robust Authentication System**: User registration with email verification (via PHPMailer and Gmail SMTP), secure login, and role-based access control (User vs. Admin).
-   **Hybrid Database Model**:
    -   **PostgreSQL**: For structured, relational data (users, roles).
    -   **MongoDB**: For unstructured, flexible data (news, merch products, reviews).
-   **E-commerce Prototype ("Merch" Store)**:
    -   Product catalog loaded from MongoDB.
    -   Server-side shopping cart using PHP sessions.
    -   Multi-currency support (USD, EUR, RUB, etc.) with on-the-fly price conversion.
    -   A complete review and rating system (users can only review items they've "purchased").
-   **Interactive Frontend**:
    -   Stunning, responsive design that works on all devices.
    -   Complex nested sliders (built with **Swiper.js**) on the homepage, featuring game info and an auto-playing screenshot carousel.
    -   Smooth "fade-in-on-scroll" animations powered by the **Intersection Observer API**.
    -   Atmospheric animated "fog" effect for an immersive user experience.
-   **Admin Analytics Dashboard**: An interactive page for demonstrating and running a wide variety of MongoDB queries (simple filters, sorting, complex aggregations, text search) directly from the UI, created for academic and demonstration purposes.

---

## 🛠️ Tech Stack

The project is fully containerized using **Docker** and **Docker Compose**, ensuring a consistent and easily reproducible development environment.

### **Backend**
-   **PHP 8**: All business logic is written in modern, native PHP.
-   **Nginx**: High-performance web server acting as a reverse proxy for PHP-FPM.
-   **PostgreSQL 13**: Used as the primary relational database for user data.
-   **MongoDB 5.0**: Used as the NoSQL document store for all content.
-   **Composer**: For managing PHP dependencies (`PHPMailer`, `mongodb/mongodb`).
-   **PHPMailer**: For sending transactional emails (e.g., registration confirmation).

### **Frontend**
-   **HTML5 & CSS3**: Clean, semantic markup and modern styling.
-   **Vanilla JavaScript (ES6+)**: All interactive features are built with native JavaScript.
-   **Swiper.js**: For creating powerful and responsive sliders.
-   **Font Awesome**: For icons.

---

## 🚀 Getting Started

### **Prerequisites**
-   [Docker](https://www.docker.com/get-started) and [Docker Compose](https://docs.docker.com/compose/install/) must be installed.
-   Git.

### **Installation & Setup**

1.  **Clone the repository:**
    ```bash
    git clone https://github.com/your-username/gamedev-studio-website.git
    cd gamedev-studio-website
    ```

2.  **Create the environment file:**
    Create a `.env` file in the root directory by copying the example file:
    ```bash
    cp .env.example .env
    ```
    Now, edit the `.env` file and fill in your database credentials and Gmail App Password.
    ```env
    # PostgreSQL Credentials
    DB_USER=
    DB_PASSWORD=
    DB_NAME=

    # Gmail Credentials for PHPMailer
    GMAIL_USER=your-email@gmail.com
    GMAIL_APP_PASSWORD=yourapppassword
    ```

3.  **Build and launch the Docker containers:**
    This command will build the custom PHP image and start all services in the background.
    ```bash
    docker-compose up -d --build
    ```

4.  **Install PHP dependencies:**
    Exec into the running PHP container to run Composer.
    ```bash
    docker-compose exec php composer install
    ```

5.  **Seed the database:**
    Run the setup scripts to populate the MongoDB database with merch products and create necessary indexes.
    ```bash
    # Open your browser and navigate to:
    http://localhost:8080/setup_merch.php
    ```

6.  **You're all set!**
    The application is now running. Visit **[http://localhost:8080](http://localhost:8080)** in your browser.

---

## 👤 Creating an Admin User

1.  Register a new user through the website's registration form.
2.  Confirm your email by clicking the link sent to you.
3.  Connect to your PostgreSQL database (running on `localhost:5432`) using a client like DBeaver or pgAdmin.
4.  In the `users` table, find your user record and change the value in the `role` column from `user` to `admin`.
5.  Log in with your user. You will now see the "Admin Panel" link in the header and have access to `/admin/`.

---
