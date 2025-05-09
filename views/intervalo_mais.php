<label class="block text-sm font-medium text-gray-700 mb-1">De</label>
    <input 
        type="number"
        id="min-number"
        name="min-number" 
        disabled 
        class="w-full px-4 py-2.5 text-sm rounded-lg bg-gray-50 border border-gray-200 focus:border-blue-500 focus:ring-1 focus:ring-blue-200 outline-none transition cursor-not-allowed"
        placeholder="<?= formatoNumero(formatoNumero($intervalo->fim ?? 0000) + 1)?>"
        required
>