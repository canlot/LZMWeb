<?php

require 'Module.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GlobalInformation
 *
 * @author Jakob
 */
class GlobalInformation extends Module
{
    public function __construct(DB\Database $database)
    {
        parent::__construct($database);
        
    }
    public function execute()
    {
        
    }
}
