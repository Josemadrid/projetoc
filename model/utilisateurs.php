<?php

class User
{
    private $id;
    private $email;
    private $pseudo;
    private $password;
    private $role;

// CONSTRUCTOR
    public function __construct($value = [])
    {
        if (!empty($value)) {
            $this->hydrate($value);
        }

    }

    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

// GETTERS
    public function id()
    {
        return $this->id;
    }
    public function email()
    {
        return $this->email;
    }

    public function pseudo()
    {
        return $this->pseudo;
    }

    public function password()
    {
        return $this->password;
    }

    public function role()
    {
        return $this->role;
    }

// SETTERS
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setEmail($email)
    {
        $this->rank = $email;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }
}
