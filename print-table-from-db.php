<?php

    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $database = 'pricelist';

    $link = mysqli_connect($host, $user, $pass, $database) or die("Ошибка: ".mysqli_error($link));

    $result = mysqli_query($link, "SELECT * FROM goods");

    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $row = mysqli_fetch_row($result);
        if(hash_equals($row[1], "Стоимость")) {
            echo "<tr class='HeadOfTable'>";
            for($j = 0; $j < 6; $j++) {
                echo "<td>$row[$j]</td>";
            }
            echo "</tr>";
        } else {
            echo "<tr>";
            for($j = 0; $j < 6; $j++) {
                echo "<td>$row[$j]</td>";
            }
            echo "</tr>";
        }
    }

    mysqli_free_result($result);
    mysqli_close($link);