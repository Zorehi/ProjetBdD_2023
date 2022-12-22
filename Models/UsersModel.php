<?php
namespace App\Models;

class UsersModel extends Model
{
    protected $id_users;
    protected $username; 
    protected $email;
    protected $password;
    protected $tel;
    protected $firstname;
    protected $lastname;
    protected $birthday;
    protected $id_gender;
    protected $is_admin;
    protected $is_active;
    protected $create_time;
 
    
    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_users";
    }

    public function findByEmailOrTel($email) {
        return $this->requete("SELECT * FROM {$this->table} WHERE email = ? OR tel = ?", [$email, $email])->fetch();
    }

    public function findByEmailOrUsername($email, $username) {
        return $this->requete("SELECT * FROM {$this->table} WHERE email = ? OR username = ?", [$email, $username])->fetch();
    }

    public function setSession() {
        $_SESSION["user"] = [
            "id" => $this->id_users,
            "firstname" => $this->firstname,
            "lastname" => $this->lastname,
            "is_admin" => $this->is_admin
        ];
    }
    
    
    /**
     * Get the value of id_users
     */ 
    public function getId_users()
    {
        return $this->id_users;
    }
    
    /**
     * Set the value of id_users
     *
     * @return  self
     */ 
    public function setId_users($id_users)
    {
        $this->id_users = $id_users;
        
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
    public function getIs_active()
    {
        return $this->is_active;
    }

    /**
     * Set the value of is_active
     *
     * @return  self
     */ 
    public function setIs_active($is_active)
    {
        $this->is_active = $is_active;
        
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
    
    static $info_tables = [
        'id_users' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => 'disabled'
        ],
        'username' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ],
        'email' => [
            'elementHTML' => 'input',
            'inputType' => 'email',
            'is_disabled' => ''
        ],
        'tel' => [
            'elementHTML' => 'input',
            'inputType' => 'tel',
            'is_disabled' => ''
        ],
        'firstname' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ],
        'lastname' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ],
        'birthday' => [
            'elementHTML' => 'input',
            'inputType' => 'date',
            'is_disabled' => ''
        ],
        'id_gender' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'description'
        ],
        'is_admin' => [
            'elementHTML' => 'boolean',
            'inputType' => null,
            'is_disabled' => ''
        ],
        'is_active' => [
            'elementHTML' => 'boolean',
            'inputType' => null,
            'is_disabled' => ''
        ],
        'create_time' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => 'disabled',
            //'pattern' => '^(\d{4,})-(\d{2})-(\d{2})[ ](\d{2}):(\d{2})(?::(\d{2}(?:\.\d+)?))?$'
        ],
    ];
}
