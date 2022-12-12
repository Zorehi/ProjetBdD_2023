<?php
namespace App\Models;

class UptimeModel extends Model
{
    protected $from_date;
 

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "from_date";
        foreach($this as $champ => $valeur) {
            if($champ != 'db' && $champ != 'table' && $champ != 'idName' && $champ != 'champs' && $champ != 'password'){
                $this->champs[] = $champ;
            }
        }
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
}