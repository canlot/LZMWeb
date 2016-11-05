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
 * 
 */
class Database 
{
    private $conn = null;
    private $mysql_message;
    private $mysql_ok;
    public function __construct($host, $user, $password, $database)
    {
        try
        {
            $this->conn = new \mysqli($host, $user, $password, $database);
            $this->mysql_ok = TRUE;
        }
        catch (\mysqli_sql_exception $e)
        {
            $this->mysql_message = $e->getMessage();
            $this->mysql_ok = FALSE;
        }
    }
    public function errorMessage()
    {
        return $this->mysql_message;
    }
    public function validConnection()
    {
        return $this->mysql_ok;
    }
    public function getDataArray($query, $args)
    {
        $result;
        $stmt;
        if(count($args) > 0)
        {
            $stmt = $this->conn->prepare($query);
            //ruft $stmt->bin_param auf mit dynamischen Anzahl an Argumenten
            //call_user_func_array(array($stmt, 'bind_param'), 
            //        $this->makeValuesReferenced(array_merge(array($this->giveParameterFromArgs($args)), $this->giveValuesFromArgs($args)))); 
            call_user_func_array(array($stmt, 'bind_param'), array_merge(array($this->giveParameterFromArgs($args)), $this->giveValuesFromArgs($args))); 
            $stmt->execute();
            $result = $stmt->get_result();
        }
        else
        {
            $result = $this->conn->query($query);
        }
        if($result->num_rows == 0)
            return FALSE;
        $array = array();
        while($row = $result->fetch_assoc())
        {
            $array[] = $row;
        }
        $result->free();
        return $array;
    }
    public function getSingleData($query, $args)
    {
        
    }
    public function setDataParameterized($query, $args)
    {
        $result;
        $stmt;
        if(count($args) > 0)
        {
            $stmt = $this->conn->prepare($query); //ruft $stmt->bin_param auf mit dynamischen Anzahl an Argumenten
            call_user_func_array(array($stmt,'bind_param'), 
                array_merge(array($this->giveParameterFromArgs($args)), $this->giveValuesFromArgs($args))); 
            
            $stmt->execute();
            if($stmt->affected_rows == 0)
                return FALSE;
            else
                return $stmt->insert_id;
        }
        else
            return $this->setData($query);
    }
    public function setData($query)
    {
        $this->conn->query($query);
        if($this->conn->affected_rows == 0)
            return FALSE;
        else
            return $this->conn->insert_id;
    }
    private function makeValuesReferenced($arr)
    {
        $refs = array();
        foreach($arr as $plubsik)
            $refs[] = &$plubsik[1];
        return $refs;
    }
    private function giveValuesFromArgs($args)
    {
        $values = array();
        foreach ($args as $plubsik)
        {
            $values[] = &$plubsik[1];
        }
        return $values;
    }
    private function giveParameterFromArgs($args)
    {
        $params = "";
        foreach ($args as $plubsik)
        {
            switch ($plubsik[0])
            {
                case "int": $params .= 'i'; break;
                case "string": $params .= 's'; break;
                case "double": $params .= 'd'; break;
                case "blob": $params .= 'b'; break;
            }
        }
        return $params;
    }
}
