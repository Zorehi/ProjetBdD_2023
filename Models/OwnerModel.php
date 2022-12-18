<?php
namespace App\Models;

class OwnerModel extends Model
{
    protected $id_house;
    protected $from_date;
    protected $to_date;
    protected $id_user;

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "";
    }
    

    /**
     * Get the value of id_house
     */ 
    public function getId_house()
    {
        return $this->id_house;
    }

    /**
     * Set the value of id_house
     *
     * @return  self
     */ 
    public function setId_house($id_house)
    {
        $this->id_house = $id_house;

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
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    static $info_tables = [
        'id_house' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'house_name'
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
        'id_user' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'username'
        ]
    ];
}