# Online Grocery Shop

An e-commerce platform for shopping groceries online, built with `Laravel 11` for the backend, and **Vue.js** with **Inertia.js** for the frontend. The platform allows users to browse, add products to their cart, and make secure payments online. The frontend layouts are based on the **FreshCart** template, which I adapted to fit the project's needs.

## Key Features:
- **User Management**: Users can register with `OTP-based email verification`, authenticate using `JWT`, and recover their password via email OTP. They can manage profile settings, update their home or office address, view order history, and delete their account (soft deletion to maintain data consistency).
- **Product Management**: Users can browse products, add them to their cart (stored in local storage), or wishlist (stored in the database).
- **Admin Panel**: Admins can create and manage product categories, add products, and control stock availability. They can also track orders, manage invoices, and check total sales.
- **Payment Integration**: `SSLCOMMERZ` payment gateway supports online payments, with both **COD** and `SSLCOMMERZ` options for checkout.
- **Responsive UI**: The frontend is built with `Vue.js` and `Inertia.js`, providing a dynamic, single-page application experience, with layouts adapted from the **FreshCart** template.

## Tech Stack:
- **Backend**: `PHP`, `Laravel 11`
- **Frontend**: `Vue 3`, `Inertia.js`, `Bootstrap`
- **Database**: `MySQL`
- **Authentication**: `JWT`
- **Payment Gateway**: `SSLCOMMERZ`
- **Libraries**: `Quill`, `Slick Carousel`, `Vue 3 Toastify`, and more.

The platform is designed to provide a modern, secure, and seamless online grocery shopping experience, combining easy navigation, secure authentication, and smooth order management.

![Hits](https://hits.seeyoufarm.com/api/count/incr/badge.svg?url=https://github.com/NahidHassanOfficial/GroceryShop-Ecommerce)
