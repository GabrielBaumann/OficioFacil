<div id="current-selection" class="bg-gradient-to-r from-black to-gray-800 rounded-xl overflow-hidden">
    <div class="p-5 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold mb-1">Intervalo Atual</h2>
                <p id="current-range" class="text-2xl font-bold"><?= formatoNumero($intervalo->inicio ?? 0000); ?> - <?= formatoNumero($intervalo->fim ?? 0000); ?></p>
            </div>
            <div class="bg-transparent p-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                </svg>
            </div>
        </div>
    </div>
</div>