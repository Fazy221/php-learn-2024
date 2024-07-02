<?php 

/**
 * Base path helper func for appending parent dir
 * @params string $path
 * @return string
 */

function basePath($path) {
    return __DIR__ . '/' . $path;
}

/** 
 * Load view helper func 
 * @params string $value
 * @return void
 */

function loadView($value) {
    $valuePath = basePath("views/$value.php");
    if(file_exists($valuePath)) {
        require $valuePath;
    } else {
        echo "No view $value found";
    }
}

/** 
 * Load partial helper func 
 * @params string $value
 * @return void
 */

 function loadPartial($value) {
    $valuePath = basePath("views/partials/$value.php");
    if(file_exists($valuePath)) {
        require $valuePath;
    } else {
        echo "No partial $partial found";
    }
}

/**
 * Inspect for debug
 * @params mixed $values
 * @return void
 */

 function inspect($values) {
    echo '<pre>';
    var_dump($values);
    echo '</pre>';
 }

 /**
 * InspectAndDie for debug and break script
 * @params mixed $values
 * @return void
 */

 function inspectAndDie($values) {
    echo '<pre>';
    die(var_dump($values));
    echo '</pre>';
 }