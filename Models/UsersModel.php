<?php
namespace App\Models;

class UsersModel extends Model
{
    protected $id_user;
    protected $username; 
    protected $email;
    protected $password;
    protected $tel;
    protected $firstname;
    protected $lastname;
    protected $birthday;
    protected $id_gender;
    protected $is_admin;
    protected $state;
    protected $create_time;

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_user";
        foreach($this as $champ => $valeur) {
            if($champ != 'db' && $champ != 'table' && $champ != 'idName' && $champ != 'champs' && $champ != 'password'){
                $this->champs[] = $champ;
            }
        }
    }

    public function findByEmailOrTel($email) {
        return $this->requete("SELECT * FROM {$this->table} WHERE email = ? OR tel = ?", [$email, $email])->fetch();
    }

    public function setSession() {
        $_SESSION["user"] = [
            "id" => $this->id_user,
            "firstname" => $this->firstname,
            "lastname" => $this->lastname,
            "is_admin" => $this->is_admin
        ];
    }


    /**
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

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
     * Get the value of birthday
     */ 
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set the value of birthday
     *
     * @return  self
     */ 
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get the value of id_gender
     */ 
    public function getId_gender()
    {
        return $this->id_gender;
    }

    /**
     * Set the value of id_gender
     *
     * @return  self
     */ 
    public function setId_gender($id_gender)
    {
        $this->id_gender = $id_gender;

        return $this;
    }

    /**
     * Get the value of is_admin
     */ 
    public function getIs_admin()
    {
        return $this->is_admin;
    }

    /**
     * Set the value of is_admin
     *
     * @return  self
     */ 
    public function setIs_admin($is_admin)
    {
        $this->is_admin = $is_admin;

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

    /**
     * Get the value of state
     */ 
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }
}
