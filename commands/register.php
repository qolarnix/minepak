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

/**
 * minepak install
 */
require_once __DIR__ . '/mp_install.php';

/**
 * minepak search
 */
require_once __DIR__ . '/mp_search.php';

/**
 * minepak version
 */
require_once __DIR__ . '/mp_version.php';