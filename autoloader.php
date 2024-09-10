<?php
spl_autoload_register('myAutoLoader');
// get the name of the class and add

function myAutoLoader($className)
{
    $path = 'classes/';
    $extension = ".class.php";
    $fullPath = $path . $className . $extension;

    if (!file_exists($fullPath)) {
        return false;
    }

    include_once $fullPath;
}
