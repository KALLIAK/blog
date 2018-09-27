<?php foreach ($messages as $message): ?>
    <br><a href="<?=ROOT?>/post/<?= $message['id_news'] ?>"><?= $message['title'] ?></a>
<?php endforeach; ?>
<br>
