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
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background: white;
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
    <?= $this->section('content') ?>
</body>
</html>