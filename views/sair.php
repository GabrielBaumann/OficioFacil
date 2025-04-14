<?php $this->layout('layout_login', ["title" => $title]) ?>

    <div class="ajax_response absolute top-0 left-0 w-full z-50 rounded hidden"></div>
    <?= csrf_input(); ?>

    <div class="flex flex-col md:flex-row w-full h-auto md:h-[600px] max-w-4xl bg-white rounded-tl-[100px] rounded-tr-[20px] rounded-br-[100px] rounded-bl-[20px] shadow-lg overflow-hidden m-5">
        <div class="hidden md:flex md:w-1/2 bg-gray-900 text-white p-10 flex flex-col justify-center">
            <h2 class="text-2xl font-bold">OfícioFácil - Até mais...</h2>
            <div class="w-16 border-b-2 border-white my-3"></div>
            <button class="mt-4 px-4 py-2 border border-white rounded-full text-white cursor-default">Quero conhecer</button>
        </div> 
            <div class="md:w-1/2 p-10 flex flex-col justify-center">
                <a href="<?= url("/"); ?>">  
                    <button type="submit" class="w-full bg-gray-900 text-white font-semibold py-2 rounded mt-4 hover:bg-gray-800 transition">Fazer Login</button>
                </a> 
            </div>
    </div>