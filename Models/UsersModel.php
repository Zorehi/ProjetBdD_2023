<?php
namespace App\Models;

class UsersModel extends Model
{
    protected $id;
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $password;
    protected $sex;
    protected $dateofbirth;
    protected $tel;
    protected $createat;

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
            "nom" => $this->lastname,
            "email" => $this->email
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
     * Get the value of sex
     */ 
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set the value of sex
     *
     * @return  self
     */ 
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get the value of dateofbirth
     */ 
    public function getDateofbirth()
    {
        return $this->dateofbirth;
    }

    /**
     * Set the value of dateofbirth
     *
     * @return  self
     */ 
    public function setDateofbirth($dateofbirth)
    {
        $this->dateofbirth = $dateofbirth;

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
     * Get the value of createat
     */ 
    public function getCreateat()
    {
        return $this->createat;
    }

    /**
     * Set the value of createat
     *
     * @return  self
     */ 
    public function setCreateat($createat)
    {
        $this->createat = $createat;

        return $this;
    }
}
