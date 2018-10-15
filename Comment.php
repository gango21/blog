<?php

class Comment
{
    private $_id;
    private $_id_billets;
    private $_author;
    private $_content_comment;
    private $_date_comment;

    public function __construct(array $donnees)
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

    public function id() {return $this->_id;}
    public function id_billets(){return $this->_id_billets;}
    public function author(){return $this->_author;}
    public function content(){return $this->_content;}
    public function date_comment(){return $this->_date_comment;}

    //Liste des setters

    public function setId($id)
    {
        $id = (int) $id;
        if ($id > 0)
        {
            $this->_id = $id;
        }
    }

    public function setTitre($id_billets)
    {
        $id_billets = (int) $id_billets;
        if ($id_billets > 0)
        {
            $this->_id_billets = $id_billets;
        }
    }

    public function setAuthor($author)
    {
        if (is_string($author))
        {
            $this->_author = $author;
        }
    }

    public function setContent($content)
    {
        if (is_string($content))
        {
            $this->_content = $content;
        }
    }

    public function setDate_comment($date_comment)
    {
    // vérifier la date
        $this->_date_comment = $date_comment;
    }

}
?>
