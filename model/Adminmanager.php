<?php

class AdminManager
{

    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }

    public function connectAdmin()
    {
        $q = $this->_db->query('SELECT id, user, password, mail FROM admin');
        $admin = $q->fetch(PDO::FETCH_ASSOC);
        return $admin;
    }

    public function editPassword($id, $password)
    {
        $querry = 'UPDATE admin SET password ="'.$password.'" WHERE id =' .$id;
        $q = $this->_db->exec($querry);
    }

    public function editEmail($id, $email)
    {
        $querry = 'UPDATE admin SET mail ="'.$email.'" WHERE id =' .$id;
        $q = $this->_db->exec($querry);
    }

    public function resetPassword()
    {
        $id =1;
        $temp_password=rand(100000,999999);
        $password = password_hash($temp_password, PASSWORD_BCRYPT);
        $querry = 'UPDATE admin SET password ="'.$password.'" WHERE id =' .$id;
        $q = $this->_db->exec($querry);
        return $temp_password;
    }
}

?>
