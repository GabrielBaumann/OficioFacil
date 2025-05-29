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
    
    <div class="bg-white">
      
      <div class="relative isolate">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
          <div class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-linear-to-tr from-blue-400 to-blue-200 opacity-30 sm:left-[calc(50%-30rem)] sm:w-288.75" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-2xl py-20 sm:py-28 lg:py-32">
          <div class="hidden sm:mb-8 sm:flex sm:justify-center">
            <div class="relative rounded-full px-3 py-1 text-sm/6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
              Role a tela para baixo para ver o histórico ou <a href="#historicoDados" class="font-semibold text-blue-800"><span class="absolute inset-0" aria-hidden="true"></span>Ver Histórico <span aria-hidden="true">&rarr;</span></a>
            </div>
          </div>
          <div class="text-center">
            <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900 sm:text-7xl">Selecione um intervalo de Ofícios</h1>
            <div class="isolate  px-6 py-24 sm:py-15 lg:px-8 text-left">
                <form action="<?= url("/of"); ?>" method="POST" class="mx-auto max-w-xl ">
                    <?= csrf_input(); ?>
                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                    <div>
                        <label for="first-name" class="block text-sm/6 font-semibold text-gray-900">De</label>
                        <div class="mt-2.5" id='intervaloMais'>
                          <?php $this->insert('intervalo_mais', ['intervalo' => $intervalo]) ?>
                        </div>
                    </div>
                    <div>
                        <label for="last-name" class="block text-sm/6 font-semibold text-gray-900">Até</label>
                        <div class="mt-2.5">
                        <input type="number"
                                id="max-number"
                                name="max-number"
                                class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-500 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-800"
                                placeholder="Número final"
                                min="0"
                                required>
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="observacao" class="block text-sm/6 font-semibold text-gray-900">Obervação (Opcional)</label>
                        <div class="mt-2.5">
                        <textarea name="observacao" id="observacao" rows="4" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-500 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-800"></textarea>
                        </div>
                    </div>
                    </div>
                    <div class="mt-10">
                    <button id="visualizar" name="btn-send" class="block w-full rounded-md bg-blue-800 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-blue-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-800">Gerar intervalo</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
          <div class="relative left-[calc(50%+3rem)] aspect-1155/678 w-144.5 -translate-x-1/2 bg-linear-to-tr from-blue-400 to-blue-200 opacity-30 sm:left-[calc(50%+36rem)] sm:w-288.75" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
      </div>
    </div>

<div id='historicoDados' class="bg-gray-50 py-24 sm:py-32">
  <div class="mx-auto max-w-2xl px-6 lg:max-w-7xl lg:px-8">
    <h2 class="text-center text-base/7 font-semibold text-blue-800">Histórico</h2>
    <p class="mx-auto mt-2 max-w-lg text-center text-4xl font-semibold tracking-tight text-balance text-gray-950 sm:text-5xl">Esses são os intervalos mais recentes</p>
    
    <div class="mt-10 grid gap-4 sm:mt-16 lg:grid-cols-[repeat(auto-fit,minmax(400px,1fr))]">
      <?php if($usuario->tipo_acesso === "adm" || $usuario->tipo_acesso === "dev"): ?>
          <?php $this->insert('historicoUnidade', ['historico' => $historico, 'totHistorico' => $totHistorico]) ?>
          <?php $this->insert('historicoGeral', ['historicoGeral' => $historicoGeral, 'totGeral' => $totGeral]) ?>
      <?php else: ?>    
          <?php $this->insert('historicoUnidade', ['historico' => $historico, 'totHistorico' => $totHistorico]) ?>
      <?php endif; ?>
    </div>
  </div>
</div>