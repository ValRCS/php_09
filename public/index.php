<?php
    session_start();
    require_once("../src/Classes/View.php");
    require_once("../src/Classes/Model.php");
    require_once("../src/Classes/Controller.php");

    $myview = new View();
    $mymodel = new Model($myview);//here DB connection will be created
    $mycontroller = new Controller($mymodel);

    $mycontroller->route();
    // $myview->render();