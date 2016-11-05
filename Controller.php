<?php
require_once 'User.php';
require_once 'config/DatabaseInformation.php';
require_once 'libs/defines/Defines.php';
require_once 'libs/defines/DatabaseQueries.php';
require_once 'Database/Database.php';

/** MODULES INCLUDES **/
require_once 'libs/Modules/GetLinks.php';
require_once 'libs/Modules/GetTheme.php';
require_once 'libs/Modules/SetLinks.php';
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
    private $data = array();
    private $modules = array();
    private $database = null;
    private $view = null;
    public function __construct()
    {
        session_start();
        if(isset($_SESSION['user']))
        {
            $this->user = new User();
            $this->user->loadFromSession();
        }
        $this->database = new DB\Database(DBInfo\DbHost, DBInfo\DbUser, DBInfo\DbPassword, DBInfo\DbName);
        if(!$this->database->validConnection())
            die("Konnte nicht verbunden werden");
        
        //Modules will be added here
        $this->modules[] = new GetLinks($this->database);
        $this->modules[] = new GetTheme($this->database);
        $this->modules[] = new SetLinks($this->database);
    }
    public function RUN()
    {
        $this->processRequestAndData();
        $this->view = new View($this->data);
        $this->view->show();
    }
    public function processRequestAndData()
    {
        require 'libs/defines/DatabaseQueries.php';
        foreach($this->modules as $module)
        {
            $this->data[$module->returnName()] = $module->execute($queries);
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
}
