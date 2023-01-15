<?php
namespace App\Models\Associations;

use App\Models\Association;

class Turn_onModel extends Association
{
    protected $id_device;
    protected $from_date;
    protected $to_date;
 

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idNames = ['id_device', 'from_date'];
    }

    public function uptime($id){
        return $this->requete("SELECT id_device, DATE(from_date) as date, to_date, SUM(TO_SECONDS(IF(to_date = '0000-00-00 00:00:00', SYSDATE(), to_date)) - TO_SECONDS(from_date)) as uptime
                               FROM turn_on
                               GROUP BY id_device, date;")->fetchAll();
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
        if ($to_date == null) $to_date = '0000-00-00 00:00:00';
        $this->to_date = $to_date;

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
     * Get the value of id_device
     */ 
    public function getId_device()
    {
        return $this->id_device;
    }

    /**
     * Set the value of id_device
     *
     * @return  self
     */ 
    public function setId_device($id_device)
    {
        $this->id_device = $id_device;

        return $this;
    }

    static $info_tables = [
        'id_device' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'device_name'
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
        ]
    ];
}