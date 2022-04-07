<table><tr><td> <em>Assignment: </em> IT202 Milestone1 Deliverable</td></tr>
<tr><td> <em>Student: </em> William Kaminski(wck3)</td></tr>
<tr><td> <em>Generated: </em> 4/4/2022 9:32:42 AM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/it202-milestone1-deliverable/grade/wck3" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone1 branch</li>
<li>Create a milestone1.md file in your Project folder</li>
<li>Git add/commit/push this empty file to Milestone1 (you&#39;ll need the link later) </li>
<li>Fill in the deliverable items<ol>
<li>For the proposal.md file use the direct link to milestone1.md from the Milestone1 branch for all of the features  </li>
<li>For each feature, add a direct link (or links) to the expected file the implements the feature from Heroku Prod (I.e, <a href="https://mt85-prod.herokuapp.com/Project/register.php">https://mt85-prod.herokuapp.com/Project/register.php</a>)</li>
</ol>
</li>
<li>Ensure your images display correctly in the sample markdown at the bottom</li>
<li>Save the submission items</li>
<li>Copy/paste the markdown from the &quot;Copy markdown to clipboard link&quot;</li>
<li>Paste the code into the milestone1.md file</li>
<li>Git add/commit/push the md file to Milestone1</li>
<li>Double check the images load when viewing the markdown file (points will be lost for invalid/non-loading images)</li>
<li>Make a pull request from Milestone1 to dev and merge it (resolve any conflicts)<ol>
<li>Make sure everything looks ok on heroku</li>
</ol>
</li>
<li>Make a pull request from dev to prod (resolve any conflicts) <ol>
<li>Make sure everything looks ok on heroku</li>
</ol>
</li>
<li>Submit the direct link from github prod branch to the milestone1.md file (no other links will be accepted and will result in 0)</li>
</ol>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Feature: User will be able to register a new account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161400977-05f5310c-acd6-452c-b899-13520954c311.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot after successful validation<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161401012-9010b918-cbb8-4af1-bfa0-2609f1716647.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>invalid username and email (client side validation)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161401043-d23a0bd6-5c05-486b-b521-202267411be8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>username taken<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161401062-54bd04e1-5d83-48bf-93cd-0ee1bfaed917.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>passwords don&#39;t match (client side validation)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161401091-624bc7dd-45c6-4810-bcb1-c2f024f5894e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>password is too short (client side validation)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Users table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/160956291-45bcffb1-d392-4749-a6eb-94be2591bfbc.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot of user table in sql database<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/10">https://github.com/wck3/IT202-010/pull/10</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>Using forms, the user will be able to fill in an email, username,<br>password, and a confirmation of their desired password. Each form is validated to<br>see if it meets the required criteria. If it does, the information is<br>stored in the user table in the sql database. If there is an<br>error in the entries (duplicate entry, improper formatting), a flash message will be<br>shown to the user to help them meet the requirements for registration. These<br>entries are validated on the client side first to reduce server load. Passwords<br>are hashed for security purposes.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Feature: User will be able to login to their account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161401144-ac5a53e6-9eb8-4ef9-94be-4c88833ea37d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot when password is invalid<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161401183-235ffe55-264c-4850-ba4e-fb043ff4141c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot when email/username is not found<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161401201-fd75a113-c0c2-4764-90ed-1907f19fab93.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>invalid username and password (client side validation)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of successful login</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161401331-801e7b61-9bfb-4b39-badb-63737058078b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot of landing page after successful login<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/12">https://github.com/wck3/IT202-010/pull/12</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p> The user will enter their username/email and password via forms to login<br>to their account. The users table will be queried to verify the existence<br>of the user. In order to compare the password, the password hash is<br>selected from the table and compared using the password_verify function. If all credentials<br>are verified the user is logged in and brought to the home page,<br>but if they are not an error message is shown to help the<br>user correct their information. Forms are verified on the client side first to<br>reduce server load.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Feat: Users will be able to logout </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the successful logout message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161401398-8a8c6619-c0b4-4948-9f19-9deab327f00f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot of successful logout<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the logged out user can't access a login-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161401424-d21eb79f-114f-433a-b25b-5144ec93fd29.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Message to logged out user when trying to access login protected page (home)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/12">https://github.com/wck3/IT202-010/pull/12</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>(Poor commit message: this feature was implemented in the first &quot;nav finished&quot; commit)<br>After clicking logout on the nav bar, the user session is reset and<br>they are sent back to the login page. If the user tries to<br>access a page that requires login, the is_logged_in function in user_helpers.php is used<br>to check if the user still has a valid session. If they don&#39;t<br>since it was reset from logging out, then page access is denied and<br>they are redirected to the login page once again. An error message telling<br>the user that they don&#39;t have access is shown once redirected.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Feature: Basic Security Rules Implemented / Basic Roles Implemented </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the logged out user can't access a login-protected page (may be the same as similar request)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161401424-d21eb79f-114f-433a-b25b-5144ec93fd29.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Message to logged out user when trying to access login protected page (home)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing a user without an appropriate role can't access the role-protected page (a test/dummy page is fine)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161401496-9f310d5d-e333-406d-bf11-f51bb5ddf072.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>User without Admin role trying to access create role page but redirected to<br>home page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Roles table with data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161304148-59731c81-d510-42b5-aa25-4d3303e8bfec.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Roles table with two roles Admin and Customer<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the UserRoles table with data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161304625-78e17b96-e08d-468b-a703-78da189cb531.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>User Roles table with two roles assigned to different users<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add the related pull request(s) for these features</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/39">https://github.com/wck3/IT202-010/pull/39</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Explain briefly how the process/code works for login-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>The function is_logged_in is used on login protected pages. This function checks if<br>the user&#39;s session is set. If it is not set and they try<br>to access a login protected page, the page is killed and they are<br>redirected to the login page. A flash message warning that the user must<br>be logged in to view the page is displayed.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Explain briefly how the process/code works for role-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>The admin will create/assign roles to users. The roles are stored into a<br>table and the users and their roles are stored in another table. On<br>each restricted page, there is a function called has_role that will check if<br>the user has access to the page. The name of the required role<br>is passed into the function which is compared to an associative array of<br>the users roles. If the user has the required roll, they are given<br>access to the page. If they do not have access the page is<br>terminated and they are redirected with a flash message warning them that they<br>do no t have access.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Feature: Site should have basic styles/theme applied; everything should be styled </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots to show examples of your site's styles/theme</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161401523-083776e6-f947-4a7e-857e-755e1f0a1703.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot showing login page to show forms and nav bar. Register is being<br>hovered over.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161401549-2df011a3-434f-4954-9d2b-2353ae724735.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot assign role page to show font color and form<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161401567-52d13952-b97e-4f31-869b-61f539c1e8e7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot showing errors to show change in color<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/40">https://github.com/wck3/IT202-010/pull/40</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/34">https://github.com/wck3/IT202-010/pull/34</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain your CSS at a high level</td></tr>
<tr><td> <em>Response:</em> <p>I changed the background color of the page to darkslategrey because I liked<br>the color. I also changed the background of the nav bar to black<br>and made it span across the screen with 8px of padding. I changed<br>the font color to white for easier visibility with the new dark background.<br>When hovering over the nav bar the area turns gray and the link<br>is underlined. Flash messages have different colors for easier visibility with the white<br>font. Regular info alerts are grey to match the style of the page<br>while more important alerts are orange and red to emphasize their importance.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Feature: Any output messages/errors should be "user friendly" </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of some examples of errors/messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161401062-54bd04e1-5d83-48bf-93cd-0ee1bfaed917.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>message to user that passwords do not match<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161401331-801e7b61-9bfb-4b39-badb-63737058078b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>message to user that login was successful<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a related pull request</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/26">https://github.com/wck3/IT202-010/pull/26</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you made messages user friendly</td></tr>
<tr><td> <em>Response:</em> <p>Inside the flash.php file a div container is created to create a simple<br>html template that creates a message to be displayed and integrated onto the<br>page. There are different colors for different severities of messages. In order to<br>use the message, you simply call flash(&quot;input message here&quot;, &quot;severity&quot;) and your desired<br>message is safe-echoed into the div to be displayed on the page. The<br>first input is the message you want and the second is the severity<br>of the message which will change the color of the alert.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Feature: Users will be able to see their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161401621-5bc1e2eb-0741-4d71-adc7-c632b4b3fa63.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot of the user profile page of an admin (this is why there<br>is extra options on the nav bar)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/29">https://github.com/wck3/IT202-010/pull/29</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Explain briefly how the process/code works (view only)</td></tr>
<tr><td> <em>Response:</em> <p>If the user is logged in, the user can access the profile page<br>via the nav bar. This page has forms that the user is able<br>to edit their login information on. Since they are logged in already and<br>for convenience, the email and username forms are already filled in with their<br>information.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Feature: User will be able to edit their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page validation messages and success messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161401651-fde92569-7f67-4899-ae86-0ea08974d8f3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot when current password is invalid<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161401671-5694ca41-fa15-46d6-b42d-eb48759e707c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot when new password is too short (client side validation)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161401705-317a449d-6498-4ea0-a7ac-6c5ee2dc62d1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot when new password and confirm do not match (client side validation)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161401772-d4138ad9-5446-48aa-9930-4d2be3cf2ff3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>username (bill12) changed to bill12345 and password changed<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161401742-03a97dca-04cc-419c-a1dd-683a95d1803e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>screenshot when current password is too short (client side validation)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add before and after screenshots of the Users table when a user edits their profile</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161078953-8e025455-ea90-46c8-ba2d-edf318be0892.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>before password change (ID 7 username bill12)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161079571-9f090803-900c-40da-9577-4d1bb10b77c9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>after password change and username change (ID 7 username bill12345 and hash changed)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/wck3/IT202-010/pull/29">https://github.com/wck3/IT202-010/pull/29</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works (edit only)</td></tr>
<tr><td> <em>Response:</em> <p>Through a series of forms the user enters their email, username, and current<br>password. The email and password are required in order to change the username<br>and password. The user can choose to keep their current username and retype<br>it and create a new password. The user must confirm this password. If<br>the changes meet their criteria, the user table is updated with the new<br>information. If the criteria is not correct or the user information is incorrect,<br>error messages are displayed to inform the user. The format of the fields<br>are checked on the client side first once again to reduce server load.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Proposal and Issues </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone1.md accordingly and a direct link to the path on heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161555034-9ac7c8b6-ebb0-4b38-99bb-203bd0a05f17.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>proposal fit into a single screenshot<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98120794/161310960-3e57eb06-e07f-4786-93b1-5fc829965e07.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>All issues done and closed in project section<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-010-S22/it202-milestone1-deliverable/grade/wck3" target="_blank">Grading</a></td></tr></table>
