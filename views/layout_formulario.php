<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OfícioFácil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Estilização personalizada da scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e0;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #a0aec0;
        }
        /* Transição suave para o modal */
        .modal-transition {
            transition: all 0.3s ease-out;
        }
    </style>
</head>
<body class="min-h-screen bg-white text-gray-800">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white border-b border-gray-100 py-4 px-4 sm:px-6">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h1 class="text-lg font-semibold text-gray-900">OfícioFácil</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <?php if($usuario->tipo_acesso === "dev"):?>
                        <a href="tabelaUsuarios.html">
                            <button id="toggleView" class=" md:flex items-center space-x-1 text-sm font-medium text-gray-600 hover:text-blue-600 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                <span>Gerenciar Usuários</span>
                            </button>
                        </a>
                    <?php endif;?>
                    <span class="text-sm font-medium text-gray-600  sm:inline">Olá, <?= $usuario->usuario ?> - <?=$unidade->unidade ?></span>
                    <a href="<?= url("/sair"); ?>">
                        <button class="p-2 rounded-full hover:bg-gray-50 transition" title="Sair">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </button>
                    </a>
                </div>
            </div>
        </header>

        <main>
            <?= $this->section("content"); ?>
        </main>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script src="<?= themes("/lib/js/jquery.form.js"); ?>"></script>
    <script src="<?= themes("/lib/js/atualizarpage.js"); ?>"></script>
</body>
</html>