<?php
$title = '';
$description = '';
$submitted = false; 
$statusArr = [
    "SUCCESS" => "49, 186, 0, 0.7",
    "FAIL" => "189, 0, 0, 0.78",
    "INVALID" => "0, 0, 0, 0.35"
];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
  $title = htmlspecialchars($_POST['title']) ?? 'No title added!';
  $description = htmlspecialchars($_POST['description']) ?? 'No description added!';

  $submitted = true;
}
$_FILES['logo'] ?? '';
$logoFile = $_FILES['logo'] ?? '';
if($logoFile ?? $logoFile['error'] === UPLOAD_ERR_OK) { // added coalescing operator line in start to avoid err on first page load
    $uploadDir = 'uploads/';
    if(!is_dir($uploadDir)) {
        mkdir($uploadDir, 0775, true); 
    };
    $fileName = uniqid() . "-" . $logoFile['name'];
    $allowedFileExtensions = ['jpg', 'jpeg', 'png'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    if(in_array($fileExtension, $allowedFileExtensions)) {
        if(move_uploaded_file($logoFile['tmp_name'], $uploadDir . $fileName)){
            echo '<div class=\'mx-auto px-4 py-2 text-center font-bold color-white\' style="background-color:rgba(' . $statusArr['SUCCESS'] . ')";>File Uploaded Successfuly</div>';
        } else {
            echo '<div class=\'mx-auto px-4 py-2 text-center font-bold color-white\' style="background-color:rgba(' . $statusArr['FAIL'] . ')";>File Failed due to following reason: </div>' . $logoFile['error'];
        }
    } else {
        echo '<div class=\'mx-auto px-4 py-2 text-center font-bold color-white\' style="background-color:rgba(' . $statusArr['INVALID'] . ')";>File Type Invalid </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Job Listing</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
  <div style="color:rgba(2,3,1,4);" class="flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
      <h1 class="text-2xl font-semibold mb-6">Create Job Listing</h1>
      <form method="post" enctype="multipart/form-data">
        <div class="mb-4">
          <label for="title" class="block text-gray-700 font-medium">Title</label>
          <input type="text" id="title" name="title" placeholder="Enter job title" class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300 focus:outline-none" value="<?= $title ?>">
        </div>
        <div class="mb-6">
          <label for="description" class="block text-gray-700 font-medium">Description</label>
          <textarea id="description" name="description" placeholder="Enter job description" class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300 focus:outline-none"><?= $description ?></textarea>
        </div>
        <div class="mb-4">
          <label for="resume" class="block text-gray-700 font-medium">Logo</label>
          <input type="file" id="logo" name="logo" class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300 focus:outline-none">
        </div>
        <div class="flex items-center justify-between">
          <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
            Create Listing
          </button>
          <a href="#" class="text-blue-500 hover:underline">Back to Listings</a>
        </div>
      </form>

      <!-- Display submitted data -->
      <?php if ($submitted) : ?>
        <div class="mt-6 p-4 border rounded bg-gray-200">
          <h2 class="text-lg font-semibold">Submitted Job Listing:</h2>
          <p><strong>Title:</strong> <?= $title === '' ? '<span class="font-semibold" style="color:rgba(' . $statusArr['FAIL'] . ')";>'."Please add title".'</span>' : $title ?></p>
          <p><strong>Description:</strong> <?= $description === '' ? '<span class="font-semibold" style="color:rgba(' . $statusArr['FAIL'] . ')";>'."Please add description".'</span>' : $description ?></p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</body>

</html>