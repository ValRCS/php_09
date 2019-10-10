<?php
    session_start();
    require __DIR__ . '/../vendor/autoload.php';
    require_once("../src/Classes/View.php");
    require_once("../src/Classes/Model.php");
    require_once("../src/Classes/Controller.php");

    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    //create new logger and indicate where to save logs
    $log = new Logger('name');
    $log->pushHandler(new StreamHandler('../logs/my.log', Logger::WARNING));

    $myview = new View();
    $mymodel = new Model($myview);//here DB connection will be created
    $mycontroller = new Controller($mymodel);

    
    
    // add records to the log
    $log->warning('Foo');
    $log->error('Bar');

    $mycontroller->route();
    // $myview->render();