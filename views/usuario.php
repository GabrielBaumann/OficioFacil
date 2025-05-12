<?php
use Source\Models\Unidade;
$this->layout('layout_user', ['usuarios' => $usuarios]); ?>

<div class="overflow-x-auto">
    <div class="align-middle inline-block min-w-full">
        <div class="shadow overflow-hidden border-b border-gray-200 rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Senha</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unidade</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo de Acesso</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <?php foreach($usuarios as $usuario): ?>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- essa é a linha-->
                        <tr class="hover:bg-gray-50 cursor-pointer transition user-row" 
                            data-url="<?= url("/addUser/{$usuario->id_usuario}") ?>">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900">
                                        <?= $usuario->usuario; ?>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900">
                                        *******
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900">
                                        <?= (new Unidade())->idUnidade($usuario->id_unidade)->unidade; ?>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900">
                                        <?= $usuario->tipo_acesso; ?>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900">
                                        <?= $usuario->ativo ? "ativo" : "cancelado" ; ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
