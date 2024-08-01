## In App/views/listings/create.view.php, added link to "/listing" under action attribute so when form is submitted, post request is sent on this specific route. 
## In routes.php where we handle receiving get/post etc requests and navigating to specific controllers, added route with calling store method of ListingController where we would handle db stuff. Will work on it next
## Will test store method by using inspectAndDie to echo out $_POST which includes all the submitted info in an arr like below
```php:
array(11) {
  ["title"]=>
  string(5) "asidj"
  ["description"]=>
  string(6) "iasjod"
  ["salary"]=>
  string(4) "2310"
  ["requirements"]=>
  string(6) "asidjo"
  ["benefits"]=>
  string(8) "ioasjdoi"
  ["company"]=>
  string(9) "saoidjoai"
  ["address"]=>
  string(9) "joiasjdoi"
  ["city"]=>
  string(8) "josiajdo"
  ["state"]=>
  string(6) "isajdo"
  ["phone"]=>
  string(6) "023012"
  ["email"]=>
  string(13) "abc@gmail.com"
}
```
## For extra security, will have all the allowed fields laid out in seperate arr then can match if each matches so no extra thing is allowed outside of them. Further details given in code
## To avoid parsing other type of data like HTML in post request when submitting form, will write sanitize method in helper function then use it on each value of post request in ListingController store method