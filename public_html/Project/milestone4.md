<table><tr><td> <em>Assignment: </em> IT202 Milestone 4 Shop Project</td></tr>
<tr><td> <em>Student: </em> William Kaminski(wck3)</td></tr>
<tr><td> <em>Generated: </em> 5/5/2022 7:30:53 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/it202-milestone-4-shop-project/grade/wck3" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone4 branch </li>
<li>Create a new markdown file called milestone4.md</li>
<li>git add/commit/push immediate</li>
<li>Fill in the milestone4.md link (from Milestone4) into the proposal.md file under each milestone4 feature</li>
<li>For each feature in the proposal add a related direct link to Heroku prod for a file related to it the feature</li>
<li>Fill in the below deliverables</li>
<li>At the end copy the markdown and paste it into milestone4.md</li>
<li>Add/commit/push the changes to Milestone4</li>
<li>PR Milestone4 to dev and verify</li>
<li>PR dev to prod and verify</li>
<li>Checkout dev locally and pull changes</li>
<li>Submit the direct link to this new milestone4.md file from your GitHub prod branch to Canvas</li>
</ol>
<p>Note: Ensure all images appear properly on GitHub and everywhere else.
Images are only accepted from dev or prod, not localhost.
All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod). </p>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> User can set their profile to public or private </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of new column on the Users table</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/166263551-2f1c4c98-1e36-496b-af63-d81b19b9244c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot of users table (visibility is the new column)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of updated profile edit view</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167031377-8be5c0c7-6350-4384-b4d3-b69d0d5cc545.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot of updated edit view (radio buttons are new)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167031454-d627ee0d-693b-4f96-ab35-1881d75e6550.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot of updated register view (radio buttons are new)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot of profile view view (ensure email isn't shown publicly)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167031534-8b6d41ab-3fb0-4433-95b9-6e5cb2a853b5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>public profile<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167043134-18b12057-d7d9-4fc1-b2f1-4acda4a85d0c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>public profile from another user&#39;s perspective<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request(s) links</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/91">https://github.com/wck3/IT202-010/pull/91</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add direct link to a public profile from heroku</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167031534-8b6d41ab-3fb0-4433-95b9-6e5cb2a853b5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p><a href="https://wck3-prod.herokuapp.com/Project/profile.php?id=1">https://wck3-prod.herokuapp.com/Project/profile.php?id=1</a>   <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly explain the logic behind how public/private profile works</td></tr>
<tr><td> <em>Response:</em> <p>The user will select whether they want a public or private profile using<br>the radio buttons (yes/no). This will insert a 1 or 0 respectively into<br>the visibility column of the users table. If a user navigates to the<br>profile with that users ID, the value of visibility for the user is<br>checked. If their profile is public, the profile page is accessible. Otherwise, the<br>visitor is redirected and given a flash message stating that the user is<br>private. The user can view their own profile no matter the visibility option.<br><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> User will be able to rate a product they purchased </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the Ratings table with some data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167032176-3e6c0484-a8c2-49b8-b62b-043aa6969c20.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>ratings table with a lot of data<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of the Product Details page with comments/ratings and the form to add another and the average rating</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167032237-78db6810-f723-4324-8fe1-1e3607a7e586.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot of product details page with multiple reviews and pagination<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot of the error message for a user trying to rate/comment that hasn't purchased the product</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167033821-ce19207c-0d1e-445b-aa8f-26232e8bfbf0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot of warning message when trying to rate an un purchased product (had<br>to add this in the prod branch)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/91">https://github.com/wck3/IT202-010/pull/91</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add link to a product details page with ratings/comments</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://wck3-prod.herokuapp.com/Project/product_details.php?product_id=16">https://wck3-prod.herokuapp.com/Project/product_details.php?product_id=16</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly explain the logic being adding comment/rating and validations</td></tr>
<tr><td> <em>Response:</em> <p>When logged in, the user may fill out a number form (1-5 stars)<br>and a text comment form to leave a rating on a product. If<br>not logged in, a login button is displayed which redirects to the login<br>page. When the user submits the review, a query to the shop orders<br>and order items table is sent to see if the user has bought<br>the item they are trying to review using the user id as well<br>as the item id. If they have not bought the item, a warning<br>is flashed to the user. If successful, a success message displays and the<br>page refreshes to show the review as the most recent review below. The<br>review is inserted into the ratings table. All reviews of the product are<br>retrieved using the item ID and displayed in a card below the details<br>card. Each review has a link to the reviewer&#39;s profile page (added in<br>prod branch). Reviews are paginated.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User's Purchase History Changes </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots demonstrating examples of the filters/pagination applied</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167034591-8ea2966c-7adc-4740-ad0a-2425f625b28c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>filtered by month range<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167034662-0a8e2143-870c-4f31-93d2-619a5503f27a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>filtered by computer case category (can do from any category, this is just<br>one of them)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167034716-455c0c74-a807-485b-9189-54e4bd455230.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>filtered by order total ASC<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167034772-54bfab92-a452-44a1-ba18-51d0ef940be7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>filtered by order date DESC<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167034810-17a0c656-c307-4c5b-9ed9-98aaf08b3d57.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>filtered by product name (ASC)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/92">https://github.com/wck3/IT202-010/pull/92</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a link to the purchase history page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://wck3-prod.herokuapp.com/Project/purchase_history.php">https://wck3-prod.herokuapp.com/Project/purchase_history.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Store Owner Purchase History Changes </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots demonstrating examples of the filters/pagination applied (ensure the calculated total price is clearly visible)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167040822-4f8389a6-e31c-45c2-83c7-8429ca11f402.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>filtered in month range<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167040919-d64515a9-1c74-4e86-9e18-0f1e6f9b90bc.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>filtered by gpu category<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167040953-3d448cc4-872a-4817-8891-5e2047e14c45.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>filtered by order total (DESC)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167040981-12253a13-65f8-444b-9643-b02850e88d29.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>filtered by username (DESC) <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/92">https://github.com/wck3/IT202-010/pull/92</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/commit/608c93940cec4e88948592bd02323f8523532d09">https://github.com/wck3/IT202-010/commit/608c93940cec4e88948592bd02323f8523532d09</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a link to the store owner's purchase history page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://wck3-prod.herokuapp.com/Project/admin/all_purchase_hist.php">https://wck3-prod.herokuapp.com/Project/admin/all_purchase_hist.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain how the total price is calculated based on the filtered/paginated results</td></tr>
<tr><td> <em>Response:</em> <p>(added it in prod, sorry!) I got the total of the results by<br>doing a query before the results are paginated. Then, I was able to<br>sum the price of each item based on this result which will be<br>the total price combined between all pages. A little cheesy but I was<br>running low on time and it was what I could come up with<br>at the time. NOTE: all other filters besides username are the same as<br>the user items page. Filters can be used together, I just didn&#39;t have<br>enough items to fully utilize them.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Add pagination to Shop and any other product lists not covered </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot(s) of the newly paginated pages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167034998-02a7f81f-1665-4f67-a046-7bab12c5a2ab.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>list of items page is paginated<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/94">https://github.com/wck3/IT202-010/pull/94</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add links to related pages</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://wck3-prod.herokuapp.com/Project/admin/list_products.php">https://wck3-prod.herokuapp.com/Project/admin/list_products.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Store Owner will be able to see all products out of stock </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the out of stock results</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167035382-3a444731-7741-4676-9780-403ea645fa7b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>list items with out of stock filter applied<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/95">https://github.com/wck3/IT202-010/pull/95</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add links to related page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://wck3-prod.herokuapp.com/Project/admin/list_products.php">https://wck3-prod.herokuapp.com/Project/admin/list_products.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain your approach to this view</td></tr>
<tr><td> <em>Response:</em> <p>I approached this using a dropdown filter and a dynamic query. The admin<br>selects all items with any stock &gt;= 0 or items with no stock<br>so any stock &gt; 1. This condition is added to the retrieval query.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> User can sort products by average rating on the shop page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing the sort in effect</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167036271-b2cbb01d-4d77-4481-8652-03769f719ece.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>sorted by rating DESC<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167036311-727e6678-c556-4230-bc33-748c39142427.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>RTX 3060 (First result with filter applied on first page 5/5 stars)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167036374-27b652db-3bf1-4625-a8b0-5774dc4b5c04.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Astro A40 (last result of query with 0/5 star average)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of the Products table (or your implementation/approach to average rating)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167035921-d100ac7e-e1af-4647-b5ff-ac2d092e920f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>avg_rate column added to shop_items<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/95">https://github.com/wck3/IT202-010/pull/95</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add links to related page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://wck3-prod.herokuapp.com/Project/shop.php">https://wck3-prod.herokuapp.com/Project/shop.php</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Briefly explain how you implemented the average rating recording logic and how it applies to this sort on sho</td></tr>
<tr><td> <em>Response:</em> <p>Each time a user inserts a review for an item, the average review<br>is calculated directly after. I retrieved all ratings, summed up all of the<br>ratings and divided by the total number of ratings. This value is then<br>added to the shop items table as an int multiplied by 100 in<br>the avg_rate column of the specific item. I did this similar to the<br>penny to dollar money conversion as its easier to store the value and<br>the filter outcome will be the same. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Proposal.md </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em>  Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone4.md accordingly and a direct link to the path on Heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167036553-c54aabe2-a46f-4911-ac9f-6c0dc0ddae7a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>proposal page filled out with requirements<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone4 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/167036723-63c367e5-40ea-428f-a0f3-1f5eff3e64d9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>all issues completed <br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/it202-milestone-4-shop-project/grade/wck3" target="_blank">Grading</a></td></tr></table>
