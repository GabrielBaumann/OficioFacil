<?php $this->layout('layout_formulario', ['title' => $title, 
    'intervalo' => $intervalo, 
    'historico' => $historico, 
    'usuario' => $usuario, 
    'unidade' => $unidade,
    'totHistorico' => $totHistorico
    ])?>
<div class="ajax_response absolute top-0 left-0 w-full z-50 rounded hidden"></div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Principal -->
    <main class="lg:col-span-2 space-y-6">

        <!-- Formulário -->
        <div class="bg-white rounded-xl overflow-hidden border border-gray-400">
            <div class="p-5">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Selecione seu intervalo</h2>
                <form action="<?= url("/of"); ?>" method="POST" class="space-y-5">
                
                    <?= csrf_input(); ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="min-number" class="block text-sm font-medium text-gray-700 mb-2 pl-1">De</label>
                            <div class="relative">
                                <input 
                                    type="number" 
                                    id="min-number" 
                                    name="min-number"
                                    class="w-full px-5 py-3 border border-gray-400 bg-white rounded-full focus:ring-2 focus:ring-black focus:border-transparent outline-none transition text-gray-800 font-medium"
                                    placeholder="0"
                                    min="0"
                                    required
                                >
                            </div>
                        </div>
                        <div>
                            <label for="max-number" class="block text-sm font-medium text-gray-700 mb-2 pl-1">Até</label>
                            <div class="relative">
                                <input 
                                    type="number" 
                                    id="max-number" 
                                    name="max-number"
                                    class="w-full px-5 py-3 border border-gray-400 bg-white rounded-full focus:ring-2 focus:ring-black focus:border-transparent outline-none transition text-gray-800 font-medium"
                                    placeholder="100"
                                    min="0"
                                    required
                                >
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label for="observacao" class="block text-sm font-medium text-gray-700 mb-2 pl-1">Observação</label>
                        <textarea 
                            id="observacao" 
                            name="observacao"
                            rows="3"
                            class="w-full px-5 py-3 border border-gray-400 bg-white rounded-lg focus:ring-2 focus:ring-black focus:border-transparent outline-none transition text-gray-800 font-medium"
                            placeholder="Adicione uma observação (opcional)"
                        ></textarea>
                    </div>
                    
                    <div class="pt-1">
                        <button id="enviar" type="submit" class="w-full bg-black hover:bg-gray-800 text-white font-medium py-3.5 px-4 rounded-full transition duration-200 flex items-center justify-center shadow-sm hover:shadow-md">
                            <span>Confirmar Intervalo</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Ùltimo intervalo gerado -->
        <div id="intervaloDados">
            <?php $this->insert('intervalo', ['intervalo' => $intervalo])?>
        </div>
    </main>

    <!-- Histórico -->
    <aside class="lg:col-span-1">
        <div id="historicoDados">
            <?php $this->insert('historico', ['historico' => $historico, 'historico' => $historico, 'totHistorico' => $totHistorico]) ?>
        </div>
    </aside>
</div>