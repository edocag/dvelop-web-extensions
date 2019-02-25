<?php

function dvelopWebExtensionsAutoload($className)
{
    $file = 'src/'.str_replace('\\','/',$className).'.php';
    
    echo $file;
    if(file_exists($file))
    {
      require_once($file);
    }
}

spl_autoload_register("dvelopWebExtensionsAutoload");