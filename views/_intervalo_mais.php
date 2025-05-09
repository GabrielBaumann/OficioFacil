
<label class="block text-sm font-medium text-gray-700 mb-2">De</label>
<input
    type="number"
    id="min-number"
    name="min-number"
    disabled
    class="appearance-none w-full px-4 py-3 text-base rounded-full bg-gray-100 border border-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition cursor-not-allowed"
    placeholder="<?= formatoNumero(formatoNumero($intervalo->fim ?? 0000) + 1)?>"
    min="0"
    required
>