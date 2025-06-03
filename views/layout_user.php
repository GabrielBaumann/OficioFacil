<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Usuários</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://unpkg.com/@heroicons/react@1.0.5/outline.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= themes("/lib/css/paginator.css"); ?>">
    <style>
        @media (max-width: 640px) {
            .responsive-table thead {
                display: none;
            }
            .responsive-table tr {
                display: block;
                margin-bottom: 1rem;
                border-radius: 0.5rem;
                box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            }
            .responsive-table td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0.75rem;
                text-align: right;
                border-bottom: 1px solid #f3f4f6;
            }
            .responsive-table td:before {
                content: attr(data-label);
                font-weight: 600;
                color: #374151;
                margin-right: 1rem;
                text-align: left;
            }
            .responsive-table td:last-child {
                border-bottom: none;
            }
            .status-badge {
                margin-left: auto;
            }
        }
    </style>
</head>
<body class="bg-gray-50 font-sans mx-auto max-w-[1200px]">
    <header class="h-16 px-4 md:p-0 flex items-center justify-between sticky top-0">
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
    <div class="container px-4 py-8 md:p-0">
        <!-- Header -->
        <header class="mb-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h1 class="text-2xl text-gray-800">Gerenciamento de Usuários</h1>
                </div>
                <button type="submit" id="addUserBtn" data-url="<?= url("/addUser") ?>" class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-full flex items-center gap-2 w-full sm:w-auto justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    <span>Novo Usuário</span>
                </button>
            </div>
        </header>

        <!-- Filters -->
        <div class="bg-white p-4 rounded-xl shadow-sm mb-6">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="relative flex-grow">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input
                        data-urlsearc="<?= url("/user"); ?>"
                        name="input-search-name"
                        type="text" 
                        class="block w-full pl-10 pr-3 py-2 border border-gray-400 rounded-lg bg-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Pesquisar usuários...">
                </div>
                <div class="flex gap-2">
                    <select
                        data-urlsearc="<?= url("/user"); ?>" 
                        name="select-search-status"
                        class="block w-full md:w-auto px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
                        <option value="*">Status</option>
                        <option value="1">Ativo</option>
                        <option value=0>Inativo</option>
                    </select>
                    <select
                        data-urlsearc="<?= url("/user"); ?>"
                        name="select-search-type-access"
                        class="block w-full md:w-auto px-3 py-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
                        <option value="*">Tipo de Acesso</option>
                        <option>adm</option>
                        <option>dev</option>
                        <option>user</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Users Table -->
        <div class="bg-white shadow-sm rounded-xl overflow-hidden">
            <div id="usuarioLista">
                <?= $this->section("content"); ?>
            </div>

            <!-- Modal COLOCAR OU TIRAR HIDDEN SE QUISER DESAPARECER ELE  -->
            <div id="modal"></div>

        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script src="<?= themes("/lib/js/jquery.form.js"); ?>"></script>
</body>
</html>