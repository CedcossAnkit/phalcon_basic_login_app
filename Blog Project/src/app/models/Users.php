<?php

use Phalcon\Mvc\Model;

class Users extends Model
{
    public string $name;
    public string $email;
    public string $password;
}
