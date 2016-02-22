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
    public function __construct($host, $user, $password, $database)
    {
        $this->conn = new \mysqli($host, $user, $password, $database);
    }
    public function validConnection()
    {
        if($this->conn->errno)
            return "Keine Verbindung " . $this->conn->error;
        return TRUE;
    }

    public function getDataArray($query, $args)
    {
        $result;
        $stmt;
        if(count($args) > 0)
        {
            $stmt = $this->conn->prepare($query);
            //ruft $stmt->bin_param auf mit dynamischen Anzahl an Argumenten
            //var_dump($this->conn);
            call_user_func_array(array($stmt, 'bind_param'), 
                    $this->makeValuesReferenced(array_merge(array($this->giveParameterFromArgs($args)), $this->giveValuesFromArgs($args)))); 
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
    public function setData($query, $args)
    {
        $result;
        $stmt;
        if(count($args) > 0)
        {
            $stmt = $this->conn->prepare($query);
            //ruft $stmt->bin_param auf mit dynamischen Anzahl an Argumenten
            call_user_func_array(array($stmt,'bind_param'), 
                array_merge(array($this->giveParameterFromArgs($args)), $this->giveValuesFromArgs($args))); 
            $stmt->execute();
            if($stmt->affected_rows == 0)
            {
                return FALSE;
            }
            else
            {
                return $stmt->insert_id;
            }
        }
        else
        {
            $this->conn->query($query);
            if($this->conn->affected_rows == 0)
            {
                return FALSE;
            }
            else
            {
                return $this->conn->insert_id;
            }
        }
    }
    private function makeValuesReferenced($arr)
    {
        $refs = array();
        foreach($arr as $key => $value)
            $refs[$key] = &$arr[$key];
        return $refs;
    }
    private function giveValuesFromArgs($args)
    {
        $values = array();
        foreach ($args as $key => $value)
        {
            $values[] = &$value;
        }
        return $values;
    }
    private function giveParameterFromArgs($args)
    {
        $params = "";
        foreach ($args as $key => $value)
        {
            switch ($key)
            {
                case "int":
                    $params .= 'i';
                    break;
                case "string":
                    $params .= 's';
                    break;
                case "double":
                    $params .= 'd';
                    break;
                case "blob":
                    $params .= 'b';
                    break;
            }
        }
        return $params;
    }
}
