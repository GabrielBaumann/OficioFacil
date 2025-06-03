<?php use Source\Models\Unidade; ?>

<div class="overflow-x-auto">
    <table class="min-w-full responsive-table border border-gray-300">
        <thead class="bg-gray-300">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nome
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Unidade
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Tipo de Acesso
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status
                </th>
                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Ação
                </th>
            </tr>
        </thead>

            <tbody class="bg-white divide-y divide-gray-200">
                <!-- Line -->
                <?php if($usuarios): ?>
                    <tr class="cursor-pointer hover:bg-blue-200">
                        <?php foreach($usuarios as $usuario): ?>
                        <td data-label="Nome" class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900"><?= $usuario->usuario; ?></div>
                                </div>
                            </div>
                        </td>
                        <td data-label="Unidade" class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?= (new Unidade())->idUnidade($usuario->id_unidade)->unidade; ?></div>
                        </td>
                        <td data-label="Tipo de Acesso" class="px-6 py-4 whitespace-nowrap">
                            <span class="color-user text-sm text-blue-800 bg-blue-200 rounded-full text-sm px-2.5 py-0.5"><?= $usuario->tipo_acesso; ?></span>
                        </td>
                        <td data-label="Status" class="px-6 py-4 whitespace-nowrap">
                            <span class="status-badge px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <?= $usuario->ativo ? "ativo" : "inativo" ; ?>
                            </span>
                        </td>
                        <td data-label="Ação" class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end">
                                <button 
                                    data-url="<?= url("/addUser/{$usuario->id_usuario}") ?>"
                                    id="btn-edit" 
                                    class="text-blue-600 hover:text-blue-900 p-1 rounded-full hover:bg-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else:?>
                <tr class="cursor-pointer hover:bg-blue-200">
                    <td data-label="Nome" class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Sem dados para o filtro...</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endif;?>
            </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="px-4 py-3 flex items-center justify-between border-b border-r border-l border-gray-300 sm:px-6">

    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
        <div>
            <p class="text-sm text-gray-700">
                Total <span class="font-medium"><?= formatoNumero($totalUser, 000); ?></span>
            </p>
        </div>
        <div>
            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                <?= $paginator; ?>
            </nav>
        </div>
    </div>
</div>