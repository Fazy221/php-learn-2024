## Add validation file in framework for form purpose. Will keep method so don't have to insaniate since we'll only use it's method by passing string inside and it'll return boolean whether it's true or not
## Trying validation class method in App/controllers/ListingController in index method through inspectAndDie after importing through namespace. 
## Adding email validation method with using filter_var method which either return filtered value or false then testing in ListingController file
## Adding simple match method and testing in ListingController
## Will remove inspectAndDie things from ListingController since it's only purpose was to load view. Will test it on form in next by loading through store and data sanitization