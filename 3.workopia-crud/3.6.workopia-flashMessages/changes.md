## For showing flash messages on add/delete listing etc, will use session variables. For now, will put it in public/index.php to have it accessible throughout but in future, will make class of it.
## Add session_start() on most top of public/index.php
## Under App\Controllers\ListingControllers destroy method, adding key/value of success_message in session variable right after fetching and before redirect
## In App\views\listings\index.view.php, changing heading recent jobs to all jobs since recent jobs are supposed to be shown on homepage only
## Adding if/else condition under All Jobs heading which'll check if success_message under session is set and if it is then show div block showing it. After that, unset it which'll only do after reload. 
## Will move it to seperate partial file 