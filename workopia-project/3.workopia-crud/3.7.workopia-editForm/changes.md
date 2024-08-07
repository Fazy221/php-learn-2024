## Now for editing form, will've to make 2 routes in routes.php One for editing and second for updating. 
## As we want to fetch the listing to show, will copy show method in App\controller\ListingController.php then modify to load edit view. Can use inspectAndDie() to test if listing is showing by end before putting in view after hitting url 'http://workopia.test/listings/edit/3'
## Will modify <a href="edit" > edit link in listings/show.view.php to go to url <a href="/listings/edit/<?= $listing->id ?>"
## Now will make edit.view.php and copy content from create.view.php in it as it's very similar. 
    Will modify heading from "Create Job Listings" to "Edit Job Listing". 
    Since we're getting access to db data directly which is fetched in obj form instead of assoc arr which wasn't the case with creating, we'll change every value from $listing['title'] to $listing->title. 
    Will change <a href="/"> link of cancel btn to <a href="/listings/<?= $listing->id ?> "> so it goes back to show detail page of job
