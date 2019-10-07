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
        // echo "Aha! Your username is " . $_POST['username'] . "<br>";
        // echo "Your Password is" . $_POST['pw'] . "<br>";
        // echo "Your Repeated Password is" . $_POST['pw2'] . "<br>";

        //TODO do more user entry validation/cleaning
        $username = $_POST['username'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        //TODO check if passwords match
        if ($_POST["pw"] == $_POST["pw2"]) {
            $pwhash = password_hash($_POST["pw"], PASSWORD_DEFAULT);
        } else {
            echo "Mismatched Password";
            die("Need to go back to previous page");
            //todo go back to login page
        }
        
        //TODO add new user into database

        //VALUES (NULL, 'valdis', 'sau', 'v@gmail.com', '3423443', current_timestamp())
        //INSERT INTO `users` (`id`, `username`, `lastname`, `email`, `pwhash`, `regdata`) 
        //VALUES (NULL, 'valdis', 'sau', 'v@gmail.com', '3423443', current_timestamp())
        $stmt = $conn->prepare("INSERT INTO users (username, lastname, email, pwhash) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $lastname, $email, $pwhash);
        
        $stmt->execute();
        header("Location: session.php");
    }