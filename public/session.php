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
    echo "<label for='user-inp'>USERNAME</label>";
    echo "<input name='user' id='user-inp'>";
    echo "<label for='pw-inp'>PASSWORD</label>";
    echo "<input name='pw' type='password' id='pw-inp'>";
    echo "<button name='loginbtn' type='submit'>LOGIN</button>";
    echo "<button name='logoutbtn' type='submit'>LOGOUT</button>";
    echo "<input type='checkbox' name='remember' id='remember-chk'>";
    echo "<label for='remember-chk'>Remember me (uses Cookie insert GDPR warning here)</label>";

    echo "</form>";