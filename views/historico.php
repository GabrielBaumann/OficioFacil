<!-- Histórico -->
<div>
    <h2 class="text-xl font-bold text-center text-gray-900 mb-6">Histórico - Total: <?= formatoNumero($totHistorico ?? 0000); ?> intervalos</h2>
    <!-- Container principal do histórico -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <!-- Lista de históricos -->
        <div class="max-h-[400px] overflow-y-auto">

            <!-- History Item 1 -->
            <?php if(!empty($historico)): ?>    
                <?php foreach ($historico as $elemento): ?>
                    <div class="p-4 border-b border-gray-200 hover:bg-gray-50 transition flex justify-between items-center">
                        <div class="flex-1 min-w-0">
                            <div class="flex items-baseline space-x-3">
                                <span class="text-base font-bold text-blue-600"><?= formatoNumero($elemento->inicio); ?> - <?= formatoNumero($elemento->fim); ?></span>
                                <div class="flex items-center text-sm text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="tempo-decorrido" data-dt="<?= $elemento->data_cadastro ?>">
                                        <?= tempoDecorrido($elemento->data_cadastro) ?>
                                    </span>
                                </div>
                            </div>
                            <p class="mt-2 text-base text-gray-600 truncate"><?= $elemento->observacao?></p>
                        </div>
                        <button class="ml-4 p-2 rounded-full bg-blue-50 hover:bg-blue-100 transition text-blue-600 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                            </svg>
                            <span class="ml-1 hidden sm:inline text-sm">Imprimir</span>
                        </button>
                    </div>
                <?php endforeach; ?>   
            <?php else: ?>
            <!-- Área de histórico vazio -->
            <div class="p-8 text-center">
                <div class="pt-8 pb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h3 class="text-lg font-medium text-gray-700 mb-2">Nenhum intervalo gerado ainda</h3>
                    <p class="text-sm text-gray-500 max-w-md mx-auto">Quando você gerar intervalos de ofícios, eles aparecerão aqui.</p>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>