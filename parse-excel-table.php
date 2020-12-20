<?php

    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $database = 'pricelist';

    $link = mysqli_connect($host, $user, $pass, $database) or die("Ошибка: ".mysqli_error($link));

    $result = mysqli_query($link, "SELECT * FROM goods");

    if(mysqli_num_rows($result) == 0) {
        require_once 'PHPExcel/IOFactory.php';
        require_once 'PHPExcel.php';

        $xls = PHPExcel_IOFactory::load('assets/pricelist.xls');
        $xls->setActiveSheetIndex(0);

        $sheet = $xls->getActiveSheet();
        $rows = $sheet->getHighestRow();

        for ($i = 2; $i <= $rows; $i++) {
            $productName = $sheet->getCellByColumnAndRow(0, $i)->getValue();
            $productCost = $sheet->getCellByColumnAndRow(1, $i)->getValue();
            if (is_float($sheet->getCellByColumnAndRow(2, $i)->getValue())) {
                $allProductCost = $sheet->getCellByColumnAndRow(2, $i)->getValue();
            } else {
                $allProductCost = hash_equals($sheet->getCellByColumnAndRow(2, $i)->getValue(), "#VALUE!") ? "None" : $sheet->getCellByColumnAndRow(2, $i)->getValue();
            }
            $wareHouse1 = $sheet->getCellByColumnAndRow(3, $i)->getValue();
            $wareHouse2 = $sheet->getCellByColumnAndRow(4, $i)->getValue();
            $factoryCountry = $sheet->getCellByColumnAndRow(5, $i)->getValue();

            $result = mysqli_query($link,"INSERT into goods (наименование, стоимость, стоимость_опт, склад1, склад2, страна_производства) VALUES ('$productName', '$productCost', '$allProductCost', '$wareHouse1', '$wareHouse2', '$factoryCountry')");
        }
    }

    mysqli_close($link);

