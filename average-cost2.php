<?php
    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $database = 'pricelist';

    $link = mysqli_connect($host, $user, $pass, $database) or die("Ошибка: ".mysqli_error($link));

    $result = mysqli_query($link, "SELECT * FROM goods");

    $avrCost2 = 0;
    $comboRows = 0;

    for ($i = 0; $i <= mysqli_num_rows($result); $i++) {
        $row = mysqli_fetch_row($result);
        if($row == null || hash_equals($row[2], "None")) {
            continue;
        }
        $avrCost2 += round((double)$row[2], 2);
        $comboRows++;
    }

    echo round($avrCost2/$comboRows);

    mysqli_close($link);
