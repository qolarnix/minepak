<?php

declare(strict_types=1);

define('PROJECT_ROOT', realpath(__DIR__ . '/../'));

use Glacial\Template\TemplateEngine;

$config = [
    PROJECT_ROOT . '/components'
];

$template = new TemplateEngine($config);