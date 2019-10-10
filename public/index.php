<?php
    session_start();
    require __DIR__ . '/../vendor/autoload.php';
    require_once("../src/Classes/View.php");
    require_once("../src/Classes/Model.php");
    require_once("../src/Classes/Controller.php");

    $myview = new View();
    $mymodel = new Model($myview);//here DB connection will be created
    $mycontroller = new Controller($mymodel);

    $log = new Monolog\Logger('name');
    $log->pushHandler(new Monolog\Handler\StreamHandler('../logs/my.log', Monolog\Logger::WARNING));
    
    // add records to the log
    $log->warning('Foo');
    $log->error('Bar');

    $mycontroller->route();
    // $myview->render();