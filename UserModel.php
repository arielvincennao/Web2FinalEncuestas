<?php

require_once "Model.php";

class UserModel
{
    function __construct()
    {
        parent::__construct();
    }

    function getUser($email){
        $query= $this->db->prepare('SELECT FROM users WHERE email=?');
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
