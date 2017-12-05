<?php


function __autoload($classOrInterface)
{
    $interface_path = 'interfaces/'.$classOrInterface.'.php';
    $classShip_path = 'classes/ships/'.$classOrInterface.'.php';
    $classProjectile_path = 'classes/projectiles/'.$classOrInterface.'.php';

    if (file_exists($interface_path)) {
        include_once $interface_path;
    }

    else if(file_exists($classShip_path)) {
        include_once $classShip_path;
    }

    else if(file_exists($classProjectile_path)) {
        include_once $classProjectile_path;
    }
}