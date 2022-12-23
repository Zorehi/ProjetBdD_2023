<?php
namespace App\Models\Entities;

use App\Models\Entity;

class DepartmentModel extends Entity
{
    protected $id_department;
    protected $department_code;
    protected $department_name;
    protected $id_region;
 

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_department";
    }


    /**
     * Get the value of department_name
     */ 
    public function getDepartment_name()
    {
        return $this->department_name;
    }

    /**
     * Set the value of department_name
     *
     * @return  self
     */ 
    public function setDepartment_name($department_name)
    {
        $this->department_name = $department_name;

        return $this;
    }

    /**
     * Get the value of department_code
     */ 
    public function getDepartment_code()
    {
        return $this->department_code;
    }

    /**
     * Set the value of department_code
     *
     * @return  self
     */ 
    public function setDepartment_code($department_code)
    {
        $this->department_code = $department_code;

        return $this;
    }

    /**
     * Get the value of id_department
     */ 
    public function getId_department()
    {
        return $this->id_department;
    }

    /**
     * Set the value of id_department
     *
     * @return  self
     */ 
    public function setId_department($id_department)
    {
        $this->id_department = $id_department;

        return $this;
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

    static $info_tables = [
        'id_department' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => 'disabled'
        ],
        'department_code' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ],
        'department_name' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ],
        'id_region' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'region_name'
        ]
    ];
}
