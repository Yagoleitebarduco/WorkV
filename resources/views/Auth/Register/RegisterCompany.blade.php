<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>WorkVale | Cadastro de Empresa</title>
    <!-- TailwindCSS CDN + Font Awesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        :root {
            --primary-dark: #6A2698;
            --primary-medium: #5A1D80;
            --primary-light: #E2D4F0;
            --accent-yellow: #FFC107;
            --accent-green: #6ECB63;
            --accent-red: #FF6B6B;
            --bg-light: #F8F9FA;
            --text-dark: #343A40;
            --text-gray: #6c757d;
            --white: #FFFFFF;
            --border-color: #e5e7eb;
        }

        .form-input,
        .form-select,
        .form-textarea {
            transition: all 0.2s ease;
            border: 1px solid var(--border-color);
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: var(--primary-dark);
            box-shadow: 0 0 0 3px rgba(106, 38, 152, 0.1);
        }

        .step-indicator {
            transition: all 0.3s ease;
        }

        .step-indicator.active {
            background: var(--primary-dark);
            color: white;
        }

        .step-indicator.completed {
            background: var(--accent-green);
            color: white;
        }

        .btn-primary {
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(106, 38, 152, 0.3);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-secondary {
            transition: all 0.2s ease;
        }

        .btn-secondary:hover {
            background: var(--primary-light);
            transform: translateY(-1px);
        }

        .info-badge {
            background: var(--primary-light);
            color: var(--primary-dark);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-section {
            animation: fadeIn 0.4s ease-out forwards;
        }

        .password-strength {
            height: 4px;
            transition: all 0.3s ease;
        }

        .strength-weak {
            width: 33%;
            background: var(--accent-red);
        }

        .strength-medium {
            width: 66%;
            background: var(--accent-yellow);
        }

        .strength-strong {
            width: 100%;
            background: var(--accent-green);
        }
    </style>
</head>

<body style="background: linear-gradient(135deg, var(--bg-light) 0%, #f0eef3 100%); font-family: 'Inter', sans-serif;">

    <div class="max-w-2xl mx-auto px-4 py-6 pb-24">

        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-block">
                <h1 class="text-3xl font-bold"
                    style="background: linear-gradient(135deg, var(--primary-dark), var(--primary-medium)); -webkit-background-clip: text; background-clip: text; color: transparent;">
                    Work<span style="color: var(--primary-dark);">Vale</span>
                </h1>
            </div>
            <h2 class="text-xl font-semibold text-gray-800 mt-3">Cadastro de Empresa</h2>
            <p class="text-sm text-gray-500 mt-1">Preencha os dados da sua empresa</p>
        </div>

        <!-- Steps Indicator -->
        <div class="flex justify-between items-center mb-8 max-w-md mx-auto">
            <div
                class="step-indicator active w-8 h-8 rounded-full bg-primary-dark text-white flex items-center justify-center text-sm font-semibold">
                1</div>
            <div class="flex-1 h-0.5 bg-gray-200 mx-2"></div>
            <div
                class="step-indicator w-8 h-8 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center text-sm font-semibold">
                2</div>
            <div class="flex-1 h-0.5 bg-gray-200 mx-2"></div>
            <div
                class="step-indicator w-8 h-8 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center text-sm font-semibold">
                3</div>
        </div>

        <form id="registerForm" class="space-y-8">

            <!-- Seção 1: Dados do Negócio -->
            <div class="form-section bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-2 mb-5 pb-2 border-b border-gray-100">
                    <i class="fas fa-building" style="color: var(--primary-dark); font-size: 1.25rem;"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Dados do Negócio</h3>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Razão Social ou Nome Fantasia <span class="text-red-500">*</span>
                        </label>
                        <input type="text" class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white"
                            placeholder="Nome da empresa" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            CNPJ ou CPF <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="documentInput"
                            class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white"
                            placeholder="00.000.000/0000-00 ou 000.000.000-00" required>
                        <div class="flex items-center gap-2 mt-1">
                            <i class="fas fa-info-circle text-xs" style="color: var(--primary-dark);"></i>
                            <p class="text-xs text-gray-400">Para pequenos produtores/empreendedores individuais</p>
                        </div>
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
                </div>
            </div>

            <!-- Seção 2: Sobre a Empresa -->
            <div class="form-section bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-2 mb-5 pb-2 border-b border-gray-100">
                    <i class="fas fa-info-circle" style="color: var(--primary-dark); font-size: 1.25rem;"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Sobre a Empresa</h3>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Pequena descrição da empresa <span class="text-red-500">*</span>
                    </label>
                    <textarea rows="5" class="form-textarea w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white resize-none"
                        placeholder="Descreva sua empresa, missão, valores e área de atuação..." required></textarea>
                    <p class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                        <i class="fas fa-file-alt"></i> Esta descrição aparecerá nas vagas postadas
                    </p>
                </div>
            </div>

            <!-- Seção 3: Segurança -->
            <div class="form-section bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-2 mb-5 pb-2 border-b border-gray-100">
                    <i class="fas fa-lock" style="color: var(--primary-dark); font-size: 1.25rem;"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Segurança</h3>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Senha <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="password" id="password"
                                class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white pr-10"
                                placeholder="Crie uma senha segura" required>
                            <button type="button"
                                class="toggle-password absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <i class="far fa-eye"></i>
                            </button>
                        </div>
                        <div class="mt-2">
                            <div class="password-strength rounded-full bg-gray-200"></div>
                            <p class="text-xs text-gray-400 mt-1" id="strengthText">Use pelo menos 8 caracteres com
                                letras e números</p>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Confirmar Senha <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="password" id="confirmPassword"
                                class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white pr-10"
                                placeholder="Digite a senha novamente" required>
                            <button type="button"
                                class="toggle-password absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <i class="far fa-eye"></i>
                            </button>
                        </div>
                        <p id="passwordMatch" class="text-xs mt-1 hidden"></p>
                    </div>
                </div>
            </div>

            <!-- Seção 4: Contato Responsável -->
            <div class="form-section bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-2 mb-5 pb-2 border-b border-gray-100">
                    <i class="fas fa-user-tie" style="color: var(--primary-dark); font-size: 1.25rem;"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Contato Responsável</h3>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nome do Responsável/Recrutador <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                            class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white"
                            placeholder="Nome completo do responsável" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            E-mail Corporativo <span class="text-red-500">*</span>
                        </label>
                        <input type="email"
                            class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white"
                            placeholder="empresa@email.com" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Telefone de Contato da Empresa <span class="text-red-500">*</span>
                        </label>
                        <input type="tel" id="phoneInput"
                            class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white"
                            placeholder="(13) 3333-3333" required>
                    </div>
                </div>
            </div>

            <!-- Seção 5: Localização -->
            <div class="form-section bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center gap-2 mb-5 pb-2 border-b border-gray-100">
                    <i class="fas fa-map-marker-alt" style="color: var(--primary-dark); font-size: 1.25rem;"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Localização</h3>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Cidade Sede <span class="text-red-500">*</span>
                        </label>
                        <select class="form-select w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white" required>
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
                        <input type="text"
                            class="form-input w-full px-4 py-2.5 rounded-lg bg-gray-50 focus:bg-white"
                            placeholder="Rua, número, complemento" required>
                    </div>
                </div>
            </div>

            <!-- Termos e Condições -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-start gap-3">
                    <input type="checkbox" id="terms" class="w-5 h-5 rounded border-gray-300"
                        style="accent-color: var(--primary-dark);" required>
                    <label for="terms" class="text-sm text-gray-600">
                        Concordo com os <a href="#" class="font-medium"
                            style="color: var(--primary-dark);">Termos de Uso</a> e
                        <a href="#" class="font-medium" style="color: var(--primary-dark);">Política de
                            Privacidade</a> da WorkVale
                    </label>
                </div>
            </div>

            <!-- Botões de Ação -->
            <div class="flex gap-3 pt-4">
                <button type="button"
                    class="btn-secondary flex-1 px-6 py-3 rounded-xl border border-gray-300 text-gray-700 font-medium hover:bg-gray-50 transition">
                    Cancelar
                </button>
                <button type="submit" class="btn-primary flex-1 px-6 py-3 rounded-xl text-white font-medium"
                    style="background: var(--primary-dark);">
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
        // Detectar se é CNPJ ou CPF e aplicar máscara correta
        const documentInput = document.getElementById('documentInput');
        if (documentInput) {
            documentInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');

                if (value.length <= 11) {
                    // CPF
                    value = value.replace(/(\d{3})(\d)/, '$1.$2');
                    value = value.replace(/(\d{3})(\d)/, '$1.$2');
                    value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
                } else {
                    // CNPJ
                    value = value.replace(/^(\d{2})(\d)/, '$1.$2');
                    value = value.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
                    value = value.replace(/\.(\d{3})(\d)/, '.$1/$2');
                    value = value.replace(/(\d{4})(\d)/, '$1-$2');
                }

                e.target.value = value;
            });
        }

        // Máscara para telefone
        const phoneInput = document.getElementById('phoneInput');
        if (phoneInput) {
            phoneInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length <= 10) {
                    value = value.replace(/(\d{2})(\d)/, '($1) $2');
                    value = value.replace(/(\d{4})(\d)/, '$1-$2');
                } else {
                    value = value.replace(/(\d{2})(\d)/, '($1) $2');
                    value = value.replace(/(\d{5})(\d)/, '$1-$2');
                }
                e.target.value = value;
            });
        }

        // Força da senha
        const passwordInput = document.getElementById('password');
        const strengthBar = document.querySelector('.password-strength');
        const strengthText = document.getElementById('strengthText');

        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;

            if (password.length >= 8) strength++;
            if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
            if (password.match(/[0-9]/)) strength++;
            if (password.match(/[^a-zA-Z0-9]/)) strength++;

            strengthBar.className = 'password-strength rounded-full';

            if (password.length === 0) {
                strengthBar.style.width = '0';
                strengthText.innerHTML = 'Use pelo menos 8 caracteres com letras e números';
                strengthText.style.color = '#6c757d';
            } else if (strength <= 1) {
                strengthBar.classList.add('strength-weak');
                strengthText.innerHTML = 'Senha fraca - use mais caracteres';
                strengthText.style.color = 'var(--accent-red)';
            } else if (strength === 2) {
                strengthBar.classList.add('strength-medium');
                strengthText.innerHTML = 'Senha média - adicione símbolos para maior segurança';
                strengthText.style.color = 'var(--accent-yellow)';
            } else if (strength >= 3) {
                strengthBar.classList.add('strength-strong');
                strengthText.innerHTML = 'Senha forte!';
                strengthText.style.color = 'var(--accent-green)';
            }

            checkPasswordMatch();
        });

        // Confirmar senha
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const passwordMatchMsg = document.getElementById('passwordMatch');

        function checkPasswordMatch() {
            const password = passwordInput.value;
            const confirm = confirmPasswordInput.value;

            if (confirm.length > 0) {
                if (password === confirm) {
                    passwordMatchMsg.innerHTML = '<i class="fas fa-check-circle"></i> As senhas coincidem';
                    passwordMatchMsg.style.color = 'var(--accent-green)';
                    passwordMatchMsg.classList.remove('hidden');
                } else {
                    passwordMatchMsg.innerHTML = '<i class="fas fa-exclamation-circle"></i> As senhas não coincidem';
                    passwordMatchMsg.style.color = 'var(--accent-red)';
                    passwordMatchMsg.classList.remove('hidden');
                }
            } else {
                passwordMatchMsg.classList.add('hidden');
            }
        }

        confirmPasswordInput.addEventListener('input', checkPasswordMatch);

        // Toggle password visibility
        const toggleButtons = document.querySelectorAll('.toggle-password');
        toggleButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const input = this.parentElement.querySelector('input');
                const icon = this.querySelector('i');

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });

        // Submit do formulário
        const form = document.getElementById('registerForm');
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.style.borderColor = 'var(--accent-red)';
                    isValid = false;
                } else {
                    field.style.borderColor = 'var(--border-color)';
                }
            });

            if (passwordInput.value !== confirmPasswordInput.value) {
                alert('As senhas não coincidem');
                isValid = false;
            }

            if (passwordInput.value.length < 6) {
                alert('A senha deve ter pelo menos 6 caracteres');
                isValid = false;
            }

            if (!document.getElementById('terms').checked) {
                alert('Você precisa concordar com os Termos de Uso');
                isValid = false;
            }

            if (isValid) {
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Cadastrando...';
                submitBtn.disabled = true;

                setTimeout(() => {
                    alert('Empresa cadastrada com sucesso! Redirecionando para o painel...');
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 1500);
            }
        });

        // Remover erro ao digitar
        const inputs = document.querySelectorAll('input, textarea, select');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                this.style.borderColor = 'var(--border-color)';
            });
        });
    </script>
</body>

</html>
