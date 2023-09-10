#  Simple PC Shop Concept
## This project is a simple e-commerce site for users to shop for PC parts. Administrators or store owners are able to manage inventory and users can manage their cart and "place" orders.
## Github Link: https://github.com/wck3/IT202-010/tree/prod/public_html/Project
## Project Board Link: https://github.com/wck3/IT202-010/projects/1
## Website Link: https://wck3-prod.herokuapp.com/Project/login.php
## Video Demonstration: https://www.youtube.com/watch?v=RQPzg4SYO60
## Made By: William Kaminski
 
 ### Checklist and Evidence

- Milestone 1
 
  - [x] (02/22/2022) User will be able to register a new account
    - [Milestone1.md](https://github.com/wck3/IT202-010/blob/Milestone1/public_html/Project/milestone1.md)
    - [https://wck3-prod.herokuapp.com/Project/register.php](https://wck3-prod.herokuapp.com/Project/register.php)

    - Form Fields
    
      - [x] Username, email, password, confirm password(other fields optional)
      - [x] Email is required and must be validated
      - [x] Username is required
      - [x] Confirm password's match
    - Users Table
      - [x] Id, username, email, password (60 characters), created, modified
    - Password must be hashed (plain text passwords will lose points)
    - Email should be unique
    - Username should be unique
    - System should let user know if username or email is taken and allow the user to correct the error without wiping/clearing the form
      - [x] The only fields that may be cleared are the password fields
  - [x] (02/24/2022) User will be able to login to their account (given they enter the correct credentials)
    - [Milestone1.md](https://github.com/wck3/IT202-010/blob/Milestone1/public_html/Project/milestone1.md)
    - [https://wck3-prod.herokuapp.com/Project/login.php](https://wck3-prod.herokuapp.com/Project/login.php)
    - Form
      - [x] User can login with email or username
        - This can be done as a single field or as two separate fields
      - [x] Password is required
    - User should see friendly error messages when an account either doesn’t exist or if passwords don’t match
    - Logging in should fetch the user’s details (and roles) and save them into the session.
    - User will be directed to a landing page upon login
      - [x] This is a protected page (non-logged in users shouldn’t have access)
      - [x] This can be home, profile, a dashboard, etc
  - [x] (02/24/2022) User will be able to logout
    - [Milestone1.md](https://github.com/wck3/IT202-010/blob/Milestone1/public_html/Project/milestone1.md)
    - [https://wck3-prod.herokuapp.com/Project/logout.php](https://wck3-prod.herokuapp.com/Project/logout.php)
    - Logging out will redirect to login page
    - User should see a message that they’ve successfully logged out
    - Session should be destroyed (so the back button doesn’t allow them access back in)
  - [x] (03/29/2022) Basic security rules implemented
    - [Milestone1.md](https://github.com/wck3/IT202-010/blob/Milestone1/public_html/Project/milestone1.md)
    - [https://wck3-prod.herokuapp.com/Project/profile.php](https://wck3-prod.herokuapp.com/Project/profile.php)
    - Authentication
      - [x] Function to check if user is logged in 
      - [x] Function should be called on appropriate pages that only allow logged in users
    - Roles/Authorization
      - [x] Have a roles table (see below)
  - [x] (03/29/2022) Basic Roles implemented
    - [Milestone1.md](https://github.com/wck3/IT202-010/blob/Milestone1/public_html/Project/milestone1.md)
    - [https://wck3-prod.herokuapp.com/Project/admin/create_role.php](https://wck3-prod.herokuapp.com/Project/admin/create_role.php)
    - [https://wck3-prod.herokuapp.com/Project/admin/list_roles.php](https://wck3-prod.herokuapp.com/Project/admin/list_roles.php)
    - [https://wck3-prod.herokuapp.com/Project/admin/assign_roles.php](https://wck3-prod.herokuapp.com/Project/admin/assign_roles.php)
    - Have a Roles table    (id, name, description, is_active, modified, created)
    - Have a User Roles table (id, user_id, role_id, is_active, created, modified)
    - Include a function to check if a user has a specific role (we won’t use it for this milestone but it should be usable in the future)
  - [x] (03/30/2022) Site should have basic styles/theme applied; everything should be styled
    - [Milestone1.md](https://github.com/wck3/IT202-010/blob/Milestone1/public_html/Project/milestone1.md)
    - [https://wck3-prod.herokuapp.com/Project/styles.css](https://wck3-prod.herokuapp.com/Project/styles.css)
    - [https://wck3-prod.herokuapp.com/Project/home.php](https://wck3-prod.herokuapp.com/Project/home.php)
    - I.e., forms/input, navigation bar, etc
  - [x] (03/01/2022) Any output messages/errors should be “user friendly”
    - [Milestone1.md](https://github.com/wck3/IT202-010/blob/Milestone1/public_html/Project/milestone1.md)
    - [https://wck3-prod.herokuapp.com/Project/login.php](https://wck3-prod.herokuapp.com/Project/login.php)
    - Any technical errors or debug output displayed will result in a loss of points
  - [x] (03/03/2022) User will be able to see their profile
    - [Milestone1.md](https://github.com/wck3/IT202-010/blob/Milestone1/public_html/Project/milestone1.md)
    - [https://wck3-prod.herokuapp.com/Project/profile.php](https://wck3-prod.herokuapp.com/Project/profile.php)
    - Email, username, etc
  - [x] (03/03/2022) User will be able to edit their profile
    - [Milestone1.md](https://github.com/wck3/IT202-010/blob/Milestone1/public_html/Project/milestone1.md)
    - [https://wck3-prod.herokuapp.com/Project/profile.php](https://wck3-prod.herokuapp.com/Project/profile.php)
    - Changing username/email should properly check to see if it’s available before allowing the change
    - Any other fields should be properly validated
    - Allow password reset (only if the existing correct password is provided)
      - [x] Hint: logic for the password check would be similar to login

- Milestone 2
  - [x] (04/12/2022) User with an admin role or shop owner role will be able to add products to inventory
    - [Milestone2.md](https://github.com/wck3/IT202-010/blob/Milestone2/public_html/Project/milestone2.md)
    - [https://wck3-prod.herokuapp.com/Project/add_product.php](https://wck3-prod.herokuapp.com/Project/admin/add_product.php)
    - Table should be called Products (id, name, description, category, stock, created, modified, unit_price, visibility [true, false])
  - [x] (04/15/2022) Any user will be able to see products with visibility = true on the Shop page
    - [Milestone2.md](https://github.com/wck3/IT202-010/blob/Milestone2/public_html/Project/milestone2.md)
    - [https://wck3-prod.herokuapp.com/Project/shop.php](https://wck3-prod.herokuapp.com/Project/shop.php)
    - Product list page will be public (i.e. doesn’t require login)
    - For now limit results to 10 most recent
    - User will be able to filter results by category
    - User will be able to filter results by partial matches on the name
    - User will be able to sort results by price
    - All filters are additive
  - [x] (04/13/2022) Admin/Shop owner will be able to see products with any visibility
    - [Milestone2.md](https://github.com/wck3/IT202-010/blob/Milestone2/public_html/Project/milestone2.md)
    - [https://wck3-prod.herokuapp.com/Project/shop.php](https://wck3-prod.herokuapp.com/Project/shop.php)
      or
    - [https://wck3-prod.herokuapp.com/Project/admin/list_products.php](https://wck3-prod.herokuapp.com/Project/admin/list_products.php)
    - This should be a separate page from Shop, but will be similar
    - This page should only be accessible to the appropriate role(s)
  - [x] (04/13/2022) Admin/Shop owner will be able to edit any product
    - [Milestone2.md](https://github.com/wck3/IT202-010/blob/Milestone2/public_html/Project/milestone2.md)
    - [https://wck3-prod.herokuapp.com/Project/edit_item.php](https://wck3-prod.herokuapp.com/Project/admin/edit_item.php) 
    - Edit button should be accessible for the appropriate role(s) anywhere a product is shown (Shop list, Product Details Page, etc)
    - Edit name, description, category, stock, unit_price, visibility
  - [x] (04/12/2022) User will be able to click an item from a list and view a full page with more info about the item (Product Details Page)
    - [Milestone2.md](https://github.com/wck3/IT202-010/blob/Milestone2/public_html/Project/milestone2.md)
    - [https://wck3-prod.herokuapp.com/Project/product_details.php](https://wck3-prod.herokuapp.com/Project/product_details.php)
    - Name, description, unit_price, stock, category
  - [x] (04/16/2022) User must be logged in for any Cart related activity below
    - [Milestone2.md](https://github.com/wck3/IT202-010/blob/Milestone2/public_html/Project/milestone2.md)
    - [https://wck3-prod.herokuapp.com/Project/cart.php](https://wck3-prod.herokuapp.com/Project/cart.php) 
  - [x] (04/16/2022) User will be able to add items to Cart
    - [Milestone2.md](https://github.com/wck3/IT202-010/blob/Milestone2/public_html/Project/milestone2.md)
    - [https://wck3-prod.herokuapp.com/Project/shop.php](https://wck3-prod.herokuapp.com/Project/shop.php)
    - Cart will be table-based /(id, product_id, user_id, desired_quantity, unit_price, created, modified/)
      - [x] Choose one and cross out which one you won’t support
        - [x] If a user can have only 1 cart product_id and user_id should be a composite unique key
        - [ ] ~~If a user can have more than 1 cart, add a field called cart_id and cart_id, user_id, and product_id will be a composite unique key~~
    - Adding items to Cart will not affect the Product's quantity in the Products table
  - [x] (04/16/2022) User will be able to see their cart
    - [Milestone2.md](https://github.com/wck3/IT202-010/blob/Milestone2/public_html/Project/milestone2.md)
    - [https://wck3-prod.herokuapp.com/Project/cart.php](https://wck3-prod.herokuapp.com/Project/cart.php)  
    - List all the items
    - Show subtotal for each line item based on desired_quantity * unit_price (from the cart)
    - Show total cart value (sum of line item subtotals)
    - Will be able to click an item to see more details (Product Details Page)
  - [x] (04/17/2022) User will be able to change quantity of items in their cart
    - [Milestone2.md](https://github.com/wck3/IT202-010/blob/Milestone2/public_html/Project/milestone2.md)
    - [https://wck3-prod.herokuapp.com/Project/cart.php](https://wck3-prod.herokuapp.com/Project/cart.php)  
    - Quantity of 0 should also remove from cart
    - A negative Quantity is not valid
  - [x] (04/16/2022) User will be able to remove a single item from their cart via button click
    - [Milestone2.md](https://github.com/wck3/IT202-010/blob/Milestone2/public_html/Project/milestone2.md)
    - [https://wck3-prod.herokuapp.com/Project/cart.php](https://wck3-prod.herokuapp.com/Project/cart.php) 
  - [x] (04/17/2022) User will be able to clear their entire cart via a button click
    - [Milestone2.md](https://github.com/wck3/IT202-010/blob/Milestone2/public_html/Project/milestone2.md)
    - [https://wck3-prod.herokuapp.com/Project/cart.php](https://wck3-prod.herokuapp.com/Project/cart.php)  
 - Milestone 3
  - [x] (04/27/2022) User will be able to purchase items in their Cart
    - [Milestone3.md](https://github.com/wck3/IT202-010/blob/Milestone3/public_html/Project/milestone3.md)
    - [https://wck3-prod.herokuapp.com/Project/checkout.php](https://wck3-prod.herokuapp.com/Project/checkout.php)  
    - [x] Create an Orders table (id, user_id, created, total_price, address, payment_method, money_received)
      - [x] Payment method will simply record (Cash, Visa, MasterCard, Amex, etc) We will not be recording CC numbers or anything of that nature, this is just a sample and in real world projects you’d commonly use a third party payment processor
      - [x] Hint: This must be inserted first before you can insert into the OrderItems table
    - [x] Create an OrderItems table (id, order_id, product_id, quantity, unit_price)
      - [x] Hint: This is basically a copy of the data from the Cart table, just persisted as a purchase
    - Checkout Form
      - [x] Ask for payment method (Cash, Visa, MasterCard, Amex, etc)
      - [x] Do not ask for credit card number, this is just a sample
      - [x] Ask for a numerical value to be entered 
        - Note: this will be a fake payment check to compare against the cart total to determine if the payment succeeds
        - This will be recorded as money_received
      - [x] Ask for Address/shipping information
        - You’ll need to concatenate this into a single string to insert into the DB
    - [x] User will be asked for their Address for shipping purposes
    - [x] Address form should validate correctly
    - [x] Order process (comment each part of the process):
    - [x] Calculate Cart Items
    - [x] Verify the current product price against the Products table
      - Since our Cart is table-based it can be long lived so if a user added a Product at a sale and they attempt to purchase afterwards, it should pull the true Product cost.
      - You can also show the Cart.unit_price vs Product.unit_price to show a sale or an increase in price
    - [x] Verify desired product and desired quantity are still available in the Products table
      - Users can’t purchase more than what’s in stock
      - Show an error message and prevent order from going through if something isn’t available
      - Let the user update their cart and try again
      - Clearly show what the issue is (which product isn’t available, how much quantity is available if the cart exceeds it)
    - [x] Make an entry into the Orders table
    - [x] Get last Order ID from Orders table
    - [x] Copy the cart details into the OrderItems tables with the Order ID from the previous step
    - [x] Update the Products table Stock for each item to deduct the Ordered Quantity
    - [x] Clear out the user’s cart after successful order
    - [x] Redirect user to Order Confirmation Page
  - [x] (04/28/2022) Order Confirmation Page
      - [Milestone3.md](https://github.com/wck3/IT202-010/blob/Milestone3/public_html/Project/milestone3.md)
      - [https://wck3-prod.herokuapp.com/Project/thankyou.php](https://wck3-prod.herokuapp.com/Project/thankyou.php)   
      - Show the entire order details from the Order and OrderItems table (similar to cart)
        - [x] Including a the cost of each line item and the total value
        - [x] Show how they purchased and how much they paid
      - Displays a Thank you message
  - [x] (04/28/2022) User will be able to see their Purchase History
      - [Milestone3.md](https://github.com/wck3/IT202-010/blob/Milestone3/public_html/Project/milestone3.md)
      - [https://wck3-prod.herokuapp.com/Project/purchase_history.php](https://wck3-prod.herokuapp.com/Project/purchase_history.php)
      - [https://wck3-prod.herokuapp.com/Project/order_details.php](https://wck3-prod.herokuapp.com/Project/order_details.php)    
      - For now limit to 10 most recent orders
      - Show a summary of relevant information
      - A list item can be clicked to view the full details in the Order Details Page (similar to Order Confirmation Page except no “Thank you” message)
  - [x] (04/28/2022) Store Owner will be able to see all Purchase History
      - [Milestone3.md](https://github.com/wck3/IT202-010/blob/Milestone3/public_html/Project/milestone3.md)
      - [https://wck3-prod.herokuapp.com/Project/admin/all_purchase_hist.php](https://wck3-prod.herokuapp.com/Project/admin/all_purchase_hist.php)
      - [https://wck3-prod.herokuapp.com/Project/admin/admin_order_details.php](https://wck3-prod.herokuapp.com/Project/admin/admin_order_details.php)    
      - For now limit to 10 most recent orders
      - A list item can be clicked to view the full details in the Order Details Page (similar to Order Confirmation Page except no “Thank you” message)

- Milestone 4
  - [x] (05/02/2022) User can set their profile to be public or private (will need another column in Users table)
    - [Milestone4.md](https://github.com/wck3/IT202-010/blob/Milestone4/public_html/Project/milestone4.md)
    - [https://wck3-prod.herokuapp.com/Project/profile.php](https://wck3-prod.herokuapp.com/Project/profile.php)
    - [https://wck3-prod.herokuapp.com/Project/profile.php?id=1](https://wck3-prod.herokuapp.com/Project/profile.php?id=1)
    - [https://wck3-prod.herokuapp.com/Project/register.php](https://wck3-prod.herokuapp.com/Project/register.php)
    - If profile is public, hide email address from other users (email address should not be publicly visible to others)
  - [x] (05/04/2022) User will be able to rate a product they purchased
    - [Milestone4.md](https://github.com/wck3/IT202-010/blob/Milestone4/public_html/Project/milestone4.md)
    - [https://wck3-prod.herokuapp.com/Project/product_details.php?product_id=16](https://wck3-prod.herokuapp.com/Project/product_details.php?product_id=16)
    - Create table called Ratings (id, product_id, user_id, rating, comment, created, modified)
    - 1-5 rating
    - Text Comment (use TEXT data type in sql)
    - Must be done on the Product Details Page
    - Ratings and Rating Comments will be visible on the Product Details page
      - [x] Show the latest 10 reviews
      - [x] Paginate anything beyond 10
    - Show the average rating on the Product Details Page
  - [x] (05/04/2022) User’s Purchase History Changes
       - [Milestone4.md](https://github.com/wck3/IT202-010/blob/Milestone4/public_html/Project/milestone4.md)
      - [https://wck3-prod.herokuapp.com/Project/purchase_history.php](https://wck3-prod.herokuapp.com/Project/purchase_history.php) 
      - Filter by date range
      - Filter by category
      - Sort by total, date purchased, etc
      - Add pagination
        - [x] Any filter/sort applied must be followed during the pagination process
  - [x] (05/04/2022) Store Owner Purchase History Changes
    - [Milestone4.md](https://github.com/wck3/IT202-010/blob/Milestone4/public_html/Project/milestone4.md)
    - [https://wck3-prod.herokuapp.com/Project/admin/all_purchase_hist.php](https://wck3-prod.herokuapp.com/Project/admin/all_purchase_hist.php)
    - Filter by Date Range
    - Filter by Category
    - Sort by total, date purchased, etc
    - Add pagination
      - [x] Any filter/sort applied must be followed during the pagination process
  - [x] (05/04/2022) Add pagination to Shop Page (and any other product lists not yet mentioned)
      - [Milestone4.md](https://github.com/wck3/IT202-010/blob/Milestone4/public_html/Project/milestone4.md)
      - [https://wck3-prod.herokuapp.com/Project/shop.php](https://wck3-prod.herokuapp.com/Project/shop.php)
      - [https://wck3-prod.herokuapp.com/Project/admin/list_products.php](https://wck3-prod.herokuapp.com/Project/admin/list_products.php)
  - [x] (05/04/2022) Store Owner will be able to see all products out of stock
      - [Milestone4.md](https://github.com/wck3/IT202-010/blob/Milestone4/public_html/Project/milestone4.md)
      - [https://wck3-prod.herokuapp.com/Project/admin/list_products.php](https://wck3-prod.herokuapp.com/Project/admin/list_products.php)
      - Pagination should account for this new filter
      - Recommended to have the filter applied as a given value (i.e., where quantity is <= value)
  - [x] (05/04/2022) User can sort products by average rating on the Shop Page
      - [Milestone4.md](https://github.com/wck3/IT202-010/blob/Milestone4/public_html/Project/milestone4.md)
      - [https://wck3-prod.herokuapp.com/Project/shop.php](https://wck3-prod.herokuapp.com/Project/shop.php)
    
