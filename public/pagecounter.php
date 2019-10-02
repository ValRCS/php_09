<?php
    // Opens counter.txt to read the number of hits.
    $file  = fopen( "../data/counter.txt", 'r' );
    //we read a line of text(up to newline and up to 1000 characters)
    $count = fgets( $file, 1000 );
    //it is crucial that we close the file
    fclose( $file );

    echo "<h2>Page Counter Example</h2>";
    //turns out PHP automatically converts string to number for ++
    $count++;
    echo "You are visitor number: ". $count ;

    // Opens counter.txt to change new hit number.
    $file = fopen( "../data/counter.txt", 'w' );
    //if file is open with 'w' it will overwrite the old file!!!
    fwrite( $file, $count );
    //for writes it is especially importan that we close the file!!
    fclose( $file );

    echo "<hr>";