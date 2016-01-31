<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GetLinks
 *
 * @author Jake
 */
class GetLinks 
{
    private $mysqli = null;
    public function __construct($host, $user, $password, $db)
    {
        $this->mysqli = new mysqli($host, $user, $password, $db); 
    }
    public function checkConnection()
    {
        if($this->mysqli->connect_errno)
            return FALSE;
        return TRUE;
    }
    public function getLinks($theme, $user = FALSE)
    {
        $query = "select Links.link from Links " +
                "inner join Relation " +
                "on Links.id = Relation.link " +
                "inner join Theme " +
                "on Theme.id = Relation.theme " +
                "where Theme.theme = '" + $theme + "'";
        if($user != FALSE)
            $query += " and Links.user = " + $user->id + "";
        
        $result = $this->mysqli->query($query);
        
        $return = array();
        if($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($return, $row["link"]);
            }
        }
        return $return;
        
    }
    
    public function __destruct()
    {
        $this->mysqli->close();
    }
}
