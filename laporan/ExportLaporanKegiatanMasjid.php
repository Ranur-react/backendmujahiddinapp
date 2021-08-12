<?php

require_once __DIR__ . '/../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$html='

adas
asdasd

';

$mpdf->WriteHTML($html);
$mpdf->Output();
