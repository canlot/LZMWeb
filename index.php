<?php
    if (version_compare(PHP_VERSION, '5.4', '<'))
            die('Du brauchst eine höhere Php Version');
    
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    if(!file_exists("install"))
        require 'install/index.php';
    else
    {
        require_once 'Controller.php';
        require_once 'View.php';
        $controller = new Controller();
        $GLOBALS['BaseDir'] = __DIR__;
        $controller->RUN();
    }
