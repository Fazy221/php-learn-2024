<?php


// Challenge 1
class Article {
    public $title;
    public $content;
    private $published = false;
    function __construct($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
    }
    function publish() {
        $this->published = true;
    }
    function isPublished() {
        return $this->published;
    }
}

$article1 = new Article('Best Meditation Exercises 2024', ' Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque, minima.');
$article2 = new Article('Best Gaming Skills to learn', ' Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque, minima.');
$article1->publish(); // Article 1 published
var_export($article1->isPublished()); // Article 1 so publish = true
var_export($article2->isPublished()); // Article 2 so publish = false


// Challenge 2
class StringUtility {
    // public static $shout = fn($str) => strtoupper($str) . '!';
    public static function shout ($str) { 
        return strtoupper($str) . '!';
    }
    public static function whisper($str){ return strtolower($str) . '.';}
    public static function repeat($str, $time = 2){ return str_repeat($str, $time);}
};
$string = "------Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, eveniet.";
echo "<br>";
echo StringUtility::shout($string);
echo "<br>";
echo StringUtility::whisper($string);
echo "<br>";
echo StringUtility::repeat($string, 5);