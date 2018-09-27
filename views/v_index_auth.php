<?php foreach ($messages as $message): ?>
    <br><a href="<?=ROOT?>/post/<?= $message['id_news'] ?>"><?= $message['title'] ?></a>
    <a href="<?=ROOT?>/edit/<?= $message['id_news'] ?>">&lt;- (edit)</a>
<?php endforeach; ?>
<br>
