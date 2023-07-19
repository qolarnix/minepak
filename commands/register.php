<?php declare(strict_types=1);

function registerCommand(string $name, string $desc): object {
    $cmd = new Class {
        public $name;
        public $desc;
        public $exec;
    };

    $cmd->name = $name;
    $cmd->desc = $desc;

    return $cmd;
}

$cmds = [
    $install = registerCommand('install', 'Install a plugin'),
    $search = registerCommand('search', 'Search for a plugin'),
    $version = registerCommand('version', 'Display minepak version'),
];

$cmd_names = array_map(function($object) {
    return $object->name;
}, $cmds);

$install->exec = function() {
    echo 'Test install func'.el;
};

$search->exec = function() {
    echo 'Test search func'.el;
};

$version->exec = function() {
    echo 'minepak cli v0.0.1'.el;
};