<?php
require_once 'config/TemplateInformation.php';
require_once 'config/DatabaseInformation.php';

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
    public $data = null;
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function show()
    {
        include_once 'templates/' . TInfo\Template . "/index.php";
    }
}
