<?php
    echo "Running PHP";
    echo "<hr>";
    //do not run phpinfo() on production servers
    //phpinfo();

    //two ways of defining constants
    define("GREETING", "Hello ");
    const SECOND = "How are you doing?";

    //variables get their types at the moment of declaration/assignment
    $a = 22;
    $b = 3.14;
    $myname = "Valdis";
    //we can reassign variables with a different type
    $b = "Foo";
    echo GREETING . $myname;
    echo "<hr>";
    echo SECOND . "<hr>";

    echo 'Just some text<hr>';
    //double quotes lets us use variables directly inside
    echo "Some text with string interpolation $a <hr>";

    $name = "Riga";
    $string = <<<MYLONGSTR
I'm a heredoc
I parse variables. (I love $name)
\t \\t adds a tab space. That means I accept escape sequences
MYLONGSTR;

    echo '<pre>' . $string . '</pre>';


    $string2 = <<<'MYSTRING'
I'm a nowdoc string
Did you notice that I can write '' without escaping?
I don't have special meaning for \n, \r and \t
I do not parse variables $name
I can even use " quetoes and " and so on
MYSTRING;

echo '<pre>' . $string2 . '</pre>';

    $longhtml = "<div class='my-class' id='c1'";
    $longhtml .= "<p class='my-txt'>Lorem</p>";
    $longhtml .= "<p class='my-txt'>Lorem</p>";
    $longhtml .= "<p class='my-txt'>Lorem</p>";
    $longhtml .= "<p class='my-txt'>Lorem</p>";
    $longhtml .= "</div>";

echo $longhtml;



