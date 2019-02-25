<?php

function dvelopWebExtensionsAutoload($className)
{
    echo $className;
    $file = __DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.str_replace('\\',DIRECTORY_SEPARATOR,$className).'.php';
    echo $file;
    if(file_exists($file))
    {
      require_once($file);
    }
}

spl_autoload_register("dvelopWebExtensionsAutoload");