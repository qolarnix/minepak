<?php declare(strict_types=1);

/**
 * minepak install <package-name>
 */
$install->exec = function(string|null $package) {
    if($package == null) {
        echo 'Usage: minepak install <package-name>'.el;
        exit;
    }
        
    echo 'Installing: ' . $package.el;
};