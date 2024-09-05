<?php
/**
 * Register commands
 */

declare(strict_types=1);

use Yosymfony\Toml\TomlBuilder;

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

/**
 * Register help command
 */
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

/**
 * Register init command
 */
registerCommand(
    name: 'init',
    desc: 'initialize your plugin directory',
    callback: function() {

        $tb = new TomlBuilder();

        $tb_conf = clone $tb;
        $minepak_conf = $tb_conf->addComment(' Minepak Config')
            ->addValue('Environment', 'Server')
            ->addValue('Server Type', 'Paper')
            ->getTomlString();

        $tb_lock = clone $tb;
        $minepak_lock = $tb_lock->addComment(' Minepak Lock')
            ->addValue('Plugins', array(
                array('minepak', '1.0.0'),
                array(new \DateTime())
            ))
            ->getTomlString();

        if(!file_exists('minepak.conf')) {
            file_put_contents('minepak.conf', $minepak_conf);
        }

        if(!file_exists('minepak.lock')) {
            file_put_contents('minepak.lock', $minepak_lock);
        }
    }
);

/**
 * Register clean command
 */
registerCommand(
    name: 'clean',
    desc: 'remove config and lock files',
    callback: function() {
        unlink('minepak.conf');
        unlink('minepak.lock');
    }
);

/**
 * Register update command
 */
registerCommand(
    name: 'update',
    desc: 'update plugins',
    callback: function() use($template) {
        render($template->render('message', [
            'title' => 'Minepak',
            'text' => 'updating plugins...'
        ]));
    }
);

/**
 * Register install command
 */
registerCommand(
    name: 'install',
    desc: 'install a plugin',
    callback: function(array $args) {
        global $commands;
        if(!file_exists('minepak.toml')) {
            call_user_func($commands['init']['callback']);
        }

        $package_name = $args[0];
        render('<p>installing '.$package_name.'...</p>');
    }
);

/**
 * Register remove command
 */
registerCommand(
    name: 'remove',
    desc: 'removes a plugin',
    callback: function(array $args) {
        echo 'removing ' . $args[0] . PHP_EOL;
    }
);

registerCommand(
    name: 'list',
    desc: 'list all packages',
    callback: function() use($filesystem) {
        $packages = listPackages($filesystem);
        print_r($packages);
    }
);

registerCommand(
    name: 'search',
    desc: 'search for a plugin',
    callback: function(array $args) use($filesystem, $template) {
        $results = similarSearch($args[0], listPackages($filesystem));
        
        render($template->render('search', [
            'results' => $results
        ]));
    }
);