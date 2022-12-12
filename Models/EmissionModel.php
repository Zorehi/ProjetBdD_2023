<?php
namespace App\Models;

class EmissionModel extends Model
{
    protected $emission_per_hour;
 

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
     * Get the value of emission_per_hour
     */ 
    public function getEmission_per_hour()
    {
        return $this->emission_per_hour;
    }

    /**
     * Set the value of emission_per_hour
     *
     * @return  self
     */ 
    public function setEmission_per_hour($emission_per_hour)
    {
        $this->emission_per_hour = $emission_per_hour;

        return $this;
    }
}