<?php

Class DataBase
{
    private $dbhost = 'localhost';
    private  $username = 'root';
    private $password = '';
    private  $dbname = 'mydb';

    function  getConnection ()
    {
        $con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die('Connection noo');
        if (mysqli_connect_errno())
        {
            printf('Connect faild', mysqli_connect_error());
            exit();
        }
        else
        {
            $this->conn = $con;
        }
        return $this->conn;
    }

}