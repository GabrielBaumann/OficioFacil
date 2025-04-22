<?php

namespace Source\Support;

use Mpdf\Mpdf;
use Mpdf\Output\Destination;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;

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

        $settings = array_merge($defaultConfig, $config);

        $this->pdf = new Mpdf($settings);

    }

    public function carregarHtml(string $html): void
    {   
        $this->pdf->WriteHTML($html);
    }

    public function renderizar(string $nomeArquivo = 'oficioFacil.pdf', bool $download = false) : void
    {
        $destino = $download ? Destination::DOWNLOAD : Destination::INLINE;
        $this->pdf->Output($nomeArquivo, $destino);
    }

    public function getInstancia() : Mpdf
    {
        return $this->pdf;    
    }

}
