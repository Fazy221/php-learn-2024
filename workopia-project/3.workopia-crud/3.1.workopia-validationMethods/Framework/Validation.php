<?php 
namespace Framework;

class Validation {
    /**
     * Validation
     * 
     * @param string $value
     * @param int $min
     * @param int $max
     * 
     * @return bool
     */

     public static function string($val, $min = 1, $max = INF) { // INF is for infinity, it's one of default php property
        if(is_string($val)) { // ensuring whether value is of string type
            $value = trim($val); // removing any whitespace
            $length = strlen($val); // taking length to measure against min and max
            return $length >= $min && $length <= $max;
        }
        return false; // if value ain't str then return false
     }
     /**
      * Validate Email Address
      * 
      * @param string $value
      * @return mixed // if not valid then return false bool & if true then return email
      */
      public static function email($val) {
        $val = trim($val); // remove whitespace
        return filter_var($val, FILTER_VALIDATE_EMAIL); // this func either return filtered val or false
        // FILTER_VALIDATE_INT and FILTER_VALIDATE_URL are also handy
      }
      /**
       * Match value
       * 
       * @param string $value1
       * @param string $value2
       * @return bool
       */
      public static function match($val1, $val2){
        $val1 = trim($val1);
        $val2 = trim($val2);

        return $val1 === $val2;
      }
}
