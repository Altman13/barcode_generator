<?php
require "vendor\autoload.php";
require_once __DIR__ . '/vendor/autoload.php';
$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
//редактировать php.ini max_execution_time=3600
//по умолчанию 30 сек на выполнение скрипта, это ВАЖНО, иначе не будет работать генерация pdf файла
$mpdf = new \Mpdf\Mpdf();
for($i=0; $i<1000; $i++) {
    $barcode = mt_rand(100000000, 999999999);
        $barcode_for_pdf='<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($barcode, $generator::TYPE_CODE_128)) . '">';
            $mpdf->WriteHTML($barcode_for_pdf);
            $mpdf->WriteHTML('<br>');
}
$mpdf->Output();
