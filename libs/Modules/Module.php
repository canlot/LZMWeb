<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Module
 *
 * @author Jakob
 */
class Module 
{
    protected $database;
    public function __construct(DB\Database $database)
    {
        $this->database = $database;
    }
    public function returnData()
    {
        
    }
}
