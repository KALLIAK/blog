<?= last_error() ?>
<form action="<?=ROOT?>/register" method="post" >
    <label for="name">Логин:</label><br>
    <input id="name" name="login"> <br>
    <label for="pass">Пароль:</label><br>
    <input type="password" id="pass" name="password"><br><br>
    <input type="submit" value="Зарегистрироваться">
</form>
