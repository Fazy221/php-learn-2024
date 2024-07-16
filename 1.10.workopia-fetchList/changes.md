## In home.php in controller, passing data in loadView as assoc array
## Modified loadView in helper func to extract data into view file which mean converting assoc arr ['listing'=>$listing] to variable $listing = ['1', 'Dev']
## In home view, inspecting extracted data to see if it's working

## Changed fetching method from assoc arr to obj (still with arrows) so instead of accessing key's value like $listing['id'], can do $listing->id. The parent $data variable itself containing all fetched job objs will still be arr because that's how we're passing it as in controller/home.php that's why we still doing $data['listing'] at time of foreach loop
## Copying code of home.php controller to listing/index.php controller and loading view listings/index then in home view, changing link of 'show all listings' at bottom to '/listing/<?= listing->id ?>' to dynamically append specific job's id to url like 'http://www.workopia.test/listing/id'. 