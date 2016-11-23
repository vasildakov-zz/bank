<?php
use Zend\Expressive\Application;
use Zend\Expressive\Container\ApplicationFactory;
use Zend\Expressive\Helper;

return [
    // Provides application-wide services.
    // We recommend using fully-qualified class names whenever possible as
    // service names.
    'dependencies' => [
        // Use 'invokables' for constructor-less services, or services that do
        // not require arguments to the constructor. Map a service name to the
        // class name.
        'invokables' => [
            // Fully\Qualified\InterfaceName::class => Fully\Qualified\ClassName::class,
            Helper\ServerUrlHelper::class => Helper\ServerUrlHelper::class,
        ],
        // Use 'factories' for services provided by callbacks/factory classes.
        'factories' => [
            Application::class => ApplicationFactory::class,
            Helper\UrlHelper::class => Helper\UrlHelperFactory::class,
            \League\Tactician\CommandBus::class => \Application\Container\CommandBusFactory::class,
            \Monolog\Logger::class => \Application\Container\MonologFactory::class,
            \Application\Handler\PingHandler::class => \Application\Handler\PingHandlerFactory::class,

            //Doctrine\ORM\EntityManager::class => Infrastructure\Persistence\Doctrine\EntityManagerFactory::class,
        ],
    ],
];
