## To implement login func, will go to login view inside App\views\users which currently have nothing in form and add method "POST" & action "/auth/login"
## Adding route of post request to process authenticate method from UserController inside routes.php
## In authentication, will add basic validation for email and password using Validation framework then reload login page with errors in case errors arr have any. Will add error partial in login view
## In case validation turns right, will do 2 steps. First will be to check if email exists in db and second will be to match password