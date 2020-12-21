<?php
    include_once 'parse-excel-table.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
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
            <td>Примечание</td>
        </tr>
        </thead>
        <?php
            include_once 'print-table-from-db.php';
        ?>
    </table>
    <section class="footer">
        <div id="avrCost1">
            <p>Средняя стоимость по розничной цене товара</p>
            <p><?php
                include_once 'average-cost1.php';
                ?></p>
        </div>
        <div id="avrCost2">
            <p>Средняя стоимость по оптовой цене товара</p>
            <p><?php
                include_once 'average-cost2.php'
                ?></p>
        </div>
        <div id="commonQuantity">
            <table>
                <caption>Общее количество продуктов на складе</caption>
                <thead class="HeadOfTable">
                <tr>
                    <td>
                        <p>Склад 1</p>
                    </td>
                    <td>
                        <p>Склад 2</p>
                    </td>
                </tr>
                </thead>
                <tr>
                    <td>
                        <?php
                        include_once 'ware-house1.php';
                        ?>
                    </td>
                    <td>
                        <?php
                        include_once 'ware-house2.php';
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </section>
</section>
</body>
</html>
