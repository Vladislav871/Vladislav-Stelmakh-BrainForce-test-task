<?php
    include_once 'parse-excel-table.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>Price List</title>
</head>
<body>
<h1>Price List</h1>
<section class = "Container">
    <table>
        <thead class = "HeadOfTable">
        <tr>
            <td>Наименование товара</td>
            <td>Стоимость, руб.</td>
            <td>Стоимость опт, руб.</td>
            <td>Наличие на складе 1, шт.</td>
            <td>Наличие на скалде 2, шт.</td>
            <td>Страна производства</td>
        </tr>
        </thead>
        <?php
            include_once 'print-table-from-db.php';
        ?>
    </table>
</section>
</body>
</html>
