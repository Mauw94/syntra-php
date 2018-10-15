<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Translation Exercise</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="css/styles.css?v=1.0">
  <script src="js/scripts.js"></script>
</head>

<body>

</body>
</html>

<?php
require_once('translationCreator.php');

$translation_creator = new TranslationCreator('test.txt');
$translation_creator->create_word_arrays();
$translation_creator->print_wordsToTranslate();
$wordsToTranslate = $translation_creator->getWords_to_translate();

foreach ($wordsToTranslate as $translate) {
    echo $translate . " ";
}
?>