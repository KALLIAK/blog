<? echo last_error();
if (!empty($message)): ?>
    <h2><?= $message['title'] ?></h2>
    <em><?= $message['dt'] ?></em><br>
    <hr>
    <?= nl2br($message['content']); ?>
    <hr>
<? endif; ?>