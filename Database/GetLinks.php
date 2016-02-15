<?php
require_once 'config/DatabaseInformation.php';
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
    public function __construct()
    {
        $this->mysqli = new mysqli(\DBInfo\DbHost, \DBInfo\DbUser, \DBInfo\DbPassword, \DBInfo\DbName); 
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
            $query += " and Links.user = " + $user->getUserId() + "";
        else
            $query += " and Links.user = ";
        
        $result = $this->mysqli->query($query);
        
        $return = array();
        if($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                array_push($return, $row["link"]);
            }
        }
        else
        {
            return FALSE;
        }
        return $return;
        
    }
    
    public function __destruct()
    {
        $this->mysqli->close();
    }
}
