<?php
require 'Module.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GetLinks
 *
 * @author Jakob
 */
class GetLinks extends Module
{
    public function __construct(DB\Database $database)
    {
        parent::__construct($database);
    }
    public function returnData(&$queries)
    { 
        $data = array();
        $datareturn;
        if(!isset($_GET["theme"]))
            $data[] = ["theme" => FALSE];
        else
        {
            $datareturn = $this->database->getDataArray($queries["getLinksWithoutUser"]);
            $data[] = $datareturn;
        }
        return $data;
    }
}
