<?php
    // Opens counter.txt to read the number of hits.
    $file  = fopen( "../data/counter.txt", 'r' );
    $count = fgets( $file, 1000 );
    //it is crucial that we close the file
    fclose( $file );

    echo "<h2>Page Counter Example</h2>";
    // $count++;
    echo "You are visitor number: ". $count ;
    echo "<hr>";