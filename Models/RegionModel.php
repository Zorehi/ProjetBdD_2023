<?php
namespace App\Models;

class RegionModel extends Model
{
    protected $id_region;
    protected $region_name;

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_region";
    }

    /**
     * Get the value of id_region
     */ 
    public function getId_region()
    {
        return $this->id_region;
    }

    /**
     * Set the value of id_region
     *
     * @return  self
     */ 
    public function setId_region($id_region)
    {
        $this->id_region = $id_region;

        return $this;
    }

    /**
     * Get the value of region_name
     */ 
    public function getRegion_name()
    {
        return $this->region_name;
    }

    /**
     * Set the value of region_name
     *
     * @return  self
     */ 
    public function setRegion_name($region_name)
    {
        $this->region_name = $region_name;

        return $this;
    }

    static $info_tables = [
        'id_region' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => 'disabled'
        ],
        'region_name' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ]
    ];
}