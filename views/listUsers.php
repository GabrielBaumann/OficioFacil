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
        <?php foreach($usuarios as $usuario): ?>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- Line -->
                <tr class="cursor-pointer hover:bg-blue-200">
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
                        <div class="text-sm text-gray-900"><?= $usuario->tipo_acesso; ?></div>
                    </td>
                    <td data-label="Status" class="px-6 py-4 whitespace-nowrap">
                        <span class="status-badge px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            <?= $usuario->ativo ? "ativo" : "cancelado" ; ?>
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
            </tbody>
        <?php endforeach; ?>
    </table>
</div>

<!-- Pagination -->
<div class="bg-white px-4 py-3 flex items-center justify-between border-b border-r border-l border-gray-300 sm:px-6">

    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
        <div>
            <p class="text-sm text-gray-700">
                Mostrando <span class="font-medium">1</span> a <span class="font-medium">3</span> de <span class="font-medium">12</span> resultados
            </p>
        </div>
        <div>
            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                <?= $paginator; ?>

                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Anterior</span>
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="#" aria-current="page" class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                    1
                </a>
                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                    2
                </a>
                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                    3
                </a>
                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Próximo</span>
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            </nav>
        </div>
    </div>
</div>