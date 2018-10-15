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
<?php
require_once('translationCreator.php');

$translation_creator = new TranslationCreator('test.txt');
$translation_creator->create_word_arrays();
$translation_creator->createWordObjects();
$words = $translation_creator->getWordObjects();

#var_dump($words);
?>
<body>
<?php 
foreach ($words as $word) {
  echo '<label>' . $word->getWordToTranslate() . '</label>';
  #echo $word->getTranslation() . '<br>';
  ?><input type="text" name="translation" value="<?php echo $word->getTranslation()?>"> 
  <?php 
} ?>
</body>
</html>
