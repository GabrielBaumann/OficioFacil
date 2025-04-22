<?php 
function imgBase64($arquivo, $tipo = 'png') {
    $caminho = __DIR__ . "/../../views/assets/" . $arquivo;

if (file_exists($caminho)) {
    return "data:image/{$tipo};base64," . base64_encode(file_get_contents($caminho));
}

return '';

$brasao = imgBase64("brasao.jpg", "jpeg");
}
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?= $this->e($title ?? 'Impressão') ?></title>
    <style>
    @page {
      size: A4;
      margin: 1cm;
    }

    body {
      background-color: white;
      font-family: sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 20px;
      margin-bottom: 32px;
    }

    header img {
      height: 40px;
    }

    header img:first-child {
      margin-left: 20px;
    }

    header img:last-child {
      margin-right: 20px;
    }

    .text-header {
      text-align: center;
    }

    .text-header h1 {
      font-size: 10px;
      font-weight: bold;
      color: #6b7280; /* Tailwind gray-500 */
      margin: 0;
    }

    /* .container {
      max-width: 1024px;
      margin: 0 auto;
      padding: 32px 16px;
    } */

    .title {
      text-align: center;
      margin-bottom: 32px;
    }

    .title h1 {
      font-size: 24px;
      font-weight: bold;
      color: #1f2937; /* Tailwind gray-800 */
      margin: 0;
    }

    .box {
      border: 1px solid #d1d5db; /* Tailwind gray-300 */
      padding: 8px;
    }

    .flex-wrap {
      display: flex;
      flex-wrap: wrap;
    }

    footer {
      position: absolute;
      bottom: 20px;
      left: 0;
      right: 0;
      width: 100%;
      margin-top: 32px;
      text-align: center;
    }

    footer .logos {
      display: flex;
      justify-content: center;
      gap: 16px;
      margin-bottom: 4px;
    }

    footer .logos img {
      height: 40px;
    }

    footer p {
      color: #6b7280;
      font-size: 10px;
      line-height: 1.2;
      margin: 0;
    }

        .container {
            text-align: center;
        }

        .title {
            font-size: 20pt;
            font-weight: bold;
            margin: 20px 0;
        }

        .tabela {
            margin: 0 auto;
            border-collapse: collapse;
        }

        .cell {
            width: 1.5cm;
            height: 1.5cm;
            border: 1px solid #999;
            text-align: center;
            vertical-align: middle;
            font-weight: bold;
            font-size: 12pt;
        }
    </style>
</head>
<body>
<header>
<img src="<?= $brasao ?>" alt="Logo Esquerda" />
<!-- <img src="/views/assets/brasao.jpg" alt="Logo Esquerda" /> -->
<div class="text-header">
    <h1>ESTADO DO PARÁ</h1>
    <h1>PREFEITURA MUNICIPAL DE CANAÃ DOS CARAJÁS</h1>
    <h1>SECRETARIA MUNICIPAL DE DESENVOLVIMENTO SOCIAL</h1>
</div>
<img src="/views/assets/logo.png" alt="Logo Direita" />
</header>

    <?= $this->section('content') ?>

<footer>
<div class="logos">
    <img src="/views/assets/SEMDES.png" alt="Logo 1" />
    <img src="/views/assets/logo.png" alt="Logo 2" />
</div>
<p>SECRETARIA DE DESENVOLVIMENTO SOCIAL - SEMDES</p>
<p>Avenida Ipanema S/N, - Novo Horizonte II - CEP 68.356.193- Canaã dos Carajás/PA</p>
<p>e-mail institucional: semdes@canaadoscarajas.pa.gov.br</p>
</footer>
</body>
</html>