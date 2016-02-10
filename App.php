<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    require_once 'Controller.php';
    require_once 'View.php';
    $controller = NULL;
    $view = NULL;
    $GLOBALS['BaseDir'] = __DIR__;
    
    function init()
    {
        global $controller;
        global $view;
        $controller = new Controller();
        $view = new View($controller);
    }
    function run()
    {
        global $view;
        $view->show();
    }