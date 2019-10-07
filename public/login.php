<?php
    session_start();
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

        if (isset($_POST["loginbtn"])) { 
            $username = $_POST["user"];
            $pw = $_POST['pw'];


            $stmt = $conn->prepare("SELECT id, username, pwhash FROM users WHERE username = ?");
            $stmt->bind_param("s", $username); // "sss" means the values are 3 strings (another type is "d" or "f")
            // set parameters and execute
            $stmt->execute();
            $res = $stmt->get_result(); //here we know the result for specific user
            $conn->close();

            //now we can branch depending on what we got
            //check if user exists at all
            if ($res->num_rows < 1) {
                //but we do not tell users that they do not exist
                //just generic bad login
                echo "Bad Login";
                die("No more!");
            }

            //here we get a single row since user names are 
            // guaranteed to be unique in the database we set the constraint!
            $row = $res->fetch_assoc();
            // var_dump($row);

            if (password_verify ($pw , $row['pwhash'])) {
                echo "Logged in";
                $_SESSION['id'] = $row['id'];
                $_SESSION['myname'] = $username;
                echo $username."is logged in<br>";
                // if (isset($_POST['savelogin'])) {
                //     echo "Saving Loggin";
                //     //TODO think about safety!
                //     //setcookie("TestCookie", $_SESSION['username'], time()+3600);
                //     //setcookie here
                // }
            } else {
                //we keep the error message identical to the one on bad user
                echo "Bad Login";
                die("No more!");
            }
        }

        if (isset($_POST["logoutbtn"])) { 
            $_SESSION['myname'] = null;
            //we might needto null more session variables later on
        }
    }
    header('Location: /session.php');