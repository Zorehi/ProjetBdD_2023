<?php
namespace App\Models\Entities;

use App\Models\Entity;

class GenderModel extends Entity
{
    protected $id_gender;
    protected $description;
 

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_gender";
    }

    public function countEachGender() {
        return $this->requete("SELECT G.description as name, COUNT(*) as y
                               FROM Gender G RIGHT OUTER JOIN Users U ON(G.id_gender = U.id_gender)
                               GROUP BY G.id_gender")->fetchAll();
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

    /**
     * Get the value of id_gender
     */ 
    public function getId_gender()
    {
        return $this->id_gender;
    }

    /**
     * Set the value of id_gender
     *
     * @return  self
     */ 
    public function setId_gender($id_gender)
    {
        $this->id_gender = $id_gender;

        return $this;
    }

    static $info_tables = [
        'id_gender' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => 'disabled'
        ],
        'description' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ]
    ];
}