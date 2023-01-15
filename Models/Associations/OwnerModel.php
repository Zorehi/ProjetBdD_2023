<?php
namespace App\Models\Associations;

use App\Models\Association;

class OwnerModel extends Association
{
    protected $id_house;
    protected $from_date;
    protected $to_date;
    protected $id_users;

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idNames = ['id_house', 'from_date'];
    }

    public function findByIdHouse($id_house) {
        $today = date("Y-m-d");
        return $this->requete("SELECT * FROM {$this->table} WHERE id_house = ? AND from_date <= ? AND (to_date > ? OR to_date = '0000-00-00')", [$id_house, $today, $today])->fetch();
    }

    public function findByIdUsers($id_users) {
        $today = date("Y-m-d");
        return $this->requete("SELECT * FROM {$this->table} WHERE id_users = ? AND from_date <= ? AND (to_date > ? OR to_date = '0000-00-00')", [$id_users, $today, $today])->fetchAll();
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
        if ($to_date === null) $this->to_date = '0000-00-00';

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
        'id_users' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'username'
        ]
    ];
}