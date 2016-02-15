<?php namespace DB;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author Jakob
 */
class Database 
{
    private $connection = NULL;
    public function __construct()
    {
        $this->connection = new mysqli(DBInfo\DbHost, DBInfo\DbUser, 
                DBInfo\DbPassword, DBInfo\DbName);
    }
    
    public function readDataArray($query)
    {
        
    }
    public function readSingleData($query)
    {
        
    }
    public function writeData($query)
    {
        
    }
}
