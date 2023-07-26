<?php

namespace Models;

use Models\Database;

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * CREATE
     * @return boolean
     */
    public function createUser($name, $password, $profile): bool
    {
        $this->db->query("INSERT INTO user (`name`, `password`, `profile`) VALUES (:name, :password, :profile)");
        $this->db->bind(':name', $name);
        $this->db->bind(':password', $password);
        $this->db->bind(':profile', $profile);
        if ($this->db->execute()) {
            return true;
        }
        return false;
    }

    /**
     * READ
     */
    public function getUserById($uid)
    {
        $this->db->query("SELECT * FROM user WHERE user_id = :uid");
        $this->db->bind(':uid', $uid);
        return $this->db->single();
    }
}
