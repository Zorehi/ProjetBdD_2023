<?php
namespace App\Models;

class TenantModel extends Model
{
    protected $id_apartment;
    protected $from_date;
    protected $to_date;
    protected $id_users;
 

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "";
    }

    

    

    /**
     * Get the value of id_apartment
     */ 
    public function getId_apartment()
    {
        return $this->id_apartment;
    }

    /**
     * Set the value of id_apartment
     *
     * @return  self
     */ 
    public function setId_apartment($id_apartment)
    {
        $this->id_apartment = $id_apartment;

        return $this;
    }

    /**
     * Get the value of from_date
     */ 
    public function getFrom_date()
    {
        return $this->from_date;
    }

    /**
     * Set the value of from_date
     *
     * @return  self
     */ 
    public function setFrom_date($from_date)
    {
        $this->from_date = $from_date;

        return $this;
    }

    /**
     * Get the value of to_date
     */ 
    public function getTo_date()
    {
        return $this->to_date;
    }

    /**
     * Set the value of to_date
     *
     * @return  self
     */ 
    public function setTo_date($to_date)
    {
        $this->to_date = $to_date;

        return $this;
    }

    /**
     * Get the value of id_users
     */ 
    public function getId_users()
    {
        return $this->id_users;
    }

    /**
     * Set the value of id_users
     *
     * @return  self
     */ 
    public function setId_users($id_users)
    {
        $this->id_users = $id_users;

        return $this;
    }

    static $info_tables = [
        'id_apartment' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => '??'
        ],
        'from_date' => [
            'elementHTML' => 'input',
            'inputType' => 'date',
            'is_disabled' => ''
        ],
        'to_date' => [
            'elementHTML' => 'input',
            'inputType' => 'date',
            'is_disabled' => ''
        ],
        'id_users' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'username'
        ]
    ];
}