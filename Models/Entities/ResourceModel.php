<?php
namespace App\Models\Entities;

use App\Models\Entity;

class ResourceModel extends Entity
{
    protected $id_resource;
    protected $name;
    protected $description;
    protected $min_value;
    protected $max_value;
    
    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_resource";
    }

    /**
     * Get the value of id_resource
     */ 
    public function getId_resource()
    {
        return $this->id_resource;
    }

    /**
     * Set the value of id_resource
     *
     * @return  self
     */ 
    public function setId_resource($id_resource)
    {
        $this->id_resource = $id_resource;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

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

    /**
     * Get the value of min_value
     */ 
    public function getMin_value()
    {
        return $this->min_value;
    }

    /**
     * Set the value of min_value
     *
     * @return  self
     */ 
    public function setMin_value($min_value)
    {
        $this->min_value = $min_value;

        return $this;
    }

    /**
     * Get the value of max_value
     */ 
    public function getMax_value()
    {
        return $this->max_value;
    }

    /**
     * Set the value of max_value
     *
     * @return  self
     */ 
    public function setMax_value($max_value)
    {
        $this->max_value = $max_value;

        return $this;
    }

    static $info_tables = [
        'id_resource' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => 'disabled'
        ],
        'name' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ],
        'description' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ],
        'min_value' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ],
        'max_value' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ]
    ];
}