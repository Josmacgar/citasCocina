<?php
    require_once("Composer/vendor/autoload.php");

    use Doctrine\DBAL\DriverManager;
    use Doctrine\ORM\EntityManager;
    use Doctrine\ORM\Tools\Setup;

    $isDevMode = true;
    $config = Setup::createAnnotationMetadataConfiguration([__DIR__."/Entity"], 
        $isDevMode, null, null, false);
    
    $connectionBD = DriverManager::getConnection([
        'driver'   => 'pdo_mysql',
        'user'     => 'root',
        'password' => '',
        'dbname'   => 'citasCocina',
        'host'     => '127.0.0.1'
    ], $config);

    $entityManager = new EntityManager($connectionBD, $config);
