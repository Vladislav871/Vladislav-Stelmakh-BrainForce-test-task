<?php

    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $database = 'pricelist';

    $link = mysqli_connect($host, $user, $pass, $database) or die("Ошибка: ".mysqli_error($link));

    $result = mysqli_query($link, "SELECT * FROM goods");

    $comboRows = mysqli_num_rows($result);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $expensive = 0.00;
    $cheap = (double)$row['стоимость_опт'];

    for ($i = 0; $i <= $comboRows; $i++) {
        $cost = (float)$row['стоимость'];
        $cost1 = (float)$row['стоимость_опт'];
        if ($cost > $expensive) {
            $expensive = $cost;
        }
        if ($cost1 < $cheap && $cost1 != 0.0) {
            $cheap = $cost1;
        }
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }

    mysqli_free_result($result);
    mysqli_close($link);

    $link = mysqli_connect($host, $user, $pass, $database) or die("Ошибка: ".mysqli_error($link));

    $result = mysqli_query($link, "SELECT * FROM goods");

    $comboRows = mysqli_num_rows($result);

    for ($i = 0; $i < $comboRows; $i++) {
        $row = mysqli_fetch_row($result);
        if ((float)$row[1] == $expensive) {
            echo "<tr class='Expensive'>";
            for ($j = 0; $j < 7; $j++) {
                if ($j == 6) {
                    echo "<td>".(($row[3]+$row[4]) < 20 ? "Осталось мало! Срочно докупите!": null)."</td>";
                } else {
                    echo "<td>$row[$j]</td>";
                }
            }
            echo "</tr>";
        } else if ((float)$row[2] == $cheap) {
            echo "<tr class='Cheap'>";
            for ($j = 0; $j < 7; $j++) {
                if ($j == 6) {
                    echo "<td>".(($row[3]+$row[4]) < 20 ? "Осталось мало! Срочно докупите!": null)."</td>";
                } else {
                    echo "<td>$row[$j]</td>";
                }
            }
            echo "</tr>";
        } else {
            echo "<tr>";
            for ($j = 0; $j < 7; $j++) {
                if ($j == 6) {
                    echo "<td>".(($row[3]+$row[4]) < 20 ? "Осталось мало! Срочно докупите!": null)."</td>";
                } else {
                    echo "<td>$row[$j]</td>";
                }
            }
            echo "</tr>";
        }
    }

    mysqli_free_result($result);
    mysqli_close($link);