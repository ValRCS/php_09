<?php
    function printTable($myrows) {
        if (count($myrows) == 0) {
            echo "<hr>";
            echo "No results";
            echo "<hr>";
            //we can just return since table is not needed
            return;
        }
        echo "<table>";
        foreach ($myrows as $key => $row) {
            //special case using first row we create our table head with column names
            if ($key == 0) {
                echo "<thead><tr>";
                foreach ($row as $colname => $unusedcolvalue) {
                    echo "<td>" . $colname . "</td>";
                }
                echo "</tr></thead>";
            }
            echo "<tr>";
            // foreach ($row as $unusedcolkey => $colvalue) {
            foreach ($row as  $cellkey => $cellvalue) {
                if ($cellkey == "name") {
                    echo "<td>";
                    echo "<form action='updatemusic.php' method='post'>";
                    echo "<input name='" . $row['id'] . "' value='" . $cellvalue . "'>";
                    echo "</form>";
                    echo "</td>";
                } else {
                    echo "<td>" . $cellvalue . "</td>";
                }
 

            }
            echo "<td>";
            echo "<form action='deletemusic.php' method='post'>";
            echo "<button name='delbtn' value='" . $row['id'] . "' type='submit'>DELETE</button>";
            echo "</form>";
            echo "</td>";

            echo "</tr>";
        }
        echo "</table>";
    }