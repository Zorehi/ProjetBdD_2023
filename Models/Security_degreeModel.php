<?php
namespace App\Models;

class Security_degreeModel extends Model
{
    protected $id_security_degree;
    protected $description;


    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_security_degree";
    }

    /**
     * Get the value of id_security_degree
     */ 
    public function getId_security_degree()
    {
        return $this->id_security_degree;
    }

    /**
     * Set the value of id_security_degree
     *
     * @return  self
     */ 
    public function setId_security_degree($id_security_degree)
    {
        $this->id_security_degree = $id_security_degree;

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

    static $info_tables = [
        'id_security_degree' => [
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