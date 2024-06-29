<?php 
// Import database file
require 'database.php';

// Set up PDO
$stmt = $pdo->prepare('SELECT * FROM posts'); // prepare is imp check for security reason and prevent sql injection
$stmt->execute(); // execute query
// $posts = $stmt->fetchAll(); // call fetch all method then store in posts variable to echo below


/* 
Right now, result will look like this with index under associated arr which turn into hot mess quick so we can rather pass some attribute to get only associated arr
array (
  0 => 
  array (
    'id' => 1,
    0 => 1, // issue
    'title' => 'this is title 1',
    1 => 'this is title 1',
    'description' => 'this is description for title 1',
    2 => 'this is description for title 1',
    'createdAt' => '2024-06-29 05:42:46',
    3 => '2024-06-29 05:42:46',
  ),
  1 => 
  array (
    'id' => 2,
    0 => 2,
    'title' => 'this is title 2',
    1 => 'this is title 2',
    'description' => 'this is description for title 2',
    2 => 'this is description for title 2',
    'createdAt' => '2024-06-29 05:42:46',
    3 => '2024-06-29 05:42:46',
  ),
)
*/
// $posts = $stmt->fetchAll(PDO::FETCH_ASSOC); // instead of doing it everytime, can make it default from db file itself
$posts = $stmt->fetchAll();
/*
After output:
array (
  0 => 
  array (
    'id' => 1,
    'title' => 'this is title 1',
    'description' => 'this is description for title 1',
    'createdAt' => '2024-06-29 05:42:46',
  ),
  1 => 
  array (
    'id' => 2,
    'title' => 'this is title 2',
    'description' => 'this is description for title 2',
    'createdAt' => '2024-06-29 05:42:46',
  ),
)
*/


// echo '<pre>';
// var_export($result);
// echo '<pre>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Blog</title>
</head>

<body class="bg-gray-100">
  <header class="bg-blue-500 text-white p-4">
    <div class="container mx-auto">
      <h1 class="text-3xl font-semibold">My Blog</h1>
    </div>
  </header>
  <div class="container mx-auto p-4 mt-4">
      <?php foreach($posts as $post): ?>
    <div class="md my-4">
      <div class="rounded-lg shadow-md">
        <div class="p-4">
          <h2 class="text-xl font-semibold"><?= $post['title'] ?></h2>
          <p class="text-gray-700 text-lg mt-2"><?= $post['description'] ?></p>
        </div>
    </div>
</div>
    <?php endforeach ?>
  </div>
</body>

</html>