<?php

    define('WEBROOT',dirname(__FILE__));
    define('ROOT',dirname(WEBROOT));
    define('DS',DIRECTORY_SEPARATOR);
    define('CORE',ROOT.DS.'core');
    define('RACINE_URL',dirname(dirname($_SERVER['SCRIPT_NAME'])));

    require (CORE.DS.'Include.php');

    new Dispatcher();
?>
