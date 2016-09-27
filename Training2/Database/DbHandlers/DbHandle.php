<?php
//2.
abstract class DbHadle implements IDbHandle
{
    protected $connectionString;

    protected $user;
    protected $db;
    protected $password;
    protected $host;

    protected function __construct($user, $db, $password, $host)
    {
        $this->user= $user;
        $this->db= $db;
        $this->password=$password;
        $this->host=$host;
    }





}