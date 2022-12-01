<?php
namespace App\Models;

class UsersModel extends Model
{
    protected $id;
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $password;
    protected $sex_id;
    protected $born_date;
    protected $tel;
    protected $create_time;

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id";
    }

    public function findByEmailOrTel($email) {
        return $this->requete("SELECT * FROM {$this->table} WHERE email = ? OR tel = ?", [$email, $email])->fetch();
    }

    public function setSession() {
        $_SESSION["user"] = [
            "id" => $this->id,
            "prenom" => $this->firstname,
            "nom" => $this->lastname
        ];
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of sex_id
     */ 
    public function getSex_id()
    {
        return $this->sex_id;
    }

    /**
     * Set the value of sex_id
     *
     * @return  self
     */ 
    public function setSex_id($sex_id)
    {
        $this->sex_id = $sex_id;

        return $this;
    }

    /**
     * Get the value of born_date
     */ 
    public function getBorn_date()
    {
        return $this->born_date;
    }

    /**
     * Set the value of born_date
     *
     * @return  self
     */ 
    public function setBorn_date($born_date)
    {
        $this->born_date = $born_date;

        return $this;
    }

    /**
     * Get the value of tel
     */ 
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */ 
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get the value of create_time
     */ 
    public function getCreate_time()
    {
        return $this->create_time;
    }

    /**
     * Set the value of create_time
     *
     * @return  self
     */ 
    public function setCreate_time($create_time)
    {
        $this->create_time = $create_time;

        return $this;
    }
}
