<?php declare(strict_types=1);

function registerCommand(string $name, string $desc): object {
    $cmd = new stdClass();
    $cmd->name = $name;
    $cmd->desc = $desc;
    $cmd->exec = 'exec test';

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