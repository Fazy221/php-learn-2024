<?php
$title = '';
$description = '';
$submitted = false; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
  $title = htmlspecialchars($_POST['title'] ?? '');
  $description = htmlspecialchars($_POST['description'] ?? '');

  $submitted = true;

//   As html of file upload block added, after upload and submission, can get access to it's array which have all details
    
    /*  echo "<pre>";
        var_dump($_FILES);
        echo "</pre>";
    */
    // Output:
    /*
    array(1) {
  ["logo"]=>
  array(6) {
    ["name"]=>
    string(12) "Picture1.png"
    ["full_path"]=>
    string(12) "Picture1.png"
    ["type"]=>
    string(9) "image/png"
    ["tmp_name"]=>
    string(45) "C:\Users\faiza\AppData\Local\Temp\php7577.tmp"
    ["error"]=>
    int(0)
    ["size"]=>
    int(172748)
    }
    }
    */

    // Now will store our uploaded pic file's detail in a variable to later get access to it's details whenever needed
    $logoFile = $_FILES['logo']; // can get access to detail directly by "$_FILES(['logo']['full_path']);"
    // echo $logoFile['full_path'];
    // Now will add upload functionality
    if($logoFile['error'] === UPLOAD_ERR_OK) {
        // Specify where to upload
        $uploadDir = 'uploads/'; // Using / in end to later concatenate
        // Check and create folder if don't exist
        if(!is_dir($uploadDir)) {
            mkdir($uploadDir, 0775, true); // 0775 mean size and true mean allowing to create nested dir
        }
        // Create file name
        $fileName = uniqid() . '-' . $logoFile['name']; // This creates filename in following format: 6677274cc7488-Picture1.png
        // Allowed file extensions
        $allowedFileExtensions = ["jpg", "jpeg", "png"];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // Will use a callback func to get extension whether it's png, jpeg or something else
        
        if(in_array($fileExtension, $allowedFileExtensions)) {
            // Upload File
            if(move_uploaded_file($logoFile['tmp_name'], $uploadDir . $fileName)) { // tmp_name is 
                echo "File Uploaded!";
            } else {
                echo "Error uploading file" . $logoFile['error'];
            }
        } else {
            echo "Error with file extension!";
        }
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
  <div class="flex justify-center items-center h-screen">
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
          <p><strong>Title:</strong> <?= $title ?></p>
          <p><strong>Description:</strong> <?= $description ?></p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</body>

</html>