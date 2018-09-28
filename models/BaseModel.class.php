<?php

namespace models;

abstract class BaseModel
{
    protected $db;
    protected $table;

    public function __construct(\PDO $db, string $table)
    {
        $this->db = $db;
        $this->table = $table;
    }

    public function getAll()
    {
        $query = $this->runQuery("SELECT * FROM {$this->table} ORDER BY dt DESC");
        return $query->fetchAll();
    }

    public function getById($id)
    {
        $query = $this->runQuery("SELECT * FROM {$this->table} WHERE id_news=:id", ['id' => $id]);
        return $query->fetch();
    }

    private function checkError(\PDOStatement $query)
    {
        $info = $query->errorInfo();
        if ($info[0] !== \PDO::ERR_NONE) {
            exit($info[2]);
        }
        return $info;
    }

    protected function runQuery($sql, $params = [])
    {
        $query = $this->db->prepare($sql);
        $query->execute($params);
        $this->checkError($query);
        return $query;
    }
}