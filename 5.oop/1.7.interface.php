<?php
// Alternative to abstraction is interface which instead of defining function as abstraction then adding abstraction method, we can define interface then implement on needed class 
interface ContentInterface {
    public function display();
    public function edit();
}
class Article implements ContentInterface {
    public $title; 
    public $content;
    function __construct($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
    }
    function display() {
        return "<h2 class='text-2xl font-bold'>$this->title</h2> <p>$this->content</p>";
    }
    function edit() {
        return "Editing $this->title";
    }
}
class Video implements ContentInterface {
    public $title; 
    public $url;
    function __construct($title, $url)
    {
        $this->title = $title;
        $this->url = $url;
    }
    function display() {
        return "<h2 class='text-2xl font-bold'>$this->title</h2><iframe src='$this->url'></iframe>";
    }
    function edit() {
        return "Editing $this->title";
    }
}
$article = new Article('Best PHP videos 2024', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. At, numquam!'); 
$video = new Video('Great exercises you should try', 'https://www.youtube.com/watch?v=N_grX2tVD3c&t=513s');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Learn PHP From Scratch</title>
</head>

<body class="bg-gray-100">
    <header class="bg-blue-500 text-white p-4">
        <div class="container mx-auto">
            <h1 class="text-3xl font-semibold"><?= "Learn PHP From Scratch" ?></h1>
        </div>
    </header>
    <div class="container mx-auto p-4 mt-4">
        <div class="bg-white rounded-lg shadow-md p-6">
            <!-- Output -->
             <?= $article->display(); ?>
             <?= $article->edit(); ?>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <!-- Output -->
             <?= $video->display(); ?>
             <?= $video->edit(); ?>
        </div>
    </div>
</body>

</html>