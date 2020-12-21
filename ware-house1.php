<?php
    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $database = 'pricelist';

    $link = mysqli_connect($host, $user, $pass, $database) or die("Ошибка: ".mysqli_error($link));

    $result = mysqli_query($link, "SELECT * FROM goods");

    $wareHouseCombo = 0;

    for ($i = 0; $i <= mysqli_num_rows($result); $i++) {
        $row = mysqli_fetch_row($result);
        $wareHouseCombo += round($row[3]);
    }

    echo $wareHouseCombo;

    mysqli_close($link);
