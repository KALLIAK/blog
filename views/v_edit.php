<?php echo last_error(); ?>
<form action="<?=ROOT?>/edit/<?= $message['id_news'] ?>" method="post">
    <label for="title">Название:</label><br>
    <input name="title" value="<?= $message['title'] ?>"><br>
    <label for="content">Контент:</label><br>
    <textarea name="content"><?= $message['content'] ?></textarea><br>
    <input type="submit" value="Сохранить">
</form>
