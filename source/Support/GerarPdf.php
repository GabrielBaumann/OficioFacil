<?php

namespace Source\Support;

use mPDF;


class GerarPdf
{   
    private $pdf;

    public function __construct(array $config = [])
    {
        $defaultConfig = [
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'P',
            'default_font' => 'Arial'
        ];
    }
}
