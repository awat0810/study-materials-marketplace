# Study Materials Marketplace (Malzama)

A multi-role web platform where teachers upload study materials 
and students can search, order, and purchase them online.

## Features
- Teacher panel: upload and manage study materials by lesson and stage
- Student panel: search materials by lesson and stage, place orders
- Admin panel: track all platform activity, users, and orders
- Order management: pending and completed order tracking
- Billing and payment records
- Delivery status tracking

## Tech Stack
- PHP (raw, no framework)
- MySQL
- HTML / CSS / Bootstrap

## Roles
- Admin: full platform control and reporting
- Teacher: upload and manage their own materials
- Student: browse, search, and order materials

## Setup
1. Clone the repo
2. Import the SQL file from the `/database` folder into MySQL (via phpMyAdmin)
3. Copy `conn.example.php` to `conn.php` and set your database credentials
4. Run via XAMPP or any local PHP server
