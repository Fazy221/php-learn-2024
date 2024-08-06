## As we want to log the user in, will create Session file under Framework folder since it's part of core application. 
## Will start session in public/index.php file after importing it's namespace
## Will create different methods in session file like get, has, clear etc. 
## To implement in auth, will go to UserController and import namespace. Now in store method before redirecting, we'll first get user id since it's new user 