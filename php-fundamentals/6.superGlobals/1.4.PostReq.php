<?php 
// Will set initial value of $title and $description to empty string to avoid err on first load
$title = '';
$description = '';
// Can set initial display of submitted values to false and set to true after submission kinda similar to React
$submission = false;

// echo $_SERVER['REQUEST_METHOD']; // This is request method happening on page. If we go to URL then it echo GET method. If we submit form then it echo POST method
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST["submit"])) { // To have validation whether values in form which is sent through POST req are filled or not, can use isset
    // var_dump($_POST); // Can see data on submission

    /* // Right now, can do scripting attacks by putting <script>alert("you are hacked")</script> so have to use htmlspecialchars
    $title = $_POST['title']; 
    $description = $_POST['description'];
    */
    $title = htmlspecialchars($_POST['title']) ?? ''; // For validation, can simply use coalescing operator instead of isset($_POST["title"]) ? htmlspecialchars($_POST['title']) : ''
    $description = htmlspecialchars($_POST['description']) ?? '';
    // echo $title, $description;
    $submission = true;
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
      <form method="post"> <!-- method is there to execute post on submission. There is also action="process.php" in which we navigate to specific file to a perform action  -->
        <div class="mb-4">
          <label for="title" class="block text-gray-700 font-medium">Title</label> 
          <input type="text" id="title" name="title" placeholder="Enter job title" class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300 focus:outline-none"> <!-- Having name attribute is imp for php to fetch form data on post request submission -->
        </div>
        <div class="mb-6">
          <label for="description" class="block text-gray-700 font-medium">Description</label>
          <textarea id="description" name="description" placeholder="Enter job description" class="w-full px-4 py-2 border rounded focus:ring focus:ring-blue-300 focus:outline-none"></textarea>
        </div>
        <div class="flex items-center justify-between">
          <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
            Create Listing
          </button>
          <a href="#" class="text-blue-500 hover:underline">Back to Listings</a>
        </div>
      </form>

      <!-- Display submitted data -->
       <?php if($submission) : ?> <!-- Will only display submitted data if $submission is set to true -->
       <div class="mt-6 p-4 border rounded bg-gray-100">
        <h2 class="text-lg font-semibold">Submitted Job Listing:</h2>
        <p>
          <strong>Title:</strong>
          <?= $title ?>
        </p>
        <p>
          <strong>Description:</strong>
          <?= $description ?>
        </p>
       </div>
       <?php endif; ?>
    </div>
  </div>
</body>

</html>