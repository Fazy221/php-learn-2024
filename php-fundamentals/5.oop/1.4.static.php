<?php
// Sometimes, we don't need new instances but use class directly to do some logic thus we can use static property/method
class MathUtility {
    public static $pi = 3.14;
    public static function add(...$nums) {
        return array_sum($nums);
    }
};

// To access static property or method directly through class name, can use scope resolution operator
echo MathUtility::$pi;
echo MathUtility::add(12,421,51,23);