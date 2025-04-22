<?php $this->layout('layout_impressao', ['title' => $title, 'numero' => $numeros]) ?>

<div class="box">
  <div class="flex-wrap">
  <?php foreach($numeros as $numero): ?>    
      <div class="cell"><?= $numero->numero_oficio ?></div>
  <?php endforeach; ?>
  </div>
</div>