<?php

require_once __DIR__ . '/vendor/autoload.php';

// Define the type of mode we are running in
define('EXEC_MODE', 'web');

/** @var \Illuminate\Foundation\Application $app */
$app = require_once __DIR__ . '/bootstrap.php';

// Start server
$kernel = $app->make(\Beryl\Foundation\HttpKernel::class,
    [$app]);

(new Beryl\Foundation\Server($app, $kernel))->start();