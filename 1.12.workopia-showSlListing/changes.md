## Modifying url to <a href="/listings?id=<?= $listing->id ?>"> in listings/index.view.php so it'll open url http://workopia.test/listings?id=1 when clicked details btn of a particular job
## Made show.view.php file in listings folder for job detail, partials added and html copied from resource file 
## Adding temp route '$router->get('/listing', 'controllers/listings/show.php');' to routes.php. Will've to upgrade to get id from url 
## Made controller of show.php to load view. For now, it'll load view on url 'http://workopia.test/listing' as that's how we've temp setup it's route


## In public/index.php, using parse_url method on superglobal $_SERVER['REQUEST_URI'] to parse path only and not what's in query. It means if url is '/listing?id=2' then it'll take url only before ? mark so it'll take '/listing' only
## Modifying show.view.php to show dynamic data when visit url manually like 'http://workopia.test/listing?id=2'. This however is coming from user url and interacting with db which ain't something we want so will modify Database.php for handling params 

## In database.php, add params parameter as empty assoc arr, run foreach loop on it with key/value so can handle multiple params. Use bindValue method to keep them seperate with :
## In workopia/controllers/listings/show.php, make assoc array of params in which add id as key then id from url as value. Then in query, use :id and add params assoc array as 2nd arg. PHP will automatically check argument from params assoc array. bindValue comes into play here as we can define multiple params in assoc arr like [id => 1, status=>'active'] then at time query, can do $db->query('SELECT * FROM listings WHERE id = :id AND status = :status', params)->fetch();