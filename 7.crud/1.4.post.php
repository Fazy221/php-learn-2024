<?php 
require 'database.php';
$id = $_GET['id'];
if(!$id) {
    header('Location: index.php'); // If ID not found from params then go to homepage which is index.php in this case
    exit;
}
$sql = 'SELECT * FROM post WHERE id = :id'; // Since we're taking user input as data from params so have to be extra careful by storing query seperately
$stmt = $pdo->prepare($sql); 
// $stmt->execute(['id'=>$id]); // can also store in params variable first for extra safety 
$params = ['id'=>$id];
$stmt->execute($params);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Post One</title>
</head>

<body class="bg-gray-100">
  <header class="bg-blue-500 text-white p-4">
    <div class="container mx-auto">
      <h1 class="text-3xl font-semibold">My Blog</h1>
    </div>
  </header>
  <div class="container mx-auto p-4 mt-4">
    <div class="md my-4">
      <div class="rounded-lg shadow-md">
        <div class="p-4">
            <h2 class="text-xl font-semibold"><?= $post['title'] ?></h2>
            <p class="text-gray-700 text-lg mt-2 mb-5"><?= $post['body'] ?></p>
          <a href="index.php">Go Back</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>