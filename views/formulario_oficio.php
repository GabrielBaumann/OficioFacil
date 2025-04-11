<?php $this->layout('layout_formulario', ['title' => $title])?>
<div class="ajax_response absolute top-0 left-0 w-full z-50 rounded hidden"></div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Principal -->
    <main class="lg:col-span-2 space-y-6">

        <!-- Formulário -->
        <div class="bg-white rounded-xl overflow-hidden border border-gray-400">
            <div class="p-5">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Selecione seu intervalo</h2>
                <form action="#" method="POST" class="space-y-5">
                
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
                        <button type="submit" class="w-full bg-black hover:bg-gray-800 text-white font-medium py-3.5 px-4 rounded-full transition duration-200 flex items-center justify-center shadow-sm hover:shadow-md">
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
        <div id="current-selection" class="bg-gradient-to-r from-black to-gray-800 rounded-xl overflow-hidden">
            <div class="p-5 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold mb-1">Intervalo Atual</h2>
                        <p id="current-range" class="text-2xl font-bold">134 - 256</p>
                    </div>
                    <div class="bg-transparent p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </main>

<!-- Histórico -->
<aside class="lg:col-span-1">
    <div class="bg-white rounded-xl border border-gray-400 overflow-hidden sticky top-6">
        <div class="p-5">
            <div class="flex items-center justify-between mb-5">
                <h2 class="text-lg font-semibold text-gray-900">Histórico</h2>
            </div>
            
            <div id="history-list" class="space-y-3 max-h-[400px] overflow-y-auto pr-2 -mr-2">

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
                            <p class="text-sm font-medium text-gray-900">10 - 50</p>
                            <p class="text-xs text-gray-500">2 horas atrás</p>
                        </div>
                    </div>
                    <!-- Observação -->
                    <div class="pl-12">
                        <p class="text-xs text-gray-600 truncate-2-lines">
                            Para a Gestão de Benefícios socioassistenciais, esse é um exemplo de texto grande.
                        </p>
                    </div>
                </div>
                
                <!-- Histórico VAZIO - pra ver ele é só tirar o hidden -->
                <div class="text-center py-8 text-gray-400 hidden" id="empty-history-message">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <p class="text-sm">Nenhum intervalo selecionado ainda</p>
                </div>

            </div>
        </div>
    </div>
</aside>
</div>