<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>WorkVale | Cadastro de Empresa</title>
    <!-- TailwindCSS CDN + Font Awesome -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <!-- jQuery e Mask Plugin -->
    <script src="https://code.jquery.com/jquery-4.0.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
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

        <form id="registerForm" class="space-y-8">

            <!-- Seção 1: Dados do Negócio -->
            <div class="form-section bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-2 mb-5 pb-2 border-b border-gray-100">
                    <i class="fas fa-building text-xl text-Primary-dark"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Dados do Negócio</h3>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Razão Social ou Nome Fantasia <span class="text-red-500">*</span>
                        </label>

                        <input type="text" name="razao_social" class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white"
                            placeholder="Nome da empresa" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            CNPJ ou CPF <span class="text-red-500">*</span>
                        </label>

                        <input type="text" id="cnpj_cpf" name="documento"
                            class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white"
                            placeholder="00.000.000/0000-00 ou 000.000.000-00" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Área de Atuação <span class="text-red-500">*</span>
                        </label>

                        <select class="form-select w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white" required>
                            <option value="">Selecione a área de atuação</option>
                            <option>Tecnologia da Informação</option>
                            <option>Construção Civil</option>
                            <option>Comércio Varejista</option>
                            <option>Serviços Gerais</option>
                            <option>Alimentação</option>
                            <option>Eventos</option>
                            <option>Marketing e Publicidade</option>
                            <option>Consultoria</option>
                            <option>Educação</option>
                            <option>Saúde</option>
                            <option>Agronegócio</option>
                            <option>Transporte e Logística</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Senha <span class="text-red-500">*</span>
                        </label>
                        <div>
                            <input type="password" id="password" name="password"
                                class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white pr-10"
                                placeholder="Crie uma senha segura" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Seção 2: Sobre a Empresa -->
            <div class="form-section bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-2 mb-5 pb-2 border-b border-gray-100">
                    <i class="fas fa-info-circle text-sm text-Primary-dark"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Sobre a Empresa</h3>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Pequena descrição da empresa <span class="text-red-500">*</span>
                    </label>

                    <textarea name="descricao" rows="5" class="form-textarea w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white resize-none"
                        placeholder="Descreva sua empresa, missão, valores e área de atuação..." required></textarea>
                </div>
            </div>

            <!-- Seção 4: Contato Responsável -->
            <div class="form-section bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-2 mb-5 pb-2 border-b border-gray-100">
                    <i class="fas fa-user-tie text-lg text-Primary-dark"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Contato Responsável</h3>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nome do Responsável/Recrutador <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nome_responsavel" class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white"
                            placeholder="Nome completo do responsável" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            E-mail Corporativo <span class="text-red-500">*</span>
                        </label>
                        <input type="email" name="email" class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white"
                            placeholder="empresa@email.com" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Telefone de Contato da Empresa <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="telefone" id="phone_number"
                            class="w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white"
                            placeholder="(99) 99999-9999" required>
                    </div>
                </div>
            </div>

            <!-- Seção 5: Localização -->
            <div class="form-section bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-2 mb-5 pb-2 border-b border-gray-100">
                    <i class="fas fa-map-marker-alt text-lg text-Primary-dark"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Localização</h3>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Cidade Sede <span class="text-red-500">*</span>
                        </label>

                        <select  class="form-select w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white"  required name="cidade">
                            <option value="">Selecione a cidade sede</option>
                            <option>Registro</option>
                            <option>Juquiá</option>
                            <option>Miracatu</option>
                            <option>Iguape</option>
                            <option>Cananéia</option>
                            <option>Ilha Comprida</option>
                            <option>Jacupiranga</option>
                            <option>Cajati</option>
                            <option>Pariquera-Açu</option>
                            <option>Eldorado</option>
                            <option>São Paulo</option>
                            <option>Santos</option>
                            <option>Curitiba</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Endereço Completo <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="endereco" class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white"
                            placeholder="Rua, número, complemento" required>
                    </div>
                </div>
            </div>

            <!-- Termos e Condições -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-start gap-3">
                    <input type="checkbox" name="termos" id="terms" class="w-5 h-5 rounded border-gray-300 accent-Primary"
                        required>

                    <label for="terms" class="text-sm text-gray-600">
                        Concordo com os
                        <a href="#" class="font-medium text-Primary">
                            Termos de Uso
                        </a> e
                        <a href="#" class="font-medium text-Primary">
                            Política de Privacidade
                        </a>
                    </label>
                </div>
            </div>

            <!-- Botões de Ação -->
            <div class="flex gap-3 pt-4">
                <a href="{{ route('login') }}"
                    class="text-center bg-white flex-1 px-6 py-3 rounded-xl border border-gray-300 text-gray-700 font-medium hover:bg-gray-50 transition">
                    Cancelar
                </a>

                <button type="submit" class="flex-1 px-6 py-3 rounded-xl text-white font-medium bg-Primary-dark">
                    <i class="fas fa-check-circle mr-2"></i>
                    Cadastrar Empresa
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
        /**
         * jQuery Plugin: maskCPF_CNPJ
         * Versão simples - Apenas aplica máscara de pontos e barras
         * 
         * Uso: $('#input').maskCPF_CNPJ();
         */

        (function($) {
            $.fn.maskCPF_CNPJ = function() {

                function cleanNumbers(value) {
                    return value.replace(/\D/g, '');
                }

                function formatCPF(value) {
                    var numbers = cleanNumbers(value);
                    if (numbers.length <= 3) return numbers;
                    if (numbers.length <= 6) return numbers.replace(/(\d{3})(\d)/, '$1.$2');
                    if (numbers.length <= 9) return numbers.replace(/(\d{3})(\d{3})(\d)/, '$1.$2.$3');
                    return numbers.replace(/(\d{3})(\d{3})(\d{3})(\d{1,2})/, '$1.$2.$3-$4');
                }

                function formatCNPJ(value) {
                    var numbers = cleanNumbers(value);
                    if (numbers.length <= 2) return numbers;
                    if (numbers.length <= 5) return numbers.replace(/(\d{2})(\d)/, '$1.$2');
                    if (numbers.length <= 8) return numbers.replace(/(\d{2})(\d{3})(\d)/, '$1.$2.$3');
                    if (numbers.length <= 12) return numbers.replace(/(\d{2})(\d{3})(\d{3})(\d)/, '$1.$2.$3/$4');
                    return numbers.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{1,2})/, '$1.$2.$3/$4-$5');
                }

                return this.each(function() {
                    var $input = $(this);

                    $input.on('input', function() {
                        var value = $input.val();
                        var numbers = cleanNumbers(value);
                        var formatted = '';

                        if (numbers.length <= 11) {
                            formatted = formatCPF(numbers);
                        } else {
                            formatted = formatCNPJ(numbers);
                        }

                        $input.val(formatted);
                    });
                });
            };

        })(jQuery);

        $(document).ready(function() {
            $('#cnpj_cpf').maskCPF_CNPJ();

            $('#phone_number').mask('(00) 00000-0000');
        })
    </script>
</body>

</html>
