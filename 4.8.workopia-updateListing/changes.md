## Right now, we can delete any listing. What we want to do is, at time of listing being stored, we want user to be saved along who will be owner of that particular listing. 
## To accomplish this, first we go to store method inside ListingController and will change line 
    ```$newListingData['user_id'] = 1;``` to ```$newListingData['user_id'] = Session::get('user')['id'];```. 
## As sidenote, in our recent jobs, we want the most recent to come first instead of opposite happening right now. For this, we'll go to HomeController and modify line in index method where we are fetching list from 
    ```$listings = $this->db->query('SELECT * FROM listings LIMIT 6')->fetchAll();``` 
    to 
    ```$listings = $this->db->query('SELECT * FROM listings ORDER BY created_at DESC LIMIT 6')->fetchAll();```
## Will do same in ListingController excluding limit
## Now second step will be to show delete option to only user who own that listing. First we go to destroy method of ListingController and add authorization functionality after it checks if listings exists. Currently, we'll store error in session but in next step, we'll use flash messages for session as well. Moving onwards, we'll redirect to listing detail page. 
## Now for session flash messages, will break it in two steps. As the full method currently is:
    ```php if(Session::get('user')['key']!==$listing->user_id) {
            $_SESSION['error_message'] = 'You are not authorized to delete this listing';
            return redirect('/listings/' . $listing->id);
        }
    ```
    As first step, we'll break down if() part firstly from 
    if (Session::get('user')['key']!==$listing->user_id) 
    to if (!Authorization::isOwner($listing->user_id))
## For this, will make file called Authorization in Framework, add it's namespace then isOwner method which takes in listing id as param to match with currently logged user's id and return bool based on match. Then return to ListingController with importing Authorization namespace and using it's isOwner method in place of prev work. 
    As second step, we'll go to Session.php in Framework and add method of set flash messages which take in key and param as string params. We'll add set and get method. Now in ListingController, we'll add this flash messages functionality in destroy method in case of no authorization, replacing old way from:
            { $_SESSION['error_message'] = 'You are not authorized to delete this listing';
            return redirect('/listings/' . $listing->id); }
    to { Session::setFlashMessage('error_message', 'You are not authorized to delete this listing'); 
        return redirect('/listings/' . $listing->id); }
## We'll also add it after listing is deleted successfully in same method replacing prev one. Also adding it after listing is created successfully in store method for which we'll first modify message partial to use Session method. Then in end, we'll replace old method in update listing as well. 
## Now for update, we have to add auth layer after it checks if listing exists similar to destroy method where we would click delete btn. To make this quick, we'll copy authorization code snippet from destroy method, change message a bit. Will also add in edit method after it checks if listing exists so it comes directly in edit view.
## To get rid of btns so they don't show if user don't own the listing, will go to listings\show.php and add if else statement with using Authorization's isOwner method from Framework to see if current logged user owns the listing 