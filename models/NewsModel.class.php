<?php

namespace models;

class NewsModel extends BaseModel
{
    public function __construct(\PDO $db)
    {
        parent::__construct($db, 'news');
    }

    public function add($title, $content)
    {
        $this->runQuery("INSERT INTO {$this->table} (title, content) VALUES (:title, :content)",
            [
                'title' => $title,
                'content' => $content
            ]);
        return $this->db->lastInsertId();
    }

    public function edit($id, $title, $content)
    {
        $this->runQuery("UPDATE {$this->table} SET title=:title, content=:content WHERE id_news='$id'", [
            'title' => $title,
            'content' => $content
        ]);
        return $this->db->lastInsertId();
    }
}