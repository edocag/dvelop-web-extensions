<?php

function dvelopWebExtensionsAutoload($className)
{
    $file = __DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.str_replace('\\',DIRECTORY_SEPARATOR,$className).'.php';
    if(file_exists($file))
    {
      require_once($file);
    }
}

spl_autoload_register("dvelopWebExtensionsAutoload");
