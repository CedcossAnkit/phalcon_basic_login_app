<?php

use Phalcon\Mvc\Model;

class Student extends Model
{
    public int $rollNo;
    public string $name;
    public string $class;
    public string $marks;
}
