<?php

namespace App\DTO;

class registerDTO
{
    public $name;
    public $email;
    public $password;
    public $login;
    public $number, $date;

    public function __construct($name, $email, $password, $login, $number, $date)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->login = $login;
        $this->number = $number;
        $this->date = $date;
    }
}