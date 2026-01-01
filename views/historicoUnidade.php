<!-- Histórico Unidade -->
<div class="mt-10 grid gap-4 sm:mt-16 lg:grid-cols-[repeat(auto-fit,minmax(400px,1fr))]"> <!-- A div começa aqui e teminar o arquivo HistóricoGeral -->

  <div class="space-y-4">
    <h2 class="text-lg font-semibold text-gray-800">Histórico Geral Setor. Total:<?= formatoNumero($totHistorico ?? 0000); ?></h2>

    <div class="relative">
      <input
        data-search="<?= url("/pesquisar/"); ?>"
        data-update="update-search-unit"
        name="search-unit"
        id="search-unit"  
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

    <div id="update-search-unit">
      <?= $this->insert("listHistoryUnidade", ["historico" => $historico]) ?>
    </div>

  </div>

