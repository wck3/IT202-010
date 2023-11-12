# PCB's

PCB's is a straightforward e-commerce site designed for users to shop for PC parts. Administrators or store owners can efficiently manage inventory, and users have the capability to handle their carts and place orders.

## Getting Started

Website Link: [PCB's, deployed on Heroku](https://wck3-prod.herokuapp.com/Project/shop.php)

Video Demonstration (before revisions): [YouTube Video](https://www.youtube.com/watch?v=RQPzg4SYO60)

## Technologies Used

PC Shop Concept is built using the following technologies:

- [PHP](https://www.php.net/)
- [HTML](https://developer.mozilla.org/en-US/docs/Web/HTML)
- [Bootstrap](https://getbootstrap.com/)
- [MySQL](https://www.mysql.com/)
- [JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript)

## Features

### User Management

- **User Registration and Login:**
  - Users can register with a unique username, email, and password.
  - Passwords are securely hashed, and email and username uniqueness is enforced.
  - User-friendly login with support for both email and username.

- **Profile Management:**
  - Users can view and edit their profiles, ensuring a personalized experience.
  - Profile edits are subject to username and email availability checks.

- **Role-based Access Control:**
  - Implemented roles and permissions for administrators and users.
  - Administrators have the authority to manage roles, ensuring secure access.

### Inventory Management

- **Product Management:**
  - Admins can add products to the inventory, including details like name, description, category, stock, and unit price.
  - Products are categorized and can be easily managed by administrators.

- **Shop and Product Details:**
  - Users can view a public shop page, with options to filter and sort products.
  - Detailed product pages provide information like name, description, unit price, stock, and category.

### Cart and Checkout

- **Cart Functionality:**
  - Users can add items to their cart, adjust quantities, and remove items.
  - Cart information is stored securely for logged-in users.

- **Checkout Process:**
  - A secure checkout process is implemented, including address input and payment method selection.
  - Orders are recorded in the database, and product quantities are appropriately updated.

- **Order Confirmation and History:**
  - Users receive an order confirmation with detailed information.
  - Purchase history is available, showing recent orders with filtering options.

### Additional Features

- **Public/Private Profiles:**
  - Users can set their profiles to be public or private.
  - Email addresses are hidden from other users for public profiles.

- **Product Ratings:**
  - Users can rate products they purchased, with reviews visible on product pages.
  - Average ratings are displayed for each product.

- **Enhanced Purchase History:**
  - Users and administrators can filter, sort, and paginate purchase history for better usability.

- **Admin Tools:**
  - Store owners can view products out of stock and manage all purchase history.
  - Product lists include pagination, and products can be sorted by average rating.



