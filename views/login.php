<?php $this->layout('layout_login', ["title" => $title]) ?>

<form action="<?= url("/"); ?>" method="post">
    <div class="ajax_response absolute top-0 left-0 w-full z-50 rounded hidden"></div>
    <?= csrf_input(); ?>

    <div class="flex flex-col md:flex-row w-full h-auto md:h-[600px] max-w-4xl bg-white rounded-tl-[100px] rounded-tr-[20px] rounded-br-[100px] rounded-bl-[20px] shadow-lg overflow-hidden m-5">
        <div class="hidden md:flex md:w-1/2 bg-blue-600 text-white p-10 flex flex-col justify-center">
            <h2 class="text-2xl font-bold">Bem vindo ao OfícioFácil</h2>
            <div class="w-16 border-b-2 border-white my-3"></div>
            <p class="text-sm">Insira suas informações para ter acesso ao dashboard e poder gerenciar seus ofícios com rapidez e autonomia.</p>
            <button class="mt-4 px-4 py-2 border border-white rounded-full text-white cursor-default">Quero conhecer</button>
        </div>
        <div class="md:w-1/2 p-10 flex flex-col justify-center">
            <h2 class="text-2xl font-semibold text-blue-600">Faça seu login</h2>
            <div class="w-12 border-b-2 border-blue-600 my-3"></div>
            <input name="usuario" type="text" placeholder="Seu usuário..." class="w-full p-2 border border-gray-300 rounded mt-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
            <input name="senha" type="password" placeholder="Sua senha..." class="w-full p-2 border border-gray-300 rounded mt-4 focus:outline-none focus:ring-2 focus:ring-blue-600">
            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 rounded mt-4 hover:bg-blue-700 transition">ENTRAR</button>
        </div>
    </div>
</form>