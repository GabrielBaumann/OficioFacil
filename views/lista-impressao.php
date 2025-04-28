<?php $this->layout('layout_impressao', ['title' => $title, 'numero' => $numeros]) ?>

<div class="container" id="conteudo_pdf">
  <?php foreach (array_chunk($numeros, 154) as $index => $grupo): ?>
  <div class="page">
      <header>
        <img src="<?= themes("/views/assets/brasao.jpg") ?>" alt="Logo Esquerda" />
        <div class="text-header">
          <h1>ESTADO DO PARÁ</h1>
          <h1>PREFEITURA MUNICIPAL DE CANAÃ DOS CARAJÁS</h1>
          <h1>SECRETARIA MUNICIPAL DE DESENVOLVIMENTO SOCIAL</h1>
        </div>
        <img src="<?= themes("/views/assets/logo.png") ?>" alt="Logo Direita" />
      </header>

      <div class="title">
        <h1>CONTROLE DE OFÍCIOS</h1>
      </div>

      <div class="box">
        <?php foreach ($grupo as $numero): ?>
          <div class="cell"><?= formatoNumero($numero->numero_oficio) ?></div>
        <?php endforeach; ?>
      </div>

      <footer>
        <div class="logos">
          <img src="<?= themes("/views/assets/SEMDES.png") ?>" alt="Logo 1" />
          <img src="<?= themes("/views/assets/logo.png") ?>" alt="Logo 2" />
        </div>
        <p>SECRETARIA DE DESENVOLVIMENTO SOCIAL - SEMDES</p>
        <p>Avenida Ipanema S/N, - Novo Horizonte II - CEP 68.356.193 - Canaã dos Carajás/PA</p>
        <p>e-mail institucional: semdes@canaadoscarajas.pa.gov.br</p>
      </footer>
    </div>
  <?php endforeach; ?>
</div>

<script>
document.getElementById('visualizar').addEventListener('click', function () {
  var elemento = document.getElementById('conteudo_pdf');

  var opt = {
    margin:       0,
    image:        { type: 'jpeg', quality: 0.98 },
    html2canvas:  { scale: 2, useCORS: true, scrollY: 0, scrollX: 0 },
    jsPDF:        { unit: 'cm', format: 'a4', orientation: 'portrait' }
  };

  html2pdf()
    .set(opt)
    .from(elemento)
    .toPdf()
    .get('pdf')
    .then(function(pdf) {
        const totalPages = pdf.internal.getNumberOfPages();
        const pageHeight = pdf.internal.pageSize.getHeight();
        
        // Verifica se a última página está vazia
        const lastPage = pdf.internal.getCurrentPageInfo();
        if (totalPages > 1) {
            pdf.deletePage(totalPages); // Remove última página vazia
        }
    })
    .output('bloburl').then(function (url) {
    window.open(url);
  });
});
</script>