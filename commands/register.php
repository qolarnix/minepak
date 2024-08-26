<?php
/**
 * Register commands
 */

declare(strict_types=1);

$commands = [];

function registerCommand(string $name, string $desc, callable $callback) {
    global $commands;
    $commands[$name] = [
        'name' => $name,
        'callback' => $callback,
        'description' => $desc
    ];
}

registerCommand(
    name: 'help', 
    desc: 'displays this menu', 
    callback: function() {
        echo "this is the help menu";
    }
);