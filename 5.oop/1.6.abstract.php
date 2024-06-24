<?php 
// Abstract class means it can have abstract function 
abstract class Shape {
    public $name;
    protected abstract function getArea(); // Abstract func simply means when child classes inherits, this func is a must to include in them

    function __construct($name)
    {
        $this->name = $name;
    }
}

class Circle extends Shape {
    private $radius;
    function __construct($radius, $name)
    {
        $this->radius = $radius;
        parent::__construct($name);
    }

    function getArea() {
        return $this->name . ' area is ' .  pi() * pow($this->radius, 2);
    }
}

class Rectangle extends Shape {
    private $length;
    private $width;
    function __construct($length, $width, $name) 
    {
        $this->width = $width;
        $this->length = $length;
        parent::__construct($name);
    }
    function getArea() {
        return $this->name . ' area is ' . $this->width * $this->length;
    }
}
$rec = new Rectangle(23, 42, 'Rectangle');
echo $rec->getArea();
echo "<br>";
$circle = new Circle(42, 'Circle');
echo $circle->getArea();