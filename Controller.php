<?php
require_once 'User.php';
require_once 'config/DatabaseInformation.php';
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
        {
            $user = new User();
            $this->user->loadFromSession();
        }
    }
    public function authentificateUser($name, $password)
    {
        $user = new User();
        if(!$user->loadFromDatabase($name, $password))
        {
            $user = NULL;
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    public function getLinks($theme)
    {
        require_once 'libs/GetLinks.php';
        $links = new GetLinks();
        if($this->user == NULL)
            $array = $links->getLinks ($theme);
        else
            $array = $links->getLinks ($theme, $user);
        
        return $array;
    }
}
