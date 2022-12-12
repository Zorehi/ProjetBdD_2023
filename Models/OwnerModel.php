<?php
namespace App\Models;

class OwnerModel extends Model
{
    protected $to_date;

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
}