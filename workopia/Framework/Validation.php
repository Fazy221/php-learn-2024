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

     public static function string($val, $min = 1, $max = INF) { 
        if(is_string($val)) { 
            $value = trim($val);
            $length = strlen($val);
            return $length >= $min && $length <= $max;
        }
        return false; 
     }
     /**
      * Validate Email Address
      * 
      * @param string $value
      * @return mixed 
      */
      public static function email($val) {
        $val = trim($val); 
        return filter_var($val, FILTER_VALIDATE_EMAIL); 
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
