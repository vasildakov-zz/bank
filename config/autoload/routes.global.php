<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\ZendRouter::class,
        ],
        'factories' => [
            //Middleware\HomePageAction::class => Middleware\HomePageFactory::class,
            //Middleware\BooksAction::class => Middleware\BooksActionFactory::class,
            Application\Api\PingAction::class => Application\Api\PingActionFactory::class,
            Application\Api\TransferAction::class => Application\Api\TransferActionFactory::class,
        ],
    ],

    'routes' => [
        [
            'name' => 'home',
            'path' => '/',
            'middleware' => App\Action\HomePageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'api.ping',
            'path' => '/api/ping',
            'middleware' => Application\Api\PingAction::class,
            'allowed_methods' => ['GET'],
        ],
        /*[
            'name' => 'api.transfers',
            'path' => '/api/transfers',
            'middleware' => Api\TransferAction::class,
            'allowed_methods' => ['GET'],
        ],*/
    ],
];
