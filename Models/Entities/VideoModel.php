<?php
namespace App\Models\Entities;

use App\Models\Entity;

class VideoModel extends Entity
{
    protected $id_video;
    protected $web_adress; 

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_video";
    }

    /**
     * Get the value of id_video
     */ 
    public function getId_video()
    {
        return $this->id_video;
    }

    /**
     * Set the value of id_video
     *
     * @return  self
     */ 
    public function setId_video($id_video)
    {
        $this->id_video = $id_video;

        return $this;
    }

    /**
     * Get the value of web_adress
     */ 
    public function getWeb_adress()
    {
        return $this->web_adress;
    }

    /**
     * Set the value of web_adress
     *
     * @return  self
     */ 
    public function setWeb_adress($web_adress)
    {
        $this->web_adress = $web_adress;

        return $this;
    }

    static $info_tables = [
        'id_video' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => 'disabled'
        ],
        'web_adress' => [
            'elementHTML' => 'input',
            'inputType' => 'url',
            'is_disabled' => ''
        ]
    ];
}