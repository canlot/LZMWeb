<?php
require_once 'config/TemplateInformation.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View
 *
 * @author Jake
 */
class View
{
    public function show()
    {
        require 'templates/' . \TInfo\Template . '/index.php';
    }
}
