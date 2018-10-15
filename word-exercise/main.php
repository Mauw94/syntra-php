<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Word-Exercixe</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <!-- <link rel="stylesheet" href="css/styles.css?v=1.0">
  <script src="js/scripts.js"></script> -->
</head>

<body>
  <h1>Welcome</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <div>
      <label for="file">Choose file to upload</label>
      <br><br>
      <input type="file" id="file" name="file">
    </div>
    <br><br>
    <div>
      <button name="ok">Submit</button>
    </div>
  </form>
</body>
</html>

<?php
  if (isset($_FILES['file'])) {
    # temporary upload location
    $file = $_FILES['file']['tmp_name'];
    # file size
    echo $_FILES['file']['size'].'<br>';
    # file name
    echo $_FILES['file']['name'].'<br>';
    # file type
    echo $_FILES['file']['type'].'<br>';
    echo $file.'<br>';
  }
?>