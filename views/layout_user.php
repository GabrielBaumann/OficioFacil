<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="max-w-[1200px] mx-auto">
    <!-- Primeiro Header com Botão Voltar -->
    <header class="h-16 px-4 sm:px-6 flex items-center justify-between sticky top-0 bg-white">
        <div class="flex items-center space-x-4">
            <a href="<?= url("/of"); ?>" class="p-1 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <div class="flex items-center space-x-2">
                <h1 class="text-xl font-semibold">OfícioFácil</h1>
            </div>
        </div>
        
    </header>
    <!-- Lista -->
    <div id="usersView" class="">
        <div class="bg-white rounded-lg border border-gray-100 p-6 shadow-sm">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-900">Gerenciamento de Usuários</h2>
                <button type="submit" id="addUserBtn" data-url="<?= url("/addUser") ?>" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition flex items-center space-x-2 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span>Adicionar Usuário</span>
                </button>
            </div>
            <div id="usuarioLista">
                <?= $this->section("content"); ?>
            </div>
        </div>
    </div>  

    <!-- Modal COLOCAR OU TIRAR HIDDEN SE QUISER DESAPARECER ELE  -->
    <div id="modal"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script src="<?= themes("/lib/js/jquery.form.js"); ?>"></script>
</body>
</html>