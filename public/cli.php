#!/usr/bin/env php
<?php
/**
 * Symfony Console Application
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @link http://silex.sensiolabs.org/doc/master/services.html
 * @link http://loige.co/write-a-console-application-using-symfony-and-pimple/
 */
use Symfony\Component\Console\Application;
use Application\Service;
use Presentation\Cli\PingCommand;

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

$container = require 'config/container.php';
$container->setService(Application::class, new Application('Bank Cli Application', '1.0'));

#var_dump($container->get(PingCommand::class));
#exit();

/*
$container = new \Pimple\Container();

$container[Service\BookService::class] = function($container) {
    return new Service\BookService();
};

$container[Command\ShowBooksCommand::class] = function($container) {
    return new Command\ShowBooksCommand($container[Service\BookService::class]);
};

$container['commands'] = function($container) {
    return [
        $container[Command\ShowBooksCommand::class]
    ];
};

$container[Application::class] = function($container) {
    $application = new Application("Bank CLI Application", '1.0');
    $application->addCommands([
        $container[Command\ShowBooksCommand::class]
    ]);
    return $application;
};

$application = $container[Application::class];
$application->run();
*/


//$application = new Application("Bank CLI Application", '1.0');
//$application->run();

$application = $container->get(Application::class);

$application->addCommands([
    $container->get(Presentation\Cli\PingCommand::class),
]);

$application->run();