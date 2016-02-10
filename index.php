<?php
    if (version_compare(PHP_VERSION, '5.4', '<'))
            die('Du brauchst eine höhere Php Version');
    
    require_once 'App.php';
    init();
    run();

