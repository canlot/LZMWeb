<?php
    if (version_compare(PHP_VERSION, '5.4', '<'))
            die('Du brauchst eine höhere Php Version');
    
     require_once 'Controller.php';
    require_once 'View.php';
    $controller = new Controller();
    $view = new View($controller);
    $GLOBALS['BaseDir'] = __DIR__;
    
    $view->show();
   
