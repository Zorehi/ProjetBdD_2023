<?php
namespace App\Models;

class Device_typeModel extends Model
{
    protected $id_device_type;
    protected $type_name;

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_device_type";
        foreach($this as $champ => $valeur) {
            if($champ != 'db' && $champ != 'table' && $champ != 'idName' && $champ != 'champs' && $champ != 'password'){
                $this->champs[] = $champ;
            }
        }
    }

    /**
     * Get the value of id_device_type
     */ 
    public function getId_device_type()
    {
        return $this->id_device_type;
    }

    /**
     * Set the value of id_device_type
     *
     * @return  self
     */ 
    public function setId_device_type($id_device_type)
    {
        $this->id_device_type = $id_device_type;

        return $this;
    }

    /**
     * Get the value of type_name
     */ 
    public function getType_name()
    {
        return $this->type_name;
    }

    /**
     * Set the value of type_name
     *
     * @return  self
     */ 
    public function setType_name($type_name)
    {
        $this->type_name = $type_name;

        return $this;
    }
}