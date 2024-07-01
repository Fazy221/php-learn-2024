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
   $viewPath = basePath("views/{$name}.view.php");
   if(file_exists($viewPath)) {
      require $viewPath;
   } else {
      echo "View {$name} not found";
   }
  }

 /**
  * Load partial 
  * @params string $name
  * @return void
  */

  function loadPartial($name) {
   $viewPath = basePath("views/partials/{$name}.php");
   if(file_exists($viewPath)){
      require "views/partials/{$name}.php";
   } else {
      echo "Partial $name not found";
   }
  }