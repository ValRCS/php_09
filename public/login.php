<?php
    session_start();
    //we will process POST request here
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST["submitbtn"])) { 
            $_SESSION['myname'] = $_POST['user'];
            //TODO add authorization and authentification later
        }
    }
    header('Location: /session.php');