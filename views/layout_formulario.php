<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$this->e($title); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen text-gray-900 bg-gray-50 font-sans">
    <div class="fixed top-0 left-0 right-0 h-[560px] bg-gradient-to-b from-blue-100 to-gray-50 rounded-b-2xl -z-10"></div>
    <div class="min-h-screen flex flex-col relative">
        
        <header class="bg-white border-b border-gray-200 py-4 px-6">
            <div class="max-w-4xl mx-auto flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h1 class="text-xl font-bold text-gray-900">OfícioFácil</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-sm font-medium text-gray-600"><?= $this->e($usuario->usuario); ?> - <?= $this->e($unidade->unidade); ?></span>
                    <a href="<?= url("/sair"); ?>">
                        <button class="p-2 rounded-full hover:bg-gray-100 transition">
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
</body>
</html>