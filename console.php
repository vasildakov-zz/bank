<?php // console.php

require __DIR__ . '/vendor/autoload.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Symfony\Component\Console\Application;

/** @var \Interop\Container\ContainerInterface $container */
$container = require __DIR__ . '/config/container.php';

/** @var \Doctrine\ORM\EntityManager $em */
$em = $container->get(EntityManager::class);
$config = $container->get('config');

/** @var \Symfony\Component\Console\Application $cli */
$cli = new Application('Command Line Interface', '1.0');
$cli->setCatchExceptions(true);
$cli->setHelperSet(ConsoleRunner::createHelperSet($em));

// The HelperSet
$helperSet = new \Symfony\Component\Console\Helper\HelperSet(
    [
        'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
        'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
    ]
);

$helpers = [];

// Doctrine ODM Config
if (class_exists(\Doctrine\ODM\MongoDB\Version::class)) {
    $dm = $container->get(DocumentManager::class);
    $helpers['dm'] = new \Doctrine\ODM\MongoDB\Tools\Console\Helper\DocumentManagerHelper($dm);
    $cli->addCommands(
        [
            new \Doctrine\ODM\MongoDB\Tools\Console\Command\QueryCommand(),
            new \Doctrine\ODM\MongoDB\Tools\Console\Command\GenerateDocumentsCommand(),
            new \Doctrine\ODM\MongoDB\Tools\Console\Command\GenerateRepositoriesCommand(),
            new \Doctrine\ODM\MongoDB\Tools\Console\Command\GenerateProxiesCommand(),
            new \Doctrine\ODM\MongoDB\Tools\Console\Command\GenerateHydratorsCommand(),
            new \Doctrine\ODM\MongoDB\Tools\Console\Command\Schema\CreateCommand(),
            new \Doctrine\ODM\MongoDB\Tools\Console\Command\Schema\DropCommand(),
        ]
    );
}

// Doctrine ORM Config
if (class_exists(\Doctrine\ORM\Version::class)) {
    $em = $container->get(\Doctrine\ORM\EntityManager::class);
    $helpers['em'] = new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em);

    $cli->addCommands(
        [
            // DBAL Commands
            new \Doctrine\DBAL\Tools\Console\Command\RunSqlCommand(),
            new \Doctrine\DBAL\Tools\Console\Command\ImportCommand(),

            // ORM Commands
            new \Doctrine\ORM\Tools\Console\Command\ClearCache\MetadataCommand(),
            new \Doctrine\ORM\Tools\Console\Command\ClearCache\ResultCommand(),
            new \Doctrine\ORM\Tools\Console\Command\ClearCache\QueryCommand(),
            new \Doctrine\ORM\Tools\Console\Command\SchemaTool\CreateCommand(),
            new \Doctrine\ORM\Tools\Console\Command\SchemaTool\UpdateCommand(),
            new \Doctrine\ORM\Tools\Console\Command\SchemaTool\DropCommand(),
            new \Doctrine\ORM\Tools\Console\Command\EnsureProductionSettingsCommand(),
            new \Doctrine\ORM\Tools\Console\Command\ConvertDoctrine1SchemaCommand(),
            new \Doctrine\ORM\Tools\Console\Command\GenerateRepositoriesCommand(),
            new \Doctrine\ORM\Tools\Console\Command\GenerateEntitiesCommand(),
            new \Doctrine\ORM\Tools\Console\Command\GenerateProxiesCommand(),
            new \Doctrine\ORM\Tools\Console\Command\ConvertMappingCommand(),
            new \Doctrine\ORM\Tools\Console\Command\RunDqlCommand(),
            new \Doctrine\ORM\Tools\Console\Command\ValidateSchemaCommand(),
            new \Doctrine\ORM\Tools\Console\Command\InfoCommand()
        ]
    );
}

/**
 * @TODO Fix the issue with the deprecated Dialog Helper
 * @see http://symfony.com/doc/current/components/console/helpers/dialoghelper.html
 * @see http://symfony.com/doc/current/components/console/helpers/questionhelper.html
 */
if (class_exists(\Doctrine\DBAL\Migrations\Version::class)) {
    $em = $container->get(\Doctrine\ORM\EntityManager::class);
    $db = $em->getConnection();

    $helpers['em'] = new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em);
    $helpers['db'] = new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($db);
    //$helpers['dialog'] = new \Symfony\Component\Console\Helper\DialogHelper();

    $cli->addCommands(
        [
            // Migrations Commands
            new \Doctrine\DBAL\Migrations\Tools\Console\Command\DiffCommand(),
            new \Doctrine\DBAL\Migrations\Tools\Console\Command\ExecuteCommand(),
            new \Doctrine\DBAL\Migrations\Tools\Console\Command\GenerateCommand(),
            new \Doctrine\DBAL\Migrations\Tools\Console\Command\MigrateCommand(),
            new \Doctrine\DBAL\Migrations\Tools\Console\Command\StatusCommand(),
            new \Doctrine\DBAL\Migrations\Tools\Console\Command\VersionCommand()
        ]
    );
}

// Custom Commands
/* $commands = $container->get('config')['console']['commands'];
foreach ($commands as $command) {
    $cli->add($container->get($command));
} */

$helperSet = isset($helperSet) ? $helperSet : new \Symfony\Component\Console\Helper\HelperSet();
foreach ($helpers as $name => $helper) {
    $helperSet->set($helper, $name);
}

$cli->setHelperSet($helperSet);

$cli->run();