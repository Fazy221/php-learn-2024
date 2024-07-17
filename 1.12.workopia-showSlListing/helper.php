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

  function loadView($name, $data = []) {
   $viewPath = basePath("views/{$name}.view.php");
   if(file_exists($viewPath)) {
      extract($data); // if data is in assoc arr like ['listings'=>$listings] then it'll make key variable like $listings = ['1','Developer'..]
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

  /** 
   * Inspect value(s)
   * @params mixed $values
   * @return void
   */
  function inspect($value) {
   echo '<pre>';
   var_dump($value);
   echo '</pre>';
  }

   /** 
   * Inspect value(s) and die
   * 
   * @params mixed $values
   * @return void
   */
  function inspectAndDie($value) {
   echo '<pre>';
   die(var_dump($value));
   echo '</pre>';
  }

  /**
   * Format salary
   * 
   * @params string $salary
   * @return string Formatted salary
   */
  function formatSalary($salary) {
   return '$' . number_format(floatval($salary));
  }