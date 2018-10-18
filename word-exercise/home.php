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
require 'translationCreator.php';

$translation_creator = new TranslationCreator('test.txt');
$translation_creator->create_word_arrays();
$translation_creator->createWordObjects();
$words = $translation_creator->getWordObjects();
shuffle($words);
#var_dump($words);
?>
<body>
<?php
$i = 0;
foreach ($words as $word) {
    ?>
    <br><label><?php echo $word->getWordToTranslate(); ?></label><br>
    <input type="hidden" name="wordToTranslate<?php echo $i ?>" value="<?php echo $word->getWordToTranslate(); ?>">
    <input type="text" name="translation">
    <input type="hidden" name="translation<?php echo $i ?>" value="<?php echo $word->getTranslation(); ?>">
    <button name="ok" onclick="<?php check(); ?>">Check</button>
  <?php 
    $i++;
}
?>
</body>
</html>

<?php
function check()
{
    echo 'called';
    var_dump($_GET);
    if (isset($_GET['ok'])) {
        for ($i = 0; $i < count($words); $i++) {
            $wordToTranslate = $_GET['wordToTranslate' . $i];
            $translation = $_GET['translation' . $i];
            echo $words[$i]->getTranslation() . ' ';
            if ($words[$i]->getTranslation() == $translation) {
                echo 'CORRECT!';
            }
        }
    }
}
?>