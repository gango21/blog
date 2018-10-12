<?php
//Connexion à la base de données
try
{
    $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$request = $db->query('SELECT id, titre, contenu, date_creation FROM billets');

while ($donnees = $request->fetch(PDO::FETCH_ASSOC))
{
    echo $donnees['id'], $donnees['titre'], $donnees['contenu'], $donnees['date_creation'];
    $billet = new Billet($donnees);
    echo $billet->id(), $billet->titre(), $billet->contenu();
}
$request ->closeCursor();

class Billet
{
    private $_id;
    private $_titre;
    private $_contenu;
    private $_date_creation;

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    // Liste des getters

    public function id()
    {
        return $this->_id;
    }

    public function titre()
    {
        return $this->_titre;
    }

    public function contenu()
    {
        return $this->_contenu;
    }

    public function date_creation()
    {
        return $this->_date_creation;
    }

    //Liste des setters

    public function setId($id)
    {
        $id = (int) $id;
        if ($id > 0)
        {
            $this->_id = $id;
        }
    }

    public function setTitre($titre)
    {
        if (is_string($titre))
        {
            $this->_titre = $titre;
        }
    }

    public function setContenu($contenu)
    {
        if (is_string($contenu))
        {
            $this->_contenu = $contenu;
        }
    }

    public function setDate_creation($date_creation)
    {
        // vérifier la date
        $this->_date_creation = $date_creation;
    }
}
?>
