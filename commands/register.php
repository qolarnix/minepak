<?php
/**
 * Register commands
 */

declare(strict_types=1);

use function Termwind\{render};

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
    callback: function() use($template) {
        global $commands;
        render($template->render('welcome', [
            'title' => 'Minepak',
            'text' => 'The package manager for minecraft plugins',
            'commands' => $commands,
        ]));
    }
);