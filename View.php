<?php
require_once 'config/TemplateInformation.php';
require_once 'libs/defines/DatabaseQueries.php';
require_once 'libs/Modules/GetLinks.php';
require_once 'Database/Database.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View
 *
 * @author Jake
 */
class View
{
    private $data = array();
    private $controller = null;
    private $modules = array();
    private $database = null;
    public function __construct(Controller $controller)
    {
        //$this->database = new DB\Database()
        $this->controller = $controller;
        //$this->modules[] = new GetLinks($database)
    }
    public function processRequestAndData()
    {
        
    }
    public function show()
    {
        include_once 'templates/' . TInfo\Template . "/index.php";
    }
}
