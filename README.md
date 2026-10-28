
# PT1 - Protein Shaker Bottle Management System

## Project Overview

The Protein Shaker Bottle Management System is a web-based
application developed for Project Tutorial 1 (PT1).

The system demonstrates the management of products, customers,
staff, orders, order details, and sales invoices using PHP,
HTML, CSS, Bootstrap 5, and JavaScript.

The product collection consists of 30 different Protein
Shaker Bottle models.

This project is developed for educational and demonstration
purposes.

## Technologies Used

- HTML5 - Website structure
- CSS3 - Custom styling
- Bootstrap 5 - Responsive interface
- JavaScript - Interactive functionality
- PHP - Server-side page generation
- Laragon - Local development environment
- Visual Studio Code - Code editor
- Git - Version control
- GitHub - Source code repository

## System Features

### 1. Home Page
- Displays a welcome message.
- Provides an overview of the system.
- Includes navigation to the main modules.

### 2. Products Management
- Displays 30 Protein Shaker Bottle models.
- Shows product images, numbers, names, and prices.
- Supports adding new products.
- Supports editing product information.
- Supports deleting products.
- Provides product search functionality.

### 3. Customers Management
- Displays customer information.
- Supports adding customers.
- Supports editing customer details.
- Supports deleting customers.
- Provides customer search functionality.

### 4. Staff Management
- Displays staff information.
- Supports adding staff members.
- Supports editing staff details.
- Supports deleting staff members.
- Provides staff search functionality.

### 5. Orders Management
- Displays customer orders.
- Supports adding new orders.
- Supports editing order information.
- Supports deleting orders.
- Provides order search functionality.
- Allows users to view order details and invoices.

### 6. Order Details
- Displays information about the selected order.
- Provides 30 Protein Shaker Bottle models.
- Displays product images and prices.
- Allows users to add products to an order.
- Supports editing product quantities.
- Supports removing products from an order.
- Automatically calculates the grand total.

### 7. Sales Invoice
- Displays order and customer information.
- Shows products, quantities, prices, and totals.
- Calculates the invoice grand total.
- Supports printing invoices in A4 format.

## Product Collection

The system includes 30 Protein Shaker Bottle models.

Product numbers range from P001 to P030.

Example products:

| Product Number | Product Name | Price (RM) |
|----------------|--------------|------------|
| P001 | Protein Shaker Bottle - Model 1 | 25.00 |
| P002 | Protein Shaker Bottle - Model 2 | 25.00 |
| P003 | Protein Shaker Bottle - Model 3 | 25.00 |
| ... | ... | ... |
| P030 | Protein Shaker Bottle - Model 30 | 25.00 |

All product prices are demonstration values.

## Project Structure

```text
pt1/
|
|-- images/
|   |-- model1.jpg
|   |-- model2.jpg
|   |-- ...
|   |-- model30.jpg
|
|-- header.php
|-- sidebar.php
|-- footer.php
|-- layout.php
|-- home.php
|-- products.php
|-- customers.php
|-- staffs.php
|-- orders.php
|-- orderdetails.php
|-- invoice.php
|-- README.md
```

Image file extensions may vary depending on the
actual files used.

## Installation and Setup

### Requirements

Before running the project, install:

- Laragon
- Visual Studio Code
- A modern web browser

### Step 1: Download the Project

Clone the GitHub repository or download the project
as a ZIP file.

### Step 2: Move the Project Folder

Place the project inside the Laragon web directory:

C:\laragon\www\pt1

### Step 3: Start Laragon

Open Laragon and click "Start All".

### Step 4: Open the Website

Open a browser and enter:

http://localhost/pt1/home.php

### Step 5: Navigate the System

Use the sidebar to access the following modules:

- Home
- Products
- Customers
- Staffs
- Orders
- Order Details
- Invoice

## How to Use the System

### Managing Products

1. Open the Products page.
2. View the available Protein Shaker Bottle models.
3. Add a product using the Product Form.
4. Use Edit to modify product details.
5. Use Delete to remove a product.
6. Use Search to find a specific product.

### Managing Customers and Staff

1. Open the Customers or Staffs page.
2. Enter the required information.
3. Click Add to create a new entry.
4. Use Edit to update an entry.
5. Use Delete to remove an entry.
6. Use Search to filter the list.

### Creating an Order

1. Open the Orders page.
2. Enter the order number and date.
3. Select a staff member.
4. Select a customer.
5. Click Add Order.
6. Click Details to manage the order's products.

### Adding Products to an Order

1. Select a Protein Shaker Bottle model.
2. Enter the required quantity.
3. Click Add Product.
4. Review the calculated grand total.
5. Edit or delete items if necessary.
6. Click View Invoice.

### Printing an Invoice

1. Open the Invoice page.
2. Verify the order information.
3. Review the product list and grand total.
4. Click Print Invoice.
5. Select a printer or Save as PDF.

## Data Storage and Limitations

This project uses demonstration data and does not
require a database.

The Products, Customers, and Staffs pages use
JavaScript to demonstrate basic CRUD operations.

Changes made on these pages are not permanently saved.

The Orders and Order Details modules use browser
sessionStorage to temporarily retain order information
within the same browser tab.

Data stored in sessionStorage is not a permanent
replacement for a database.

Newly added customers and staff members are not
automatically synchronized with the Orders dropdowns.

## Responsive Design

Bootstrap 5 is used to support responsive layouts
on desktop, tablet, and mobile devices.

Responsive behavior can be tested using the browser's
Developer Tools.

## Version Control

Git is used to track changes throughout development.

GitHub is used to store and manage the project
source code.

## Project Purpose

This project demonstrates the implementation of a
basic web-based management interface using PHP,
Bootstrap, and JavaScript.

It focuses on user interface development, page
navigation, basic CRUD interactions, order management,
and printable invoices.

## Disclaimer

This system is a prototype developed for educational
purposes only.

It does not include user authentication, a database,
or permanent server-side data storage.
