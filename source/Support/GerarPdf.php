<?php

namespace Source\Support;

use Dompdf\Dompdf;
use Dompdf\Options;

class GerarPdf
{
    public function gerarPDF($html, $nomeArquivo = 'document.of', $download = true)
    {
        $options = new Options();
        $options->set("isRemoteEnabled", true);
        $options->set("defaultFont", "Arial");

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper("A4", "portrait");
        $dompdf->render();

        if ($download) {
            $dompdf->stream($nomeArquivo, ["Attachment" => 0]);
        } else {
            $dompdf->stream($nomeArquivo, ["Attachment" => 2]);
        }
    }
}
