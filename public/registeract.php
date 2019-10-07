<?php
    require_once("../config/config.php");
    $conn = mysqli_connect(SERVERNAME, USERNAME, PW, DB);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // echo "Connected successfully";

    mysqli_set_charset($conn,"utf8");

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //we get the value of input field with name="username"
        echo "Aha! Your username is " . $_POST['username'] . "<br>";
        echo "Your Password is" . $_POST['pw'] . "<br>";
        echo "Your Repeated Password is" . $_POST['pw2'] . "<br>";

    }