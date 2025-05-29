<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>OfícioFácil</title>
</head>
<body>
    <div class="bg-white">
      <header class="absolute inset-x-0 top-0 z-50">
        <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
          <div class="flex lg:flex-1">
            <a href="#" class="cursor-default text-sm/6 font-semibold text-gray-900 mr-10">Olá, Fulano</span></a>
            <?php if($usuario->tipo_acesso === "dev"):?>
                <a href="<?= url("/user")?>">
                    <button id="toggleView" class=" md:flex items-center space-x-1 text-sm font-medium text-gray-600 hover:text-blue-600 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span>Gerenciar Usuários</span>
                    </button>
                </a>
              <?php endif;?>
          </div>
          
          <div class="flex flex-1 justify-end">
            <a href="<?= url("/sair"); ?>" class="text-sm/6 font-semibold text-gray-900">Sair<span aria-hidden="true">&rarr;</span></a>
          </div>
        </nav>
      </header>
      
      <div>
        <?= $this->section("content"); ?>
      </div>
    </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
  <script src="<?= themes("/lib/js/jquery.form.js"); ?>"></script>
  <script src="<?= themes("/lib/js/atualizarpage.js"); ?>"></script>
</body>
</html>