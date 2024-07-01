<?php 

/**
 * Get the base path
 * 
 * @params string $path
 * @return string
 */
 function basePath($path = '') {
    return __DIR__ . '/' . $path;
 }

 /**
  * Load view 
  * @params string $name
  * @return void
  */

  function loadView($name) {
   require basePath("views/{$name}.view.php"); // will make it more concise to go with loadView('home') instead of require basePath('views/home.view.php');
  }

 /**
  * Load partial 
  * @params string $name
  * @return void
  */

  function loadPartial($name) {
   require basePath("views/partials/{$name}.php"); // very similar to load view so instead of <?php require basePath('views/partials/top-banner.php')?->, can do loadPartial('top-banner')
  }