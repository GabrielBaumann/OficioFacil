<div class="bg-white rounded-xl border border-gray-400 overflow-hidden sticky top-6">
    <div class="p-5">
        <div class="flex items-center justify-between mb-5">
            <h2 class="text-lg font-semibold text-gray-900">Histórico - <?= formatoNumero($totHistorico ?? 0000); ?></h2>
        </div>
        
        <div id="history-list" class="space-y-3 max-h-[400px] overflow-y-auto pr-2 -mr-2">
            <?php if(!empty($historico)): ?>    
                <?php foreach ($historico as $elemento): ?>
                    <!-- Histórico COM intervalos cadastrados -->
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-400">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-9 h-9 rounded-lg bg-gray-100 flex items-center justify-center shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-800" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900"><?= formatoNumero($elemento->inicio); ?> - <?= formatoNumero($elemento->fim); ?></p>
                                <p class="text-xs text-gray-500"><?= tempoDecorrido($elemento->data_cadastro) ?></p>
                            </div>
                        </div>
                        <!-- Observação -->
                        <div class="pl-12">
                            <p class="text-xs text-gray-600 truncate-2-lines">
                                <?= $elemento->observacao?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>        
            <?php else: ?>
                <!-- Histórico VAZIO - pra ver ele é só tirar o hidden -->
                <div class="text-center py-8 text-gray-400" id="empty-history-message">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <p class="text-sm">Nenhum intervalo selecionado ainda</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>