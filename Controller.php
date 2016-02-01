<?php
require_once 'User.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author Jakob
 */
class Controller 
{
    public $user = null;
    public function __construct()
    {
        session_start();
        if(isset($_SESSION['user']))
            $this->user->loadFromSession();
    }
    public function authentificateUser($name, $password)
    {
        
    }
}
