<!-- Segundo Histórico -->
<div class="space-y-4">
  <h2 class="text-lg font-semibold text-gray-800">Histórico Geral. Total:<?= formatoNumero($totHistorico ?? 0000); ?></h2>

  <div class="relative">
    <input 
      type="text" 
      placeholder="Pesquisar documentos..." 
      class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
    >
    <svg 
      xmlns="http://www.w3.org/2000/svg" 
      class="h-4 w-4 absolute left-3 top-3 text-gray-400" 
      fill="none" 
      viewBox="0 0 24 24" 
      stroke="currentColor"
    >
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
    </svg>
  </div>

  <div class="relative h-130">
    <div class="absolute inset-px rounded-lg bg-white"></div>
    <div class="relative h-full rounded-lg border border-gray-200 overflow-y-auto">
      <?php if(!empty($historico)): ?>
        <!-- Histórico do usuáro -->
        <?php foreach($historico as $elemento): ?>
          <!-- Essa é a linha -->
          <div class="space-y-3 p-2">
              <div class="p-4 rounded-lg hover:bg-gray-50 transition border border-gray-100">
                  <div class="flex justify-between items-start">
                      <div>
                          <div class="flex items-baseline space-x-2">
                              <span class="text-sm font-semibold text-blue-600"><?= formatoNumero($elemento->inicio); ?> - <?= formatoNumero($elemento->fim); ?></span>
                              <span class="text-xs text-gray-400">•</span>
                              <div class="flex items-center text-xs text-gray-500">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>
                                  <span class="tempo-decorrido" data-dt="<?= $elemento->data_cadastro ?>">
                                      <?= tempoDecorrido($elemento->data_cadastro) ?>
                                  </span>
                              </div>
                          </div>
                          <p class="mt-2 text-xs text-gray-600 line-clamp-2"><?= $elemento->observacao?></p>
                      </div>
                      <a href="<?= url("gerar/{$elemento->id_numero_intervalo}") ?>" target="_blank">
                        <button class="ml-2 p-1.5 rounded-md bg-blue-50 hover:bg-blue-100 transition text-blue-600" title="Imprimir">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                          </svg>
                        </button>
                      </a>
                  </div>
              </div>
          </div>
        <?php endforeach; ?>
        <?php else: ?>
            <!-- Quando não tiver nada -->
            <div class="py-8 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="text-sm font-medium text-gray-500">Nenhum intervalo gerado ainda</h3>
            </div>
        <?php endif; ?>
    </div>
    <div class="pointer-events-none absolute inset-px rounded-lg shadow-sm ring-1 ring-black/5"></div>
  </div>
</div>