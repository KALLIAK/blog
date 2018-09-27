<?php
include_once 'db.php';

function users_all()
{
    $query = db_query("SELECT * FROM users");
    return $query->fetchAll();
}

function user_by_login($login)
{
    $query = db_query("SELECT * FROM users WHERE login=:login", ['login' => $login]);
    return $query->fetch();
}

function user_add($login, $password)
{
    $query = db_query("INSERT INTO users (login, password) VALUES (:login, :password)",
        [
            'login' => $login,
            'password' => $password
        ]);
    db_check_error($query);

    return db_connect()->lastInsertId();
}
