<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>The HTML5 Herald</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="css/styles.css?v=1.0">
  <script src="js/scripts.js"></script>
</head>

<body>

  <h1>Welcome</h1>
</body>
</html>

<?php
    # constant stream of the file untill there are no more lines to read
    if ($fh = fopen('test.txt', 'r')) {
        while (!feof($fh)) {
            $line = fgets($fh);
            echo $line . '<br>';
        }
        fclose($fh);
    }

    # write to a file and append at the end (a)
    if ($file = fopen('test.txt', 'a')) {
        $data = 'this is what is supposed to be written in the file';
        fwrite($file, $data);
        fclose($file);
    }

    # put all the lines of the file into an array
    $file_lines = file('test.txt');
    foreach($file_lines as $line) {        
        echo $line.'<br>';
    }

?>