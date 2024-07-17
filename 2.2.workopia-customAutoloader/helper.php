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
   $viewPath = basePath("App/views/{$name}.view.php");
   if(file_exists($viewPath)) {
      extract($data); 
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
   $viewPath = basePath("App/views/partials/{$name}.php");
   if(file_exists($viewPath)){
      require $viewPath;
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