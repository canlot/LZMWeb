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
        $this->conn = new mysqli($host, $user, $password, $database);
    }
    public function getDataArray($query, $args)
    {
        $param_array = array_merge($this->giveParameterFromArgs($args),
                                    $this->giveValuesFromArgs($args));
        $stmt = $this->conn->prepare($query);
        //ruft $stmt->bin_param auf mit dynamischen Anzahl an Argumenten
        call_user_func_array(array($stmt,'bind_param'), $param_array); 
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 0)
            return FALSE;
        $array = array();
        while($row = $result->fetch_assoc())
        {
            $array[] = $row;
        }
        $result->free();
        $stmt->close();
        return $array;
    }
    public function getSingleData($query, $args)
    {
        
    }
    public function setData($query, $args)
    {
        
    }
    private function giveValuesFromArgs($args)
    {
        $values = array();
        foreach ($args as $key => $value)
        {
            $values[] = $value;
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
