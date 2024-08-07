## Now coming to authentication, will create register and login route in routes.php
## Will've auth as prefix before /register and /login and both will call create and login method respectively from UserController which we'll make in next step
## After importing namespace, setting up db and writing create and login controller which loads view create and login which don't exists yet, we'll create views. Firstly, we'll change <a href="login.html"> link to <a href="auth/login"> in navbar partial  
## We'll import head navbar and footer partial in both then copy code from resource file and remove unnecessary commented out flash message code from both then modify 'Already logged in' <a href="login.html"> to <a href="login">. As we're already "/auth/create" so no need to add auth/ beforehand. Do same with register link in login page


