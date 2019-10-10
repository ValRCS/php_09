<?php
    session_start();
    require __DIR__ . '/../vendor/autoload.php';
    // require_once("../src/Classes/View.php");
    // require_once("../src/Classes/Model.php");
    // require_once("../src/Classes/Controller.php");

    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;
    // use RCS\Classes\View;


    //create new logger and indicate where to save logs
    $log = new Logger('name');
    $log->pushHandler(new StreamHandler('../logs/my.log', Logger::WARNING));

    $myview = new RCS\Classes\View();
    $mymodel = new RCS\Classes\Model($myview);//here DB connection will be created
    $mycontroller = new RCS\Classes\Controller($mymodel);

    
    
    // add records to the log
    $log->warning('Foo');
    $log->error('Bar');

    $mycontroller->route();
    // $myview->render();