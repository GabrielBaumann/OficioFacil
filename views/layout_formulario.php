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
            <a href="#" class="cursor-default text-sm/6 font-semibold text-gray-900 mr-10">Olá, <?= $usuario->usuario ?><span class='hidden md:inline'> - <?=$unidade->unidade ?></span></span></a>
            <?php if($usuario->tipo_acesso === "dev"):?>
                <a href="<?= url("/user")?>">
                    <button id="toggleView" class="bg-blue-900 rounded-full cursor-pointer py-1 px-3 md:flex items-center space-x-1 text-sm font-medium text-white transition">
                        <span>Gerenciar Usuários</span>
                    </button>
                </a>
              <?php endif;?>
          </div>
          
          <div class="flex flex-1 justify-end z-1">
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