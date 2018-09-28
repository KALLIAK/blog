<?php

namespace models;

class UsersModel extends BaseModel
{
    public function __construct(\PDO $db)
    {
        parent::__construct($db, 'users');
    }

    public function getByLogin($login)
    {
        $query = $this->runQuery("SELECT * FROM {$this->table} WHERE login=:login", ['login' => $login]);
        return $query->fetch();
    }

    public function add($login, $password)
    {
        $this->runQuery("INSERT INTO {$this->table} (login, password) VALUES (:login, :password)",
            [
                'login' => $login,
                'password' => $password
            ]);
        return $this->db->lastInsertId();
    }
}