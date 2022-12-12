<?php
namespace App\Models;

class ConsumtionModel extends Model
{
    protected $consumtion_per_hour;
 

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "";
        foreach($this as $champ => $valeur) {
            if($champ != 'db' && $champ != 'table' && $champ != 'idName' && $champ != 'champs' && $champ != 'password'){
                $this->champs[] = $champ;
            }
        }
    }

    /**
     * Get the value of consumtion_per_hour
     */ 
    public function getConsumtion_per_hour()
    {
        return $this->consumtion_per_hour;
    }

    /**
     * Set the value of consumtion_per_hour
     *
     * @return  self
     */ 
    public function setConsumtion_per_hour($consumtion_per_hour)
    {
        $this->consumtion_per_hour = $consumtion_per_hour;

        return $this;
    }
}