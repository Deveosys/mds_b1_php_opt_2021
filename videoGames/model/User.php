<?php

class User
{

    private $_name;
    private $_password;

    public function __construct(string $name)
    {
        $this->setName($name);
    }

    public function setName(string $name)
    {
        $this->_name = $name;
    }

    public function getName(): string
    {
        return $this->_name;
    }

    public function setPassword(string $password)
    {
        $this->_password = $password;
    }

    public function getPassword(): string
    {
        return $this->_password;
    }
}
