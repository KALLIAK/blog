<?php
include_once 'db.php';

function news_all()
{
    $query = db_query("SELECT * FROM news ORDER BY dt DESC");
    return $query->fetchAll();
}

function news_add($title, $content)
{
    $query = db_query("INSERT INTO news (title, content) VALUES (:title, :content)",
        [
            'title' => $title,
            'content' => $content
        ]);
    db_check_error($query);

    return db_connect()->lastInsertId();
}

function news_by_id($id)
{
    $query = db_query("SELECT * FROM news WHERE id_news=:id", ['id' => $id]);
    return $query->fetch();
}

function news_edit($id, $title, $content)
{
    $query = db_query("UPDATE news SET title=:title, content=:content WHERE id_news='$id'", [
        'title' => $title,
        'content' => $content
    ]);
    db_check_error($query);

    return db_connect()->lastInsertId();
}