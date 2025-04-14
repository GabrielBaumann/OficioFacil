<?php $this->layout('layout_impressao', ['title' => $title , 'numeros' => $numeros]) ?>

<div class="container">
    <h1 class="title">CONTROLE DE OFÍCIOS</h1>

    <table class="tabela">
        <?php
        $colunasPorLinha = 10;
        $total = count($numeros);
        for ($i = 0; $i < $total; $i += $colunasPorLinha): ?>
            <tr>
                <?php for ($j = 0; $j < $colunasPorLinha; $j++): ?>
                    <?php if (($i + $j) < $total): ?>
                        <td class="cell"><?= formatoNumero($numeros[$i + $j]->numero_oficio) ?></td>
                    <?php else: ?>
                        <td class="cell"></td> <!-- célula vazia para completar a linha -->
                    <?php endif; ?>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</div>