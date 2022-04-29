<table><tr><td> <em>Assignment: </em> IT202 Milestone 3 Shop Project</td></tr>
<tr><td> <em>Student: </em> William Kaminski(wck3)</td></tr>
<tr><td> <em>Generated: </em> 4/28/2022 9:17:10 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/it202-milestone-3-shop-project/grade/wck3" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone3 branch </li>
<li>Create a new markdown file called milestone3.md</li>
<li>git add/commit/push immediate</li>
<li>Fill in the milestone3.md link (from Milestone3) into the proposal.md file under each milestone3 feature</li>
<li>For each feature in the proposal add a related direct link to Heroku prod for a file related to it the feature</li>
<li>Fill in the below deliverables</li>
<li>At the end copy the markdown and paste it into milestone3.md</li>
<li>Add/commit/push the changes to Milestone3</li>
<li>PR Milestone3 to dev and verify</li>
<li>PR dev to prod and verify</li>
<li>Checkout dev locally and pull changes to get ready for Milestone 4</li>
<li>Submit the direct link to this new milestone3.md file from your GitHub prod branch to Canvas</li>
</ol>
<p>Note: Ensure all images appear properly on GitHub and everywhere else.
Images are only accepted from dev or prod, not localhost.
All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod). </p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> User will be able to purchase their cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the Orders table with valid data in it</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://user-images.githubusercontent.com/98120794/165863485-387cc59a-3612-40fe-96c0-7cb440f108fd.png">https://user-images.githubusercontent.com/98120794/165863485-387cc59a-3612-40fe-96c0-7cb440f108fd.png</a> </td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of OrderItems table with validate data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/165863485-387cc59a-3612-40fe-96c0-7cb440f108fd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing orders table populated<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/165863310-c3f88f69-0a17-489f-8c90-b5c4391f7883.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>showing order_items table populated<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the purchase form UI from Heroku</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/165866929-b1adee7d-ee91-4c68-bdff-f2caac81e638.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Checkout/purchase UI. I filled in all forms manually except for username. That is<br>prefilled.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the purchase validation code (ensure your ucid and date are included) (Payment method, purchase value, shipping info)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/165862752-83d19655-3b2d-4ceb-9d10-a2faedbf1a4b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>client side purchase validation (all forms) split in two windows<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/165862864-6171c9d6-725f-4b53-a6cf-0ba625f45ab4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>EXTRA code for stock issues<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a screenshot showing the Order Process validations from the UI (Price check, Quantity/Stock check)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/165870160-4006955f-3204-4f70-b5b9-8883a71fd02f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>bad address<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/165870222-7d8b416c-8afa-41e4-9ba3-0f8b729c384e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>bad city<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/165870297-5e244c13-c3a3-4988-8476-3e06f2535d44.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>bad state (inspect element change)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/165870368-36715a55-cef3-4939-ad02-7c5835bd2059.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>bad zipcode<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/165870405-b0354cea-5961-46a0-9426-d8a77b2be6f6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>bad payment method<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/165870438-7a083dc8-864c-4906-883f-0100a399077f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>payment doesnt match cart<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/165870491-11f53493-faa7-4403-a1b5-782c87cf060c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>username does not match current user<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/165871263-d01b9f05-b38b-471f-a3f0-1e0b37f558a8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>quantity problem (over stocked)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/165871299-b317d114-dc61-48f7-8c01-5b0f46bf1757.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>quantity problem (no stock)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/165871421-6cd831dc-a8e4-45d0-a715-73a158a3f2be.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>price difference between cart and shop items (corsair power supply auto updated)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly describe the code flow/process of the purchase process</td></tr>
<tr><td> <em>Response:</em> <p>The user clicks the checkout button when in their cart which redirects them<br>to the checkout page. Here, their cart information is retrieved. During retrieval, the<br>cart item price is compared to the shop item price. If there is<br>a difference, the price of the item is updated accordingly in the cart<br>table. Item quantity in the cart is checked. If it exceeds or is<br>less than the shop item quantity the user is warned and told which<br>item. The user fills out a series of payment information forms. Once the<br>user clicks confirm purchase, these forms are validated using JavaScript and regex. The<br>username is compared to the user&#39;s actual username. The payment amount the user<br>inputs is compared to the cart price. Once validated, the required attributes are<br>added to the shop orders table. There is then a query to retrieve<br>the latest order ID for the current user. This is used to copy<br>the items from the cart items retrieval results into the order_items table. The<br>user is then redirected to the thank you/confirmation page to view their order<br>information. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/79">https://github.com/wck3/IT202-010/pull/79</a> </td></tr>
<tr><td> <em>Sub-Task 8: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://wck3-prod.herokuapp.com/Project/checkout.php?">https://wck3-prod.herokuapp.com/Project/checkout.php?</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Order Confirmation Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot showing the order details from the purchase form and the related items that were purchased with a thank you message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/165867052-2e451366-fad7-409e-9fe0-c169132a056d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Order confirmation page with order from previous deliverable<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how this information is retrieved and displayed from a code logic perspective</td></tr>
<tr><td> <em>Response:</em> <p>The user&#39;s most recent order ID is retrieved. A double join query between<br>order_items -&gt; orders and order_items -&gt; shop_items is made. The order ID&#39;s must<br>match in both order tables and the userID must match the user ID<br>in the orders table. The shop_items table is used to retrieve the name<br>of the items. All other information is taken from the orders tables. The<br>prices are casted from pennies to dollar amounts. Total is calculated after retrieval<br>by adding all subtotals. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/79">https://github.com/wck3/IT202-010/pull/79</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://wck3-prod.herokuapp.com/Project/thankyou.php">https://wck3-prod.herokuapp.com/Project/thankyou.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User will be able to see their Purchase History </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing purchase history for a user</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/165867147-8e7a8e82-70a7-46a5-8be5-70998d0ea6e9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>purchase history page for logged in user<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing full details of a purchase (Order Details Page)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/165867187-d6cd9a14-1836-4033-a52d-22c840858cb5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>order details page for first entry in purchase history page (GTX 1080ti)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the logic for showing the purchase list and click/displaying the Order Details</td></tr>
<tr><td> <em>Response:</em> <p>A double join query between order_items -&gt; orders and order_items -&gt; shop_items is<br>made (similar to thank you page). The userID must match the user ID<br>in the orders table. No specific orderID is required so it retrieved all<br>items from all orders the user has ever made. The shop_items table is<br>used to retrieve the name of the items. All other information is taken<br>from the orders tables. The prices are casted from pennies to dollar amounts.<br>If the user would like to view details about the order that the<br>item is from, they can click the order details button. For each item&#39;s<br>row, the order ID is set as the value for this button. Using<br>a get request, the user is redirected to the order details page where<br>they can view the order details.</p><br><p>The orders page uses the same query as<br>the thank you page. However, this time instead of the users most recent<br>order, it uses the orderID passed by the get request to retrieve the<br>order details. The address fields are concatenated into one string. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/80">https://github.com/wck3/IT202-010/pull/80</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://wck3-prod.herokuapp.com/Project/purchase_history.php">https://wck3-prod.herokuapp.com/Project/purchase_history.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://wck3-prod.herokuapp.com/Project/order_details.php?order_ID=42">https://wck3-prod.herokuapp.com/Project/order_details.php?order_ID=42</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Store Owner Purchase History </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing purchase history from multiple users</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/165867276-2ef75058-d145-4d28-a108-fa89603f74f5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>all purchases page (only accessible by admin with role check)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing full details of a purchase (Order Details Page) (from a user that's not the Store Owner)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/165867343-6bf733fc-a487-4eb6-8b53-e2fd0a981419.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot of order from user test_account (admin is wck3)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the logic for showing the purchase list and click/displaying the Order Details (mostly how it differs from the user's purchase history feature)</td></tr>
<tr><td> <em>Response:</em> <p>The main difference between this and the user history page is the query<br>does not require the userID at all. This allows for all order items<br>to be retrieved for all users. I also have the username for each<br>order displayed so the owner can deduce who bought what items. The logic<br>is the same for going to the admin-specific order details page.  The<br>username is displayed above the payment details so the admin may see who&#39;s<br>order they are looking at. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/80">https://github.com/wck3/IT202-010/pull/80</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://wck3-prod.herokuapp.com/Project/admin/all_purchase_hist.php">https://wck3-prod.herokuapp.com/Project/admin/all_purchase_hist.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://wck3-prod.herokuapp.com/Project/admin/admin_order_details.php?order_ID=47">https://wck3-prod.herokuapp.com/Project/admin/admin_order_details.php?order_ID=47</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Proposal.md </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em>  Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone3.md accordingly and a direct link to the path on Heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/165866669-250c19b6-5121-4178-ac8c-f3c6d183993c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>proposal.md updated with all issues<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone3 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/165866502-788fcf28-4508-4299-bad1-3d5f1280b2c7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot showing all MS3 issues closed<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/it202-milestone-3-shop-project/grade/wck3" target="_blank">Grading</a></td></tr></table>
