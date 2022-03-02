# Project Name: Simple Shop
## Project Summary: This project will create a simple e-commerce site for users. Administrators or store owners will be able to manage inventory and users will be able to manage their cart and place orders.
## Github Link: https://github.com/wck3/IT202-010/tree/prod/public_html/Project
## Project Board Link: 
## Website Link: https://wck3-prod.herokuapp.com/Projects
## Your Name: William Kaminski

<!-- Line item / Feature template (use this for each bullet point) -- DO NOT DELETE THIS SECTION


- [ ] \(mm/dd/yyyy of completion) Feature Title (from the proposal bullet point, if it's a sub-point indent it properly)
  -  Link to related .md file: [Link Name](link url)

 End Line item / Feature Template -- DO NOT DELETE THIS SECTION --> 
 
 
### Proposal Checklist and Evidence

- Milestone 1
  - [ ] User will be able to register a new account

    - Form Fields
    
      - [ ] Username, email, password, confirm password(other fields optional)
      - [ ] Email is required and must be validated
      - [ ] Username is required
      - [ ] Confirm password's match
    - Users Table
      - [ ] Id, username, email, password (60 characters), created, modified
    - Password must be hashed (plain text passwords will lose points)
    - Email should be unique
    - Username should be unique
    - System should let user know if username or email is taken and allow the user to correct the error without wiping/clearing the form
      - [ ] The only fields that may be cleared are the password fields
  - [ ] User will be able to login to their account (given they enter the correct credentials)
    - Form
      - [ ] User can login with email or username
        - This can be done as a single field or as two separate fields
      - [ ] Password is required
    - User should see friendly error messages when an account either doesn’t exist or if passwords don’t match
    - Logging in should fetch the user’s details (and roles) and save them into the session.
    - User will be directed to a landing page upon login
      - [ ] This is a protected page (non-logged in users shouldn’t have access)
      - [ ] This can be home, profile, a dashboard, etc
  - [ ] User will be able to logout
    - Logging out will redirect to login page
    - User should see a message that they’ve successfully logged out
    - Session should be destroyed (so the back button doesn’t allow them access back in)
  - [ ] Basic security rules implemented
    - Authentication
      - [ ] Function to check if user is logged in 
      - [ ] Function should be called on appropriate pages that only allow logged in users
    - Roles/Authorization
      - [ ] Have a roles table (see below)
  - [ ] Basic Roles implemented
    - Have a Roles table    (id, name, description, is_active, modified, created)
    - Have a User Roles table (id, user_id, role_id, is_active, created, modified)
    - Include a function to check if a user has a specific role (we won’t use it for this milestone but it should be usable in the future)
  - [ ] Site should have basic styles/theme applied; everything should be styled
    - I.e., forms/input, navigation bar, etc
  - [ ] Any output messages/errors should be “user friendly”
    - Any technical errors or debug output displayed will result in a loss of points
  - [ ] User will be able to see their profile
    - Email, username, etc
  - [ ] User will be able to edit their profile
    - Changing username/email should properly check to see if it’s available before allowing the change
    - Any other fields should be properly validated
    - Allow password reset (only if the existing correct password is provided)
      - [ ] Hint: logic for the password check would be similar to login
- Milestone 2
  - [ ] User with an admin role or shop owner role will be able to add products to inventory
    - Table should be called Products (id, name, description, category, stock, created, modified, unit_price, visibility [true, false])
  - [ ] Any user will be able to see products with visibility = true on the Shop page
    - Product list page will be public (i.e. doesn’t require login)
    - For now limit results to 10 most recent
    - User will be able to filter results by category
    - User will be able to filter results by partial matches on the name
    - User will be able to sort results by price
    - All filters are additive
  - [ ] Admin/Shop owner will be able to see products with any visibility
    - This should be a separate page from Shop, but will be similar
    - This page should only be accessible to the appropriate role(s)
  - [ ] Admin/Shop owner will be able to edit any product
    - Edit button should be accessible for the appropriate role(s) anywhere a product is shown (Shop list, Product Details Page, etc)
    - Edit name, description, category, stock, unit_price, visibility
  - [ ] User will be able to click an item from a list and view a full page with more info about the item /(Product Details Page/)
    - Name, description, unit_price, stock, category
  - [ ] User must be logged in for any Cart related activity below
  - [ ] User will be able to add items to Cart
    - Cart will be table-based /(id, product_id, user_id, desired_quantity, unit_price, created, modified/)
      - [ ] Choose one and cross out which one you won’t support
        - [ ] If a user can have only 1 cart product_id and user_id should be a composite unique key
        - [ ] If a user can have more than 1 cart, add a field called cart_id and cart_id, user_id, and product_id will be a composite unique key
    - Adding items to Cart will not affect the Product's quantity in the Products table
  - [ ] User will be able to see their cart
    - List all the items
    - Show subtotal for each line item based on desired_quantity * unit_price (from the cart)
    - Show total cart value (sum of line item subtotals)
    - Will be able to click an item to see more details (Product Details Page)
  - [ ] User will be able to change quantity of items in their cart
    - Quantity of 0 should also remove from cart
    - A negative Quantity is not valid
  - [ ] User will be able to remove a single item from their cart via button click
  - [ ] User will be able to clear their entire cart via a button click
  

- Milestone 3
  - [ ] User will be able to purchase items in their Cart
    - Create an Orders table (id, user_id, created, total_price, address, payment_method, money_received)
      - [ ] Payment method will simply record (Cash, Visa, MasterCard, Amex, etc) We will not be recording CC numbers or anything of that nature, this is just a sample and in real world projects you’d commonly use a third party payment processor
      - [ ] Hint: This must be inserted first before you can insert into the OrderItems table
    - Create an OrderItems table (id, order_id, product_id, quantity, unit_price)
      - [ ] Hint: This is basically a copy of the data from the Cart table, just persisted as a purchase
    - Checkout Form
      - [ ] Ask for payment method (Cash, Visa, MasterCard, Amex, etc)
      - [ ] Do not ask for credit card number, this is just a sample
      - [ ] Ask for a numerical value to be entered 
        - Note: this will be a fake payment check to compare against the cart total to determine if the payment succeeds
        - This will be recorded as money_received
      - [ ] Ask for Address/shipping information
        - You’ll need to concatenate this into a single string to insert into the DB
  - [ ] User will be asked for their Address for shipping purposes
    - [ ] Address form should validate correctly
      - Use this as a rough guide (likely you’ll want to prefill some of the data you already have about the user)
(IMAGE)

  - [ ] Order process (comment each part of the process):
    - [ ] Calculate Cart Items
    - [ ] Verify the current product price against the Products table
      - Since our Cart is table-based it can be long lived so if a user added a Product at a sale and they attempt to purchase afterwards, it should pull the true Product cost.
      - You can also show the Cart.unit_price vs Product.unit_price to show a sale or an increase in price
    - [ ] Verify desired product and desired quantity are still available in the Products table
      - Users can’t purchase more than what’s in stock
      - Show an error message and prevent order from going through if something isn’t available
      - Let the user update their cart and try again
      - Clearly show what the issue is (which product isn’t available, how much quantity is available if the cart exceeds it)
    - [ ] Make an entry into the Orders table
    - [ ] Get last Order ID from Orders table
    - [ ] Copy the cart details into the OrderItems tables with the Order ID from the previous step
    - [ ] Update the Products table Stock for each item to deduct the Ordered Quantity
    - [ ] Clear out the user’s cart after successful order
    - [ ] Redirect user to Order Confirmation Page
  - [ ] Order Confirmation Page
      - Show the entire order details from the Order and OrderItems table (similar to cart)
        - [ ] Including a the cost of each line item and the total value
        - [ ] Show how they purchased and how much they paid
      - Displays a Thank you message
  - [ ] User will be able to see their Purchase History
      - For now limit to 10 most recent orders
      - Show a summary of relevant information
      - A list item can be clicked to view the full details in the Order Details Page (similar to Order Confirmation Page except no “Thank you” message)
  - [ ] Store Owner will be able to see all Purchase History
      - For now limit to 10 most recent orders
      - A list item can be clicked to view the full details in the Order Details Page (similar to Order Confirmation Page except no “Thank you” message)

- Milestone 4
  - [ ] User can set their profile to be public or private (will need another column in Users table)
    - If profile is public, hide email address from other users (email address should not be publicly visible to others)
  - [ ] User will be able to rate a product they purchased
    - Create table called Ratings (id, product_id, user_id, rating, comment, created, modified)
    - 1-5 rating
    - Text Comment (use TEXT data type in sql)
    - Must be done on the Product Details Page
    - Ratings and Rating Comments will be visible on the Product Details page
      - [ ] Show the latest 10 reviews
      - [ ] Paginate anything beyond 10
    - Show the average rating on the Product Details Page
  - [ ] User’s Purchase History Changes
      - Filter by date range
      - Filter by category
      - Sort by total, date purchased, etc
      - Add pagination
        - [ ] Any filter/sort applied must be followed during the pagination process
  - [ ] Store Owner Purchase History Changes
    - Filter by Date Range
    - Filter by Category
    - Sort by total, date purchased, etc
    - Add pagination
      - [ ] Any filter/sort applied must be followed during the pagination process
    - The result page should show the accurate total price of the combined search results (i.e., if just 3 records show each of $25, it should show $75 total for this view)
  - [ ] Add pagination to Shop Page (and any other product lists not yet mentioned)
  - [ ] Store Owner will be able to see all products out of stock
      - This will be added as a filter to their product list page from Milestone 2
      - Pagination should account for this new filter
      - Recommended to have the filter applied as a given value (i.e., where quantity is <= value)
  - [ ] User can sort products by average rating on the Shop Page
      - Hint: may want to add an “average rating” field to the Products table and update this value any time a new rating is given for the product using an aggregate function

### Intructions
#### Don't delete this
1. Pick one project type
2. Create a proposal.md file in the root of your project directory of your GitHub repository
3. Copy the contents of the Google Doc into this readme file per the template
4. Convert the list items to markdown checkboxes (apply any other markdown for organizational purposes)
5. Create a new Project Board on GitHub
   - Choose the Automated Kanban Board Template
   - For each major line item (or sub line item if applicable) create a GitHub issue
   - The title should be the line item text
   - The first comment should be the acceptance criteria (i.e., what you need to accomplish for it to be "complete")
   - Leave these in "to do" status until you start working on them
   - Assign each issue to your Project Board (the right-side panel)
   - Assign each issue to yourself (the right-side panel)
6. As you work
  1. As you work on features, create separate branches for the code in the style of Feature-ShortDescription (using the Milestone# branch as the source to branch from and to merge into)
  2. Add, commit, push the related file changes to this branch
  3. Add evidence to the PR (Feat to Milestone) conversation view comments showing the feature being implemented (these will be used to populate the related .md files for each milestone, forgetting to capture this will give you more work later on)
     - Screenshot(s) of the site view (make sure they clearly show the feature)
     - Screenshot of the database data if applicable
     - Describe each screenshot to specify exactly what's being shown
     - A code snippet screenshot or reference via GitHub markdown may be used as an alternative for evidence that can't be captured on the screen
  4. Update the checklist of the proposal.md file for each feature this branch is completing (ideally should be 1 branch/pull request per feature, but some cases may have multiple)
    - Basically add an x to the checkbox markdown along with a date after
      - (i.e.,   - [x] (mm/dd/yy) ....) See Template above
    - Add the pull request link as a new indented line for each line item being completed
    - Attach any related issue items on the right-side panel
  5. Merge the Feature Branch into your Milestone branch (this should close the pull request and the attached issues)
    - Merge the Milestone branch into dev, then dev into prod as needed (be sure it doesn't break anything in prod)
    - Last two steps are mostly for getting it to prod for delivery of the assignment 
  7. If the attached issues don't close wait until the next step
  8. Merge the updated dev branch into your production branch via a pull request
  9. Close any related issues that didn't auto close
    - You can edit the dropdown on the issue or drag/drop it to the proper column on the project board
