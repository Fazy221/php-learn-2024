<?php 
require 'database.php';
$id = $_GET['id'];
if(!$id) {
    header('Location: index.php'); 
    exit;
}
$sql = 'SELECT * FROM posts WHERE id = :id'; 
$stmt = $pdo->prepare($sql); 
$params = ['id'=>$id];
$stmt->execute($params);
$post = $stmt->fetch();
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
      <div class="rounded-lg shadow-md mb-5">
        <div class="p-4">
          <h2 class="text-xl font-semibold"><?= $post['title']; ?></h2>
          <p class="text-gray-700 text-lg mt-2 mb-5"><?= $post['body']; ?></p>
          <a href="index.php">Go Back</a>
        </div>
      </div>
      <!-- Edit -->
      <a href="edit.php?id=<?= $post['id'] ?>" type="submit" name="submit" class="block text-center text-xl bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 focus:outline-none w-full mb-2">Edit</a>
      <!-- Delete -->
      <form action="delete.php" method="post">
        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="id" value="<?= $post['id'] ?>">
        <button type="submit" name="submit" class="text-xl bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 focus:outline-none w-full">Delete</button>
      </form>
    </div>
  </div>
</body>


</html>