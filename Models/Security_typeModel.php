<?php
namespace App\Models;

class Security_typeModel extends Model
{
    protected $id_security;
    protected $description;


    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_security";
        foreach($this as $champ => $valeur) {
            if($champ != 'db' && $champ != 'table' && $champ != 'idName' && $champ != 'champs' && $champ != 'password'){
                $this->champs[] = $champ;
            }
        }
    }

    /**
     * Get the value of id_security
     */ 
    public function getId_security()
    {
        return $this->id_security;
    }

    /**
     * Set the value of id_security
     *
     * @return  self
     */ 
    public function setId_security($id_security)
    {
        $this->id_security = $id_security;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}