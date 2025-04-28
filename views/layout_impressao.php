<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'Impressão' ?></title>
  <style>
  @page {
    size: A4;
    margin: 1cm;
  }

  body {
    font-family: sans-serif;
    margin: 0;
    padding: 0;
  }

  .page {
    width: 210mm;
    height: 297mm;
    padding: 1cm;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    box-sizing: border-box;
    background: white;
    /* NENHUM page-break-aqui! */
  }

  header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
  }

  header img {
    height: 40px;
  }

  .text-header {
    text-align: center;
    flex: 1;
  }

  .text-header h1 {
    font-size: 10px;
    font-weight: bold;
    color: #6b7280;
    margin: 2px 0;
  }

  .title {
    text-align: center;
    margin: 16px 0;
  }

  .title h1 {
    font-size: 18px;
    font-weight: bold;
    color: #1f2937;
    margin: 0;
  }

  .box {
    display: grid;
    grid-template-columns: repeat(14, 1fr); /* 14 colunas */
    grid-auto-rows: 1.5cm; /* Cada linha fixa */
    gap: 4px;
    flex-grow: 1;
    margin-top: 16px;
  }

  .cell {
    border: 1px solid #d1d5db;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    font-weight: bold;
  }

  footer {
    text-align: center;
    margin-top: 10px;
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
</style>
</head>
<body>

<div style="text-align: center; margin-top: 30px;">
  <button id="visualizar">Visualizar PDF</button>
</div>

  <?= $this->section("content") ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

  <?= $this->section('scripts') ?>

</body>
</html>