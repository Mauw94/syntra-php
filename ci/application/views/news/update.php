<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('news/update'); ?>

    <label for="title">Title</label>
    <input type="input" name="title" value="<?php echo $news_item['title'];?>"/><br />

    <input type="hidden" value ="<?php echo $news_item['slug'];?>">
    <input type="hidden" value ="<?php echo $news_item['id'];?>">

    <label for="text">Text</label>
    <textarea name="text"><?php echo $news_item['text']; ?></textarea><br />

    <input type="submit" name="submit" value="Create news item" />

</form>