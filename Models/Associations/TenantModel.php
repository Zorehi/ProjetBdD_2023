<?php
namespace App\Models\Associations;

use App\Models\Association;

class TenantModel extends Association
{
    protected $id_apartment;
    protected $from_date;
    protected $to_date;
    protected $id_users;
 

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idNames = ['id_apartment', 'from_date'];
    }

    public function findByIdApartment($id_apartment) {
        $today = date("Y-m-d");
        return $this->requete("SELECT * FROM {$this->table} WHERE id_apartment = ? AND from_date <= ? AND (to_date > ? OR to_date is NULL)", [$id_apartment, $today, $today])->fetch();
    }

    public function findByIdUsers($id_users) {
        $today = date("Y-m-d");
        return $this->requete("SELECT * FROM {$this->table} WHERE id_users = ? AND from_date <= ? AND (to_date > ? OR to_date is NULL)", [$id_users, $today, $today])->fetchAll();
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
        if ($to_date === null) $to_date = NULL;
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
            'name' => 'num'
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