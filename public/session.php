<?php
    //before any code we start sesssion with session_start
    session_start();
    if (isset($_SESSION['myname'])) {
        echo "Hello " . $_SESSION['myname'];
    } else {
        echo "I do not know you! please login";
    }
    echo "<hr>";
    echo "<form action='login.php' method='post'>";
    echo "<label for='user'>USERNAME</label>";
    echo "<input name='user'>";
    echo "<label for='pw'>PASSWORD</label>";
    echo "<input name='pw' type='password'>";
    echo "<button name='loginbtn' type='submit'>LOGIN</button>";
    echo "<button name='logoutbtn' type='submit'>LOGOUT</button>";

    echo "</form>";