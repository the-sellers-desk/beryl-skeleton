<?php

$app = new \Beryl\Foundation\Application(realpath(rtrim(getcwd(), '\/')));

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    Illuminate\Foundation\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

// This can be replaced with your own handler
$app->singleton(
    \Beryl\Http\RequestHandlerInterface::class,
    \Beryl\Http\LaravelRequestHandler::class
);

$app->instance('beryl_config', \Symfony\Component\Yaml\Yaml::parseFile(getcwd() .
    DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'beryl.yaml'));

// Pre server bootstrapping
$app->bootstrapWith([
    \Beryl\Bootstrap\LoadEnvironmentVariables::class,
    \Beryl\Bootstrap\LoadConfiguration::class,
    \Beryl\Bootstrap\HandleExceptions::class,
    \Beryl\Bootstrap\RegisterFacades::class,
    \Beryl\Bootstrap\RegisterProviders::class,
    \Beryl\Bootstrap\BootProviders::class
]);

return $app;