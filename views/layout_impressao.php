<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Controle Numérico</title>
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

    .container {
      max-width: 1024px;
      margin: 0 auto;
      padding: 32px 16px;
    }

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

    .cell {
      width: 1.5cm;
      height: 1.5cm;
      min-width: 1.5cm;
      min-height: 1.5cm;
      border: 1px solid #d1d5db;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.125rem; /* text-lg */
      font-weight: bold;
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
  </style>
</head>
<body>
  <header>
    <img src="<?= themes("/views/assets/brasao.jpg") ?>" alt="Logo Esquerda" />
    <div class="text-header">
      <h1>ESTADO DO PARÁ</h1>
      <h1>PREFEITURA MUNICIPAL DE CANAÃ DOS CARAJÁS</h1>
      <h1>SECRETARIA MUNICIPAL DE DESENVOLVIMENTO SOCIAL</h1>
    </div>
    <img src=<?= themes("/views//assets/logo.png") ?> alt="Logo Direita" />
  </header>

  <div class="container">
    <div class="title">
      <h1>CONTROLE DE OFÍCIOS</h1>
    </div>

    <?= $this->section("content"); ?>

  </div>
  
  <footer>
    <div class="logos">
      <img src=<?= themes("/views/assets/SEMDES.png")?> alt="Logo 1" />
      <img src=<?= themes("/views/assets/logo.png")?> alt="Logo 2" />
    </div>
    <p>SECRETARIA DE DESENVOLVIMENTO SOCIAL - SEMDES</p>
    <p>Avenida Ipanema S/N, - Novo Horizonte II - CEP 68.356.193- Canaã dos Carajás/PA</p>
    <p>e-mail institucional: semdes@canaadoscarajas.pa.gov.br</p>
  </footer>
</body>
</html>
