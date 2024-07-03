<?php

// echo $_GET['name']; // will echo brad when go to URL "http://localhost/php-sandbox/index.php/?name=brad"
// echo $_GET['email']; // can also chain multiple parameter then get one like email "http://localhost/php-sandbox/index.php/?name=brad&email=brad123@gmail.com"



// Can also get possible error if requested value of key or key itself ain't found in URL params so can implement validation

// Method 1:
// echo isset($_GET["name"]) ? $_GET["name"] : ""; // check on URL "http://localhost/php-sandbox/index.php/?email=brad123@gmail.com"

// Method 2: (more preferred)
// echo $_GET['name'] ?? '';

// Purpose of GET request is first to keep in mind what's its purpose whether store in DB or show on page. If on page then someone can add js in params which is huge security issue like "http://localhost/php-sandbox/index.php/?name=<script>Hello World</script>"
// echo $_GET['name'] ?? '';
echo htmlspecialchars($_GET['name']); // Can therefore use htmlspecialchars. What it'll do is turn js code to this when checked in web source: "&lt;script&gt;alert(&quot;you&#039;re hacked huihui&quot;)&lt;/script&gt;"

