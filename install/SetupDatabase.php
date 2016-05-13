<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SetupDatabase
 *
 * @author Jake
 */
class SetupDatabase 
{
    //put your code here
    private $mysqli = null;
    public function __construct($host, $user, $password, $db) 
    {
        //$this->mysqli = new mysqli($host, $user, $password, $db);
        try 
        {
            $this->mysqli = new mysqli($host, $user, $password);
        } 
        catch (mysqli_sql_exception $ex) 
        {
            
        }
        
    }
    private function connect()
    {
        if($this->mysqli->connect_errno)
            return "Datenbank konnte nicht verbunden werden";
        return TRUE;
    }
    public function setUp()
    {
        /////---Verbindung prüfen---/////
        $returnValues = $this->connect();
        if($returnValues != TRUE)
        {
            $this->mysqli->close();
            return $returnValues;
        }
        
        /////---Tabellen reinschreiben---/////
        $returnValues = $this->createTables();
        if($returnValues != TRUE)
        {
            $this->mysqli->close();
            return $returnValues;
        }
        return TRUE;
    }
    private function createTables()
    {
        $returnValues = $this->createTableLinks();
        if($returnValues != TRUE)
            return $returnValues;
        
        $returnValues = $this->createTableTheme();
        if($returnValues != TRUE)
            return $returnValues;
        
        $returnValues = $this->createTableRelation();
        if($returnValues != TRUE)
            return $returnValues;
        
        $returnValues = $this->createTableUser();
        if($returnValues != TRUE)
            return $returnValues;
        
        return TRUE;
    }
    private function createTableLinks()
    {
        $query = "create table Links(" + 
                "id int auto_increment primary key, " +
                "link text not null, " +
                "user int "+
                ");";
        if($this->mysqli->query($query) === TRUE)
            return TRUE;
        return "Tabelle Links konnte nicht erstellt werden";
    }
    private function createTableTheme()
    {
        $query = "create table Theme(" +
                "id int auto_increment primary key, " +
                "theme text not null" +
                ");";
        if($this->mysqli->query($query) === TRUE)
            return TRUE;
        return "Tabelle Theme konnte nicht erstellt werden";
    }
    private function createTableRelation()
    {
        $query = "create table Relation(" +
                "id int auto_increment primary key, " +
                "link int not null, " +
                "theme int not null" +
                ");";
        if($this->mysqli->query($query) === TRUE)
            return TRUE;
        return "Tabelle Relation konnte nicht erstellt werden";
    }
    private function createTableUser()
    {
        $query = "create table User(" +
                "id int auto_increment primary key, " +
                "name varchar(50) not null, " +
                "password varchar(50) not null " +
                ");";
        if($this->mysqli->query($query) === TRUE)
            return TRUE;
        return "Tabelle User konnte nicht erstellt werden";
    }
    
}
