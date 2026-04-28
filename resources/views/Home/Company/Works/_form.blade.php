@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 mb-1">Nome do trabalho</label>
        <input type="text" name="name_work" value="{{ old('name_work', $work->name_work ?? '') }}"
            class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark"
            placeholder="Ex: Desenvolvimento de Landing Page" required>
        @error('name_work')
            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
        <input type="text" name="description_work" value="{{ old('description_work', $work->description_work ?? '') }}"
            class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark"
            placeholder="Resumo curto do trabalho" required>
        @error('description_work')
            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Skill</label>
        <select name="skill_id"
            class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark"
            required>
            <option value="">Selecione</option>
            @foreach ($skills as $skill)
                <option value="{{ $skill->id }}"
                    {{ (string) old('skill_id', $work->skill_id ?? '') === (string) $skill->id ? 'selected' : '' }}>
                    {{ $skill->skill_name }}
                </option>
            @endforeach
        </select>
        @error('skill_id')
            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Empresa</label>
        <select name="companies_id"
            class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark"
            required>
            <option value="">Selecione</option>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}"
                    {{ (string) old('companies_id', $work->companies_id ?? '') === (string) $company->id ? 'selected' : '' }}>
                    {{ $company->company_name }}
                </option>
            @endforeach
        </select>
        @error('companies_id')
            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Data de início</label>
        <input type="date" name="start_date" value="{{ old('start_date', $work->start_date ?? '') }}"
            class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark"
            required>
        @error('start_date')
            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Data de término</label>
        <input type="date" name="end_date" value="{{ old('end_date', $work->end_date ?? '') }}"
            class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark">
        @error('end_date')
            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Tipo do trabalho</label>
        <input type="number" name="type_work" value="{{ old('type_work', $work->type_work ?? '') }}"
            class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark"
            placeholder="Ex: 1" required>
        @error('type_work')
            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Duração (dias)</label>
        <input type="number" name="duration" value="{{ old('duration', $work->duration ?? '') }}"
            class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark"
            placeholder="Ex: 30" required>
        @error('duration')
            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Pagamento (R$)</label>
        <input type="number" step="0.01" name="payment" value="{{ old('payment', $work->payment ?? '') }}"
            class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark"
            placeholder="Ex: 1500.00" required>
        @error('payment')
            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
        <input type="text" name="status" value="{{ old('status', $work->status ?? '') }}"
            class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark"
            placeholder="Ex: ativo" required>
        @error('status')
            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="flex gap-2 pt-4">
    <a href="{{ route('works.index') }}"
        class="flex-1 text-center py-2 rounded-xl border border-gray-300 text-gray-600 font-medium">
        Cancelar
    </a>
    <button type="submit" class="flex-1 py-2 rounded-xl text-white font-medium bg-Primary-dark">
        Salvar
    </button>
</div>
