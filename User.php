<?php

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
        
    }
}