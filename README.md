

# E-Commerce Website Project

### This is a learning project built with **PHP & Laravel** as part of practicing modern web development concepts.  
The application provides an online bookstore where users can register, log in, purchase books, and manage their profiles.

---.

## 🚀 Project Overview
- User authentication (login, register, profile).
- Book purchasing system with order history.
- Payment integration using **PayPal** and **Stripe**.
- Email notifications for order confirmation.
- Admin panel.

---

## 🛠 Tech Stack
- **Backend:** Laravel (PHP Framework)
- **Frontend:** Blade Templates, Bootstrap CSS
- **Database:** MySQL
- **Payment:** PayPal API, Stripe API
- **Mail Service:** Mailtrap (for testing emails)


---

# Project Setup Guide

* Create a file named `.env` in the root directory of the project.
* Copy the contents from `.env.example` into `.env` and update the values as needed.
* Update the database name in `.env` to match your created database.
* Configure email settings (e.g., Mailtrap or another mail provider) in `.env` for order confirmation emails.
* Run the migrations and seed the database with demo data:

<h6>

`php artisan migrate --seed`

</h6>

* To enable image display, create a storage link:

<h6>

`php artisan storage:link`

</h6>

* Install required dependencies:

<h6>

`composer install`

</h6>

* Generate the application key:

<h6 dir="ltr">

`php artisan key:generate`

</h6>

* Configure payment gateways:

For PayPal, add your keys in `.env`:

<h6>

`PAYPAL_MODE=sandbox`<br>
`PAYPAL_SANDBOX_CLIENT_ID=`<br>
`PAYPAL_SANDBOX_CLIENT_SECRET=`<br>

</h6>

For Stripe, add your keys in `.env`:

<h6>

`STRIPE_KEY=`<br>
`STRIPE_SECRET=`<br>

</h6>

* Start the local development server:

<h6>

`php artisan serve`

</h6>

* Copy the generated link and open it in your browser to access the project.


