<?php
require_once 'model/utilisateur_model.php';
require_once 'model/hydrate.php';

class Utilisateur
{
    private $id;
    private $email;
    private $pseudo;
    private $password;
    private $role;

    use Hydrate;
    // CONSTRUCTOR
    public function __construct($datas = [])
    {
        if (!empty($datas)) {
            $this->hydrate($datas);
        }
    }

    // GETTERS
    public function getId()
    {
        return $this->id;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRole()
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
        $this->email = $email;
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
