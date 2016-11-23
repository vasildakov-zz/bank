<?php
return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => \Doctrine\DBAL\Driver\PDOMySql\Driver::class,
                'params' => [
                    'driver'   => 'pdo_mysql',
                    'host'     => 'localhost',
                    'port'     => '3306',
                    'dbname'   => 'bank',
                    'user'     => 'root',
                    'password' => '1',
                    'charset'  => 'UTF8',
                ],
            ],
        ],
        'driver' => [
            'annotations' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\DoctrineAnnotations',
                'cache' => 'array',
                'paths' => [
                    'Domain/Entity'
                ],
            ],
        ],
        // Configuration details for the ORM.
        // See http://docs.doctrine-project.org/en/latest/reference/configuration.html
        'configuration'  => [
            'auto_generate_proxy_classes' => true,
            // directory where proxies will be stored. By default, this is in
            // the `data` directory of your application
            'proxy_dir'                   => 'data/doctrine/proxies',
            // namespace for generated proxy classes
            'proxy_namespace'             => 'DoctrineORM\Proxy',
            // underscore naming strategy
            'underscore_naming_strategy'  => true,
        ],
        /* 'authentication' => [
            'objectManager' => \Doctrine\ORM\EntityManager::class,
            'identityClass' => \Capacity\V1\Entity\User::class,
            'objectRepository' => \Capacity\V1\Repository\Doctrine\UserRepository::class,
            'identityProperty' => 'email',
            'credentialProperty' => 'password',
            'credentialCallable' => \Capacity\V1\Cryptography\VerifyPassword::class,
        ],
        'cache'      => [
            'redis' => [
                'host' => '127.0.0.1',
                'port' => '6379',
            ],
        ],
        'migrations' => [
            'migrations_table' => 'migrations',
            'migrations_namespace' => 'App',
            'migrations_directory' => 'src/App/Migrations',
        ],
        'fixtures' => [
            'paths' => [
                'src/App/Fixtures'
            ]
        ],*/
    ],
];