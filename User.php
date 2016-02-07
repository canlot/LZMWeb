<?php
require_once 'config/DatabaseInformation.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User
{
    private $id;
    private $name;
    public function __construct()
    {
        
    }
    public function loadFromSession()
    {
        if(isset($_SESSION['user']))
            $this->name = $_SESSION['user'];
        if(isset($_SESSION['userid']))
            $this->id = $_SESSION['userid'];
    }
    public function loadFromDatabase($name, $password)
    {
        $connection = new mysqli(\DBInfo\DbHost, \DBInfo\DbUser, 
                \DBInfo\DbPassword, \DBInfo\DbName);
        if($connection->connect_errno)
            return "Verbindung konnte nicht hergestellt werden";
        $query = "select id, name from User where name = '?' and password = '?'";
        $smtp = $connection->prepare($query);
        $smtp->bind_param("ss", $name, $password);
        $smtp->execute();
        $result = $smtp->get_result();
        
        if($result->num_rows == 0)
        {
            $result->close();
            $smtp->close();
            $connection->close();
            return FALSE;
        }
        while($row = $result->fetch_assoc())
        {
            $this->id = $row["id"];
            $this->name = $row["name"];
        }
        $this->saveInSession();
        $result->close();
        $smtp->close();
        $connection->close();
        return TRUE;
    }
    private function saveInSession()
    {
        $_SESSION["userid"] = $this->id;
        $_SESSION["user"] = $this->name;
    }
    public function getUserId()
    {
        return $this->id;
    }
    public function getUserName()
    {
        return $this->name;
    }
}
