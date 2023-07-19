<?php declare(strict_types=1);

$search->exec = function(string|null $package) {
    if($package == null) {
        echo 'Usage: minepak search <package-name>'.el;
        exit;
    }
    
    echo 'Searching for: ' . $package.el;
};