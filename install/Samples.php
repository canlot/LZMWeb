<?php
require_once './Database/Database.php';
require_once './config/DatabaseInformation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Samples
 *
 * @author Jakob
 */
class Samples 
{
    private $database = null;
    private $samples = array();
    public function __construct()
    {
        $this->database = new DB\Database(DBInfo\DbHost, DBInfo\DbUser, DBInfo\DbPassword, DBInfo\DbName);
    }
    public function createSamples()
    {
        foreach($this->samples as $sample)
        {
            
        }
    }
}
