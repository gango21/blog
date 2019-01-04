<?php

class AdminManager
{
    //Connexion à la base de données

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
        $q = $this->_db->query('SELECT id, user, password FROM admin');
        $admin = $q->fetch(PDO::FETCH_ASSOC);
        return $admin;
    }

    public function editPassword($id, $password)
    {
        $querry = 'UPDATE admin SET password ="'.$password.'" WHERE id =' .$id;
        $q = $this->_db->exec($querry);
    }
}

?>
