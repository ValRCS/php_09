<?php
require_once("../config/config.php");
$conn = mysqli_connect(SERVERNAME, USERNAME, PW, DB);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

mysqli_set_charset($conn,"utf8");

//we will process POST request here
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    // echo "Working on update";

    // var_dump($_POST);
    // die("So long");

    //we decide whether any delete buttons were pressed
    foreach ($_POST as $key => $value) {
        $stmt = $conn->prepare("UPDATE `tracks` SET `name` = (?) WHERE `tracks`.`id` = (?)");
        // $stmt = $conn->prepare("DELETE FROM `tracks` WHERE `tracks`.`id` = (?)");
        // $_POST["delbtn"] should return the value of the button
        $stmt->bind_param("ss", $value, $key); 
        $stmt->execute();

        
        break;
    }
 
    // echo "Deleted post with id: " . $_POST["delbtn"];
    //redirect ONLY works if no HTML body has been sent
    header('Location: /getmusic.php');
}
