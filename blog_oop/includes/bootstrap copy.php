<?php
require_once('config.php');
spl_autoload_register(function($class) {
    ucfirst($class);
    $ext = '.php';
    $file = 'classes/' . $class . $ext;
        echo "Autoloading class $file <br>";
        if (is_readable(__DIR__ . '/classes' . $class .$ext)){
            require_once(__DIR__ . '/classes' . $class .$ext);
        }
})
$session = new Session();
$dbc = new Database();
?>