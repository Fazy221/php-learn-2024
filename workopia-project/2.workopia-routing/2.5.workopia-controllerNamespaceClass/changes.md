## Added loading home controller from routes.php as example then went for modifying Router.php
## In registered routes, instead of it getting controller, it would get action; for ex:- 'HomeController@index'. We'll use explode method to turn it into arr seperated by @ when use inspectAndDie method to check output, it'll be like:
                                                                                            ```php 
                                                                                            array(2) {
                                                                                            [0]=>
                                                                                            string(14) "HomeController"
                                                                                            [1]=>
                                                                                            string(5) "index"
                                                                                            }
                                                                                            `

## Similar to js destructure arr method, we'll store str value before and after '@' inside controller & controllerMethod variable using list method of php
## Also added controller method in defined routes array
## Now in router func of class where our requested route is processed, instead of straight up returning controller if requested uri and method matches from defined routes, we can define controller variable with using namespacing 'App\\Controllers\\' and append matched controller found from defined route. 
## Now store controllerMethod in a seperate variable in this router func with value of it matched from defined route. Since our $controller value is going to be a class, we'll insaniate it then call one of it's method as controllerMethod variable
## Giving example, if we're requesting for listing then we can go for something like this:
```php
// In variables 
$listingInstance = new $controller();
$listingInstance->$controllerMethod(); 
// In reality
$listing = new ListingController();
$listing->index(); // index here is controllerMethod's value and just for example
`
## In App/controllers folder, will make HomeController.php file where we define namespace 'App\Controllers'. Every class from it will be automatically loaded by our psr loader. 
## In construct method, will test if class is loading properly by using die method. This is temporary and will be removed. 
## Will make index method which is the primary controller being loaded and will temporarily test die method in it as well