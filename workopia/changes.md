## Loading Database from Framework, using it at time of insaniation by putting in constructor and copying configs from old file
## Stored db as protected property

## Now the whole flow will be like:
    1. At time of insaniation, db config is imported and pass into Database class to setup db 
    2. Then depending on method i.e., index, we use instance to get access to Database class's query method which prepare passed query, bind if multiple requests are made 
    3. After data is returned in form of obj since we setup fetch mode as obj in Database class, it's passed into view where loop is run to show data on UI

## Deleting old home.php file and making listing controller then adding route of it in routes.php in root folder
## In ListingController, removed limit 6 as we want to show all listing
## Creating create route in routes.php then method in ListingController in which we load it's view since that's what we were doing before. 
## Similarly, inserted show route for job detail page in routes.php then method in ListingController, copying data from old show.php file in listings/show.php
## Deleting index, show and create files from listings


