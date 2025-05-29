<?php $this->layout('layout_login', ["title" => $title]) ?>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h1 class="flex items-center justify-center gap-2 text-2xl font-bold tracking-tight text-blue-500">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
        </svg>
        OfícioFácil
    </h1>
    <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">Insira suas informações</h2>
</div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="<?= url("/"); ?>" method="post">
    <div class="ajax_response absolute top-0 left-0 w-full z-50 rounded hidden"></div>
    <?= csrf_input(); ?>
      <div>
        <label for="Usuário" class="block text-sm/6 font-medium text-gray-900">Usuário</label>
        <div class="mt-2">
          <input name="usuario" type="text" required class="border border-gray-400 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 sm:text-sm/6">
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="Senha" class="block text-sm/6 font-medium text-gray-900">Senha</label>
        </div>
        <div class="mt-2">
          <input name="senha" type="password" required class="border border-gray-400 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 sm:text-sm/6">
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-blue-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Entrar</button>
      </div>
    </form>
  </div>
</div>