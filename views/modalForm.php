<div id="userModal" class="fixed inset-0 overflow-y-auto z-50  modal-transition">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div id="fundoModal" class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <form id="form" action="<?= url("/addUser") . (isset($usuario->id_usuario) ? "/" . $usuario->id_usuario : "" ) ?>" method="post">
            <?= csrf_input(); ?>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="modalTitle">Adicionar Novo Usuário</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nome Completo</label>
                            <input name="name" 
                                type="text"
                                value="<?= $usuario->nome ?? ""; ?>" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Usuario</label>
                            <input name="usuario" 
                                type="text"
                                value="<?= $usuario->usuario ?? ""; ?>" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
                            <input name="password" 
                                type="password"
                                value="<?= $usuario->senha ?? ""; ?>" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Unidade</label>
                                <select name="unit" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    <option value="" selected disabled>Selecione</option>
                                    <?php foreach($unidades as $unidade): ?> 
                                        <option value="<?= $unidade->id_unidade; ?>" <?= ($usuario->id_unidade ?? null) === $unidade->id_unidade ? "selected" : "" ?>><?= $unidade->unidade; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Tipo de Acesso</label>
                                <select name="typeAccess" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    <option value="" selected disabled>Selecione</option>
                                    <option value="adm" <?= ($usuario->tipo_acesso ?? null) === "adm" ? "selected" : "" ?>>Adm</option>
                                    <option value="dev" <?= ($usuario->tipo_acesso ?? null) === "dev" ? "selected" : "" ?>>Dev</option>
                                    <option value="user" <?= ($usuario->tipo_acesso ?? null) === "user" ? "selected" : "" ?>>User</option>
                                </select>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="" selected disabled>Selecione</option>
                                <option value="1" <?= ($usuario->ativo ?? null) === 1 ? "selected" : ""?>>Ativo</option>
                                <option value="0" <?= ($usuario->ativo ?? null) === 0 ? "selected" : ""?>>Cancelado</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button id="btnSave" type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Salvar
                    </button>
                    <button id="btnCancel" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm cancel-modal">
                        Cancelar
                    </button>
                    <!-- <button id="btnExcluir" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm delete-modal">
                        Excluir
                    </button> -->
                </div>
            </div>
        </form>   
    </div>
</div>