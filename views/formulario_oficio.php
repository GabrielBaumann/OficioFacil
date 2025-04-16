<?php $this->layout('layout_formulario', ['title' => $title, 
    'intervalo' => $intervalo, 
    'historico' => $historico, 
    'usuario' => $usuario, 
    'unidade' => $unidade,
    'totHistorico' => $totHistorico
    ])?>
<main class="flex-1 py-6 px-4">
            <div class="max-w-4xl mx-auto">
        <form action="<?= url("/of"); ?>" method="POST">
        <?= csrf_input(); ?>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                <h2 class="text-xl font-bold text-center text-gray-900 mb-6">Selecione um intervalo</h2>
                    
                <div class="flex flex-col md:flex-row md:space-x-4 space-y-4 md:space-y-0">
                    <div class="md:w-1/2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">De</label>
                        <input
                            type="number"
                            id="min-number"
                            name="min-number"
                            disabled
                            class="appearance-none w-full px-4 py-3 text-base rounded-full bg-gray-100 border border-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition cursor-not-allowed"
                            value="001"
                            min="0"
                            required
                        >
                    </div>
            
                    <div class="md:w-1/2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Até</label>
                        <input
                            type="number"
                            id="max-number"
                            name="max-number"
                            class="appearance-none w-full px-4 py-3 text-base rounded-full bg-white border border-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition hover:border-gray-400"
                            placeholder="Número final"
                            min="0"
                            required
                        >
                    </div>
                </div>
                <!-- Campo de Observação -->
                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Observação <span class="text-gray-500 font-normal">(opcional)</span>
                    </label>
                    <textarea
                        class="w-full px-4 py-3 text-base rounded-xl bg-white border border-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition hover:border-gray-400 min-h-[100px]"
                        placeholder="Adicione alguma observação sobre este intervalo..."
                        id="observacao"
                        name="observacao"
                    ></textarea>
                </div>
                    
                <button class="w-full md:w-[calc(100%-1rem)] md:mx-auto mt-6 bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-full transition-all flex items-center justify-center space-x-2 text-base">
                    <span>Confirmar Intervalo</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </button>
            </div>
        </form>

        <!-- Histórico -->
        <div>
            <h2 class="text-xl font-bold text-center text-gray-900 mb-6">Histórico</h2>

            <!-- Container principal do histórico -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <?php $this->insert('historico', ['historico' => $historico, 'historico' => $historico, 'totHistorico' => $totHistorico]) ?>
            </div>
        </div>
    </div>
</main>