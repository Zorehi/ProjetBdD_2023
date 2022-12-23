<?php
namespace App\Models\Entities;

use App\Models\Entity;

class SubstanceModel extends Entity
{
    protected $id_substance;
    protected $name;
    protected $description;
    protected $min_value;
    protected $max_value;
    protected $critical_value;
    protected $model_value;


    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "is_substance";
    }

    /**
     * Get the value of id_substance
     */ 
    public function getId_substance()
    {
        return $this->id_substance;
    }

    /**
     * Set the value of id_substance
     *
     * @return  self
     */ 
    public function setId_substance($id_substance)
    {
        $this->id_substance = $id_substance;

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

    /**
     * Get the value of critical_value
     */ 
    public function getCritical_value()
    {
        return $this->critical_value;
    }

    /**
     * Set the value of critical_value
     *
     * @return  self
     */ 
    public function setCritical_value($critical_value)
    {
        $this->critical_value = $critical_value;

        return $this;
    }

    /**
     * Get the value of model_value
     */ 
    public function getModel_value()
    {
        return $this->model_value;
    }

    /**
     * Set the value of model_value
     *
     * @return  self
     */ 
    public function setModel_value($model_value)
    {
        $this->model_value = $model_value;

        return $this;
    }

    static $info_tables = [
        'id_substance' => [
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
        ],
        'critical_value' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ],
        'model_value' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'city_name'
        ]
    ];
}