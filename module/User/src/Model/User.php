<?php

namespace User\Model;

class User
{
    protected $id;

    protected $email;

    protected $password;

    protected $name;

    protected $status;

    protected $dateCreated;

    protected $resetToken;

    protected $resetTokenDateCreated;

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->id;

    }
    public function getPassword()
    {
        return $this->password;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function getResetToken()
    {
        return $this->resetToken;
    }

    public function getResetTokenDateCreated()
    {
        return $this->resetTokenDateCreated;
    }
}
