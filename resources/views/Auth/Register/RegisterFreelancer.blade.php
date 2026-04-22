<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>WorkVale | Cadastro de Freelancer</title>
    <!-- TailwindCSS CDN + Font Awesome -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- jQuery e Mask Plugin -->
    <script src="https://code.jquery.com/jquery-4.0.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    {{-- Alpine.js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-200 min-h-screen flex flex-col">
    <div class="max-w-2xl mx-auto px-4 py-6 pb-24">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-block">
                <h1 class="text-3xl font-bold text-Primary">
                    Work<span class="text-Primary-dark">Vale</span>
                </h1>
            </div>

            <h2 class="text-xl font-semibold text-gray-800 mt-3">Cadastro de Freelancer</h2>
            <p class="text-sm text-gray-500 mt-1">Preencha seus dados para criar seu perfil</p>
        </div>

        <form id="registerForm" class="space-y-8" method="POST" action="{{ route('register.freelancer') }}">
            @csrf
            <!-- Seção 1: Dados Pessoais -->
            <div class="form-section bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-2 mb-5 pb-2 border-b border-gray-100">
                    <i class="fas fa-user-circle text-Primary-dark text-2xl"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Dados Pessoais</h3>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nome Completo <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="complete_name"
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white  border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out"
                            placeholder="Digite seu nome completo" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            CPF <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="cpf" id="cpf"
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out"
                            placeholder="000.000.000-00" required>
                        @error('cpf')
                            <div class="mt-2 text-sm text-Danger bg-red-50 p-3 rounded-lg border border-Danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Data de Nascimento <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="birth_date"
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out"
                            required>
                        @error('birth_date')
                            <div class="mt-2 text-sm text-Danger bg-red-50 p-3 rounded-lg border border-Danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Senha <span class="text-red-500">*</span>
                        </label>
                        <input type="password" name="password"
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out"
                            placeholder="" required>
                    </div>
                </div>
            </div>

            <!-- Seção 2: Contato -->
            <div class="form-section bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-2 mb-5 pb-2 border-b border-gray-100">
                    <i class="fas fa-address-card text-Primary-dark text-2xl"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Contato</h3>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            E-mail <span class="text-red-500">*</span>
                        </label>
                        <input type="email" name="email"
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out"
                            placeholder="seu@email.com" required>
                        <p class="text-xs text-gray-400 mt-1">Será usado como login</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Numero <span class="text-red-500">*</span>
                        </label>
                        <input type="tel" id="phone_number" name="phone_number"
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out"
                            placeholder="(99) 99999-9999" required>
                        @error('phone_number')
                            <div class="mt-2 text-sm text-Danger bg-red-50 p-3 rounded-lg border border-Danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Seção 3: Localização -->
            <div class="form-section bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-2 mb-5 pb-2 border-b border-gray-100">
                    <i class="fas fa-map-marker-alt text-Primary-dark text-2xl"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Localização</h3>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Cidade <span class="text-red-500">*</span>
                        </label>
                        {{-- Ajustar --}}
                        <select name="city_id"
                            class="form-select w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out">
                            <option selected class="hidden">Selecione sua cidade</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name_city }}</option>
                            @endforeach
                        </select>
                        <p class="text-xs text-gray-400 mt-1">25 municípios do Vale do Ribeira</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Endereço <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="address"
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out"
                            placeholder="Digite seu bairro" required>
                    </div>
                </div>
            </div>

            <!-- Seção 4: Perfil Profissional -->
            <div class="form-section bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-2 mb-5 pb-2 border-b border-gray-100">
                    <i class="fas fa-briefcase text-Primary-dark text-2xl"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Perfil Profissional</h3>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Título Profissional <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="professional_title"
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out"
                            placeholder="Ex: Eletricista, Designer, Redator" required>
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
                            <label class="bloc text-sm font-medium text-gray-700 mb-4">Selecione seus serviços</label>

                            <div class="flex flex-wrap gap-2">
                                @foreach ($skills as $skill)
                                    <button type="button"
                                        @click="toggleSkill({{ $skill->id }}, '{{ $skill->skill_name }}')"
                                        :class="selectedSkills.some(s => s.id === {{ $skill->id }})
                                            ? 'bg-Primary-dark text-white border-Primary-dark'
                                            : 'bg-white text-gray-700 border-gray-300 hover:bg-Primary-light'"
                                        class="px-4 py-2 rounded-full border text-sm transition cursor-pointer duration-150">
                                        <span x-text="selectedSkills.find(s => s.id === {{ $skill->id }}) ? '✓' : '+'"></span>
                                        {{ $skill->skill_name }}
                                    </button>
                                @endforeach
                            </div>

                            <div class=" min-h-16 p-4 rounded-xl bg-gray-50 border-2 border-dashed border-Primary flex flex-wrap gap-2">
                                <template x-if="selectedSkills.length === 0">
                                    <span class="text-gray-400 text-sm">Nenhuma habilidade selecionada...</span>
                                </template>

                                <template x-for="skill in selectedSkills" :key="skill.id">
                                    <div class="flex items-center gap-2 px-3 py-1.5 bg-Primary-dark text-white rounded-lg text-sm animate-in fade-in zoom-in duration-200">
                                        <span x-text="skill.name"></span>

                                        <input type="hidden" name="skills[]" :value="skill.id">
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Link de Portfólio ou LinkedIn
                        </label>
                        <input type="url" name="portfolio_link"
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out"
                            placeholder="https://seusite.com">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Breve Bio / Resumo de Experiência
                        </label>
                        <textarea rows="4" name="bio"
                            class="form-textarea w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white resize-none border border-gray-200 focus:outline-0 focus:border-Primary-dark transition duration-150 ease-in-out"
                            placeholder="Conte um pouco sobre sua experiência, habilidades e objetivos profissionais..."></textarea>
                    </div>
                </div>
            </div>

            <!-- Termos e Condições -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-start gap-3">
                    <input type="checkbox" name="terms" class="mt-0.5 accent-Primary cursor-pointer" required>
                    <label for="terms" class="text-sm text-gray-600">
                        Concordo com os <a href="#" class="text-Primary-dark font-medium">Termos de Uso</a>
                        e <a href="#" class="text-Primary-dark font-medium">Política de Privacidade</a>
                    </label>

                    @error('terms')
                        <div class="mt-2 text-sm text-Danger bg-red-50 p-3 rounded-lg border border-Danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <!-- Botões de Ação -->
            <div class="flex gap-3 pt-4">
                <a href="{{ route('register') }}"
                    class="flex-1 text-center px-6 py-3 rounded-xl border border-gray-300 text-gray-700 font-medium hover:bg-gray-50 transition cursor-pointer">
                    Cancelar</a>

                <button type="submit"
                    class="btn-primary flex-1 px-6 py-3 rounded-xl text-white font-medium bg-Primary-dark cursor-pointer hover:bg-Primary transition duration-200">
                    <i class="fas fa-check-circle mr-2"></i>
                    Criar Perfil
                </button>
            </div>
        </form>

        <!-- Footer -->
        <div class="text-center mt-8">
            <p class="text-xs text-gray-400">
                © 2024 WorkVale - Conectando talentos, impulsionando negócios.
            </p>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#cpf').mask('000.000.000-00');

            $('#phone_number').mask('(00) 00000-0000');
        })
    </script>
</body>

</html>
