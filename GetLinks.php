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
    //put your code here
}
