<?php
    session_start();
    //we will process POST request here
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST["loginbtn"])) { 
            $_SESSION['myname'] = $_POST['user'];
            //TODO add authorization and authentification later
        }

        if (isset($_POST["logoutbtn"])) { 
            $_SESSION['myname'] = null;
            //we might needto null more session variables later on
        }
    }
    header('Location: /session.php');