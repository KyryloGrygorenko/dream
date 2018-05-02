<?php

namespace Model\Entity;

class User
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $isAdmin= false;
    private $role;

    
    /**
     * @return mixed
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }


    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $email
     * @return $this
     */

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        
        return $this;
    }


    public function getPassword()
    {
        return $this->password;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }


    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }
}