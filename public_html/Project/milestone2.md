<table><tr><td> <em>Assignment: </em> IT202 Milestone 2 Shop Project</td></tr>
<tr><td> <em>Student: </em> William Kaminski(wck3)</td></tr>
<tr><td> <em>Generated: </em> 4/18/2022 12:13:44 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/it202-milestone-2-shop-project/grade/wck3" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone2 branch </li>
<li>Create a new markdown file called milestone2.md</li>
<li>git add/commit/push immediate</li>
<li>Fill in the milestone2.md link (from Milestone2) into the proposal.md file under each milestone2 feature</li>
<li>For each feature in the proposal add a related direct link to Heroku prod for a file related to it the feature</li>
<li>Fill in the below deliverables</li>
<li>At the end copy the markdown and paste it into milestone2.md</li>
<li>Add/commit/push the changes to Milestone2</li>
<li>PR Milestone2 to dev and verify</li>
<li>PR dev to prod and verify</li>
<li>Checkout dev locally and pull changes to get ready for Milestone 3</li>
<li>Submit the direct link to this new milestone2.md file from your GitHub prod branch to Canvas</li>
</ol>
<p>Note: Ensure all images appear properly on github and everywhere else.
Images are only accepted from dev or prod, not local host.
All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod). </p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Users with admin or shop owner will be able to add products </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of admin create item page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163741227-1f0ce063-d375-4067-86b1-a017e75e5f7b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot of add item page <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of populated Products table clearly showing the columns</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163836651-020e4372-a5f6-4ac2-8cd7-99dd8845b02d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>products table with a bunch of placeholder products<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly describe the code flow for creating a Product</td></tr>
<tr><td> <em>Response:</em> <p>If the user has the admin role, they will have access to the<br>add product page on their nav bar. When on this page, the user<br>fills out a series of forms for each attribute such as name, price,<br>description, and visibility. All except for the visibility attribute are text forms.I made<br>visibility radio buttons where the user has the option of picking yes or<br>no (1 or 0). After the user presses the submit button their inputs<br>are added to the Shop_Items sql table. This table is used for other<br>features when fetching a specified item. If successful, a confirmation message is displayed<br>to the user. If unsuccessful an error message is displayed.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/66">https://github.com/wck3/IT202-010/pull/66</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="http://wck3-prod.herokuapp.com/Project/admin/add_product.php">http://wck3-prod.herokuapp.com/Project/admin/add_product.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Any user can see visible products on the Shop Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the Shop page showing 10 items without filters/sorting applied</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163742491-500d5094-d964-4e79-9a07-a35052a78d27.png"/></td></tr>
<tr><td> <em>Caption:</em> <p> screenshot of shop page from user without admin view. no filters applied<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163744000-aa302881-627e-4bb5-b49a-7145ce1d076e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>shop page visible as admin. admin may see non visible products marked with<br>&quot;not public&quot; next to admin-only edit button.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Shop page showing both filters and a different sorting applied (should be more than 1 sample product)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163743457-1ef3a4b9-ba42-43d4-892b-3f6ac714e01f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot of partial name, sort by price, category in descending order of price.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the filter/sort logic from the code (ensure ucid and date is shown)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163742822-7882e8f3-0352-4f19-816e-395b1a4643c6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot of SQL queries/logic  that correspond to filters<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163743364-19de4e43-6d17-402e-8cfa-b2610bb6e1c7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot of page format/form logic<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain how the results are shown and how the filters are applied</td></tr>
<tr><td> <em>Response:</em> <p>The results are shown by performing an sql query to the shop items<br>table. Information about the items such as the name, description, and price are<br>selected from the table and displayed in separate cards. The filter works using<br>a series of get request forms and dynamically changing the sql query to<br>the items table. For partial name search, the user types in a partial<br>match and submits. The get request for the name is sent to an<br>extension to the query. The other filters are access by dropdown lists and<br>if selected and applied, a similar process occurs. Each get request is checked<br>and if it is not empty, the filter is applied to the query.<br>Once checking all requests and adding the queries, the final results are fetched<br>and displayed to the user.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/66">https://github.com/wck3/IT202-010/pull/66</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="http://wck3-prod.herokuapp.com/Project/shop.php">http://wck3-prod.herokuapp.com/Project/shop.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Show Admin/Shop Owner Product List (this is not the Shop page and should show visibility status) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot of the Admin List page/results</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163743599-c8e92741-2994-4b27-b87f-3da2f1a76e75.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot of admin list page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163744000-aa302881-627e-4bb5-b49a-7145ce1d076e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>shop page visible as admin. admin may see non visible products marked with<br>&quot;not public&quot; next to admin-only edit button.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how the results are shown</td></tr>
<tr><td> <em>Response:</em> <p>The results are show similar to the name filter on the shop page.<br>A user types a partial name match into the search bar in order<br>to find a specific item. The shop items table is queried to get<br>all of the required information which is then displayed for the admin. The<br>admin is able to see all products, regardless of visibility.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/66">https://github.com/wck3/IT202-010/pull/66</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="http://wck3-prod.herokuapp.com/Project/admin/list_products.php">http://wck3-prod.herokuapp.com/Project/admin/list_products.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Admin/Shop Owner Edit button </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a sceenshot showing the edit button visible to the Admin on the Shop page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163744000-aa302881-627e-4bb5-b49a-7145ce1d076e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>shop page visible as admin. admin may see non visible products marked with<br>&quot;not public&quot; next to admin-only edit button.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a sceenshot showing the edit button visible to the Admin on the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163744652-671da8a9-3547-4bd6-ae9d-707c8d3f5acd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot of product details page (not visible a.k.a not public)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a sceenshot showing the edit button visible to the Admin on the Admin Product List Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163743599-c8e92741-2994-4b27-b87f-3da2f1a76e75.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot showing edit button on list item page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a before and after screenshot of Editing a Product via the Admin Edit Product Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163744727-732db326-fa21-4eb3-b77f-72d50b552311.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>edit page before<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163744778-4449004d-8832-4db9-bab9-5bb5964e037d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>details page before <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163744865-a8d11d1e-dc43-44ce-8980-1efc97bd9460.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>edit page after (changes persist on shop and admin list page)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163744939-e7c9afb1-60cc-42b9-a84a-012eac6a177d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>details page after (changes persist on shop and admin list page)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Briefly explain the code process/flow</td></tr>
<tr><td> <em>Response:</em> <p>Users with the admin role are given access to the edit button which<br>displays for each product on every page that it is listed on. This<br>button redirects the admin to the edit items page. Here, the info about<br>the item is retrieved from the shop items table and pre filled into<br>a series of forms. From here, the user may alter the forms and<br>press submit. Once submitted, the new data is sent to an update query<br>which updates the shop items table with the new data. Now when the<br>data is retrieved on any other page, the changes will persist. I also<br>allowed the admin to view non visible items on the shop page/details page<br>with a small message telling them the item is not public.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/66">https://github.com/wck3/IT202-010/pull/66</a> </td></tr>
<tr><td> <em>Sub-Task 7: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://wck3-prod.herokuapp.com/Project/list_products.php">https://wck3-prod.herokuapp.com/Project/list_products.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://wck3-prod.herokuapp.com/Project/shop.php">https://wck3-prod.herokuapp.com/Project/shop.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="http://wck3-prod.herokuapp.com/Project/product_details.php?product_id=13">http://wck3-prod.herokuapp.com/Project/product_details.php?product_id=13</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="http://wck3-prod.herokuapp.com/Project/admin/edit_item.php?id=13">http://wck3-prod.herokuapp.com/Project/admin/edit_item.php?id=13</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Product Details Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the button (clickable item) that directs the user to the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163742491-500d5094-d964-4e79-9a07-a35052a78d27.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>more detail button shown on shop page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163745443-640efab3-fb52-4781-b3e8-4cc5928766ab.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>more details button shown in cart<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the result of the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163745519-6df0c89e-49ab-4002-9879-80d48474d48b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>product details page for sample product<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the code process/flow</td></tr>
<tr><td> <em>Response:</em> <p>When the user clicks the more details button, they are redirected to the<br>product details page. The button through a get request sends the ID of<br>the corresponding item to the details page. Here, a query is sent to<br>the shop items table to retrieve the specified data belonging to that product<br>ID. That data is displayed on the page inside of a card. The<br>user may also add the item to their cart from this page if<br>they would like and the admin can be redirected to edit the item<br>from this page. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/66">https://github.com/wck3/IT202-010/pull/66</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file (can be any specific item)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="http://wck3-prod.herokuapp.com/Project/product_details.php?product_id=16">http://wck3-prod.herokuapp.com/Project/product_details.php?product_id=16</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Add to Cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the success message of adding to cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163745801-e8355db1-e0ec-4566-ad41-1a3a62b89248.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>success of adding item to the cart (from shop page)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163745855-1ddf2108-e6b8-4f0d-8f65-8777d72cd0d5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>success of adding item to the cart (from details page)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the error message of adding to cart (i.e., when not logged in)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163745924-60e4a05a-f8e0-4b80-ad4d-26b9a99ae823.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot of error when user is adding to cart (shop page)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163745974-c107504d-41d1-4c55-baef-4fa0b7516d6f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot of error when user is adding to cart (details page)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163746024-929cf025-6320-4eba-b966-a2186ea51f42.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of cart table with data in it <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Cart table with data in it</td></tr>
<tr><td> <em>Response:</em> <p>screenshot placed directly above ^^^  also <a href="https://user-images.githubusercontent.com/98120794/163746024-929cf025-6320-4eba-b966-a2186ea51f42.png">here</a><br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Tell how your cart works (1 cart per user; multiple carts per user)</td></tr>
<tr><td> <em>Response:</em> <p>Each user has 1 cart. This is done by using the item id<br>and the user id as a composite primary key in the cart table.<br>The table includes these two attributes, the quantity of the item, a unique<br>cart id, the date the item was added and the date that it<br>was modified. When the user navigates to the cart page, their cart items<br>are retrieved by searching for their user id. Any product that forms a<br>composite key with the user specific ID will be retrieved and displayed for<br>the user. The user can then change the quantity of an item, remove<br>a single item, or clear their entire cart using update and delete queries<br>that change the table values.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Explain the process of add to cart</td></tr>
<tr><td> <em>Response:</em> <p>When a logged in user adds an item to their cart, the item<br>id is sent to the purchase item function. Once here, the product id<br>is then sent to the add_to_cart function. The user id and item id<br>are send to the cart table where they are given a unique cart<br>id, quantity of 1, and unique timestamp. Each time the item is added<br>to the cart for the same user, the quantity increases by 1.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/67">https://github.com/wck3/IT202-010/pull/67</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> User will be able to see their Cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the Cart View (show subtotal, total, and the link to Product Details Page)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163832564-df1d8aeb-1b90-419a-b83b-8799b5bef42e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot of cart view full of sample items<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explain how the cart is being shown from a code perspective along with the subtotal and total calculations</td></tr>
<tr><td> <em>Response:</em> <p>The cart is being shown using sql queries and the values are displayed<br>inside of a table which is inside a card for looks. Using the<br>composite key mentioned above, any item that corresponds to the user id is<br>displayed in the cart. The subtotal is calculated by multiplying the price of<br>the item by the quantity of the item inside of the user&#39;s cart.<br>I then casted the subtotal divided by 100 with two decimal places so<br>when it is retrieved it is in dollars instead of pennies. The total<br>cost is calculated after all of the products are fetched. When displaying the<br>items using a php loop, I added up all of the subtotals and<br>displayed this as the total. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/67">https://github.com/wck3/IT202-010/pull/67</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="http://wck3-prod.herokuapp.com/Project/cart.php">http://wck3-prod.herokuapp.com/Project/cart.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> User can update cart quantity </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Show a before and after screenshot of Cart Quantity update</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163833470-ead1be51-61dd-49a2-9878-782e122aa7b2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>before quantity update<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163833536-d02bd04c-8e8e-490f-b42f-24f0f70f4c59.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>after quantity update (hyper x ram has increase in quantity)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Show a before and after screenshot of setting Cart Quantity to 0</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163833536-d02bd04c-8e8e-490f-b42f-24f0f70f4c59.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>before cart quantity 0<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163833773-ce6bf9f4-d9fe-40e7-94d3-7618fb998dc6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>after cart quantity 0 (Corsair vengance ram gone)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Show how a negative quantity is handled</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163833821-1cd968df-7ddc-4ec9-ae02-9c1dabe66016.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot showing limit on negative quantity<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain the update process including how a value of 0 and negatives are handled</td></tr>
<tr><td> <em>Response:</em> <p>The user can update the quantity of an item using a form. The<br>form has arrows to increase or decrease the number, or the user may<br>type in their desired choice. The number form has a limit of 0<br>applied so the user cannot input negative numbers. If the user somehow bypasses<br>this, the table has a constraint that does not allow the quantity to<br>dip below 0. When the user updates the quantity, the table name and<br>item ID along with the new quantity are sent to the update_data function.<br>Here, the specific item is updated with the new quantity value. If the<br>update request is set, the new quantity is checked to see if it<br>is 0 or not. If it is 0, the item is instead sent<br>to the deleteLineItem function, where it is then dropped from the Cart table.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/67">https://github.com/wck3/IT202-010/pull/67</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Cart Item Removal </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a before and after screenshot of deleting a single item from the Cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163835544-4938f0da-3afb-49e4-a4a0-5d13770dcfaa.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>before deleting single item<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163835572-c312c509-2184-4206-a910-626f54ba9dfe.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>after deleting single item (removed a single cooler master hyper 212 evo)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a before and after screenshot of clearing the cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163835572-c312c509-2184-4206-a910-626f54ba9dfe.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>before clearing entire cart<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163835711-43f654aa-5859-4550-be88-439dcd400991.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>after clearing entire cart with clear all button<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how each delete process works</td></tr>
<tr><td> <em>Response:</em> <p>Both delete processes utilize the deleteLineItem function. Using post requests, the item id<br>is sent to the function. A series of sql update/delete queries are tried<br>on the id. If the ID is greater than 1, the quantity is<br>simply subtracted by 1. However, if the quantity is equal to 1 or<br>0, the item is deleted from the table. The 0 may not be<br>necessary, but I added it for redundancy/an extra measure. When the clear cart<br>button is clicked, an empty id parameter is send to the delete line<br>item function. A delete all items query is run if the condition is<br>met that the item id is empty when passed to deleteLineItem.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <em>Response:</em> <p><a href="https://github.com/wck3/IT202-010/pull/67">https://github.com/wck3/IT202-010/pull/67</a><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 10: </em> Proposal.md </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em>  Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone1.md accordingly and a direct link to the path on Heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163835335-b4b008f1-ac50-4950-8462-0d5e133071c2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot showing filled out proposal page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone2 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/163835087-89b34c63-dfe6-4735-8050-7eda0ffb4bf0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>all MS2 issues closed<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/it202-milestone-2-shop-project/grade/wck3" target="_blank">Grading</a></td></tr></table>