<?php $this->layout("layout_formulario", [ 
    'unidade' => $unidade, 
    'historico' => $historico, 
    'intervalo' => $intervalo ,
    'usuario' => $usuario, 
    'totHistorico' => $totHistorico,
    'historicoGeral' => $historicoGeral,
    'totGeral' => $totGeral,
    'unidade' => $unidade
    ]); ?>

<main class="flex-1 py-6 px-4 sm:px-6">
    <div class="max-w-7xl mx-auto">
        <div id="mainView" class="block">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white rounded-lg border border-gray-100 p-6 shadow-sm">
                    <h2 class="text-xl font-semibold text-gray-900 mb-6">Gerar novo intervalo</h2>
                    <form action="<?= url("/of"); ?>" method="POST">
                        <?= csrf_input(); ?>  
                        <div class="space-y-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div id="intervaloMais">
                                    <?php $this->insert('intervalo_mais', ['intervalo' => $intervalo]) ?>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Até</label>
                                    <input 
                                        type="number"
                                        id="max-number"
                                        name="max-number"
                                        class="w-full px-4 py-2.5 text-sm rounded-lg bg-white border border-gray-200 focus:border-blue-500 focus:ring-1 focus:ring-blue-200 outline-none transition hover:border-gray-300"
                                        placeholder="Número final"
                                        min="0"
                                        required
                                    >
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Observação <span class="text-gray-400">(opcional)</span>
                                </label>
                                <textarea 
                                    class="w-full px-4 py-2.5 text-sm rounded-lg bg-white border border-gray-200 focus:border-blue-500 focus:ring-1 focus:ring-blue-200 outline-none transition hover:border-gray-300 min-h-[100px]"
                                    placeholder="Adicione alguma observação sobre este intervalo..."
                                    id="observacao"
                                    name="observacao"
                                ></textarea>
                            </div>
                            
                            <button id="visualizar" name="btn-send" class="w-full mt-2 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-4 rounded-lg transition flex items-center justify-center space-x-2 text-sm">
                                <span>Confirmar Intervalo</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Histórico -->
                <div id="historicoDados" class="space-y-6">
                    <?php if($usuario->tipo_acesso === "adm" || $usuario->tipo_acesso === "dev"): ?>
                        <?php $this->insert('historicoUnidade', ['historico' => $historico, 'totHistorico' => $totHistorico]) ?>
                        <?php $this->insert('historicoGeral', ['historicoGeral' => $historicoGeral, 'totGeral' => $totGeral, 'unidade' => $unidade]) ?>
                    <?php else: ?>    
                        <?php $this->insert('historicoUnidade', ['historico' => $historico, 'totHistorico' => $totHistorico]) ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>