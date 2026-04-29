@extends('Layouts.app')
@section('title', 'Novo Trabalho')

@section('header')
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
                <h1 class="text-2xl font-bold text-white">Novo Trabalho</h1>
            </div>

            <div class="relative">
                <button
                    class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center text-gray-600 hover:shadow-md transition">
                    <i class="fas fa-plus text-lg"></i>
                </button>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <form action="{{ route('company.newWork') }}" method="post">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nome do trabalho</label>
                <input type="text" name="name_work"
                    class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark"
                    placeholder="Ex: Desenvolvimento de Landing Page" required>
                @error('name_work')
                    <div class="mt-2 text-sm text-Danger bg-red-50 p-3 rounded-lg border border-Danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                <textarea name="description_work"
                    class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark"
                    placeholder="Resumo curto do trabalho" required>
                </textarea>
            </div>

            <div>
                <div x-data="{
                    selectedSkills: [],
                    toggleSkill(id, name) {
                        const index = this.selectedSkills.findIndex(s => s.id === id)
                
                        if (index === -1) {
                            this.selectedSkills.push({ id, name });
                        } else {
                            this.selectedSkills.splice(index, 1);
                        }
                    }
                }" class=" space-y-4">
                    <div x-data="{ open: false }" @keydown.escape.window="open = false" @click.away="open = false"
                        class="relative w-full text-left">
                        <button @click="open = !open" type="button"
                            class=" inline-flex items-center justify-center w-full px-4 py-4 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-0 ocus:ring-2 focus:ring-offset-2 focus:ring-Primary-dark"
                            :aria-expanded="open" aria-haspopup="true">
                            Selecione seus serviços
                            <svg class="w-5 h-5 ml-2 -mr-1 transition-transform duration-200"
                                :class="open ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute w-full p-4 left-0 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            x-cloak>

                            <div class="flex flex-wrap gap-2">
                                @foreach ($skills as $skill)
                                    <button type="button"
                                        @click="toggleSkill({{ $skill->id }}, '{{ $skill->skill_name }}')"
                                        :class="selectedSkills.some(s => s.id === {{ $skill->id }}) ?
                                            'bg-Primary-dark text-white border-Primary-dark' :
                                            'bg-white text-gray-700 border-gray-300 hover:bg-Primary-light'"
                                        class="px-4 py-2 rounded-full border text-sm transition cursor-pointer duration-150">
                                        <span
                                            x-text="selectedSkills.find(s => s.id === {{ $skill->id }}) ? '✓' : '+'"></span>
                                        {{ $skill->skill_name }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div
                        class=" min-h-16 p-4 rounded-xl bg-gray-50 border-2 border-dashed border-Primary flex flex-wrap gap-2">
                        <template x-if="selectedSkills.length === 0">
                            <span class="text-gray-400 text-sm">Nenhuma habilidade selecionada...</span>
                        </template>

                        <template x-for="skill in selectedSkills" :key="skill.id">
                            <div
                                class="flex items-center gap-2 px-3 py-1.5 bg-Primary-dark text-white rounded-lg text-sm animate-in fade-in zoom-in duration-200">
                                <span x-text="skill.name"></span>

                                <input type="hidden" name="skills[]" :value="skill.id">
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Data de início</label>
                    <input type="date" name="start_date"
                        class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark"
                        required>
                    @error('start_date')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Data de término</label>
                    <input type="date" name="end_date"
                        class="w-full border border-gray-200 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-Primary-dark">
                    @error('end_date')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tipo do trabalho</label>
                <div class="grid grid-cols-2 mb-1 py-4 px-2 gap-3">
                    <button
                        class="border border-Primary-dark py-2 rounded-full hover:bg-Primary-light transition-all duration-200 cursor-pointer">
                        Freelancer
                    </button>

                    <button
                        class="border border-Primary-dark py-2 rounded-full hover:bg-Primary-light transition-all duration-200 cursor-pointer">
                        Efetivo
                    </button>
                </div>

                @error('type_work')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror

                <input type="hidden" name="type_work" required>

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
        </div>

        <div class="flex gap-2 pt-4">
            <button type="submit" class="flex-1 py-2 rounded-xl text-white font-medium bg-Primary-dark">
                Salvar
            </button>
        </div>
    </form>
@endsection
