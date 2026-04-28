<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>WorkVale | Login</title>
    <!-- TailwindCSS CDN + Font Awesome -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-linear-to-t from-Primary-light to-gray-200 font-sans">
    <div class="min-h-screen flex items-center justify-center px-4 py-8 relative overflow-hidden">

        <!-- Elementos decorativos flutuantes -->
        <div class="absolute rounded-[50%] z-0 w-96 h-96 top-20 -left-48 opacity-30"></div>
        <div class="absolute rounded-[50%] z-0 w-80 h-80 bottom-20 -right-48 opacity-20"></div>

        <!-- Container do Login -->
        <div class="login-container max-w-md w-full relative z-10">

            <!-- Logo e Header -->
            <div class="text-center mb-8">
                <div class="inline-block">
                    <h1 class="text-4xl font-extrabold text-Primary">
                        Work<span class=" text-Primary-dark">Vale</span>
                    </h1>
                </div>
                <p class="text-sm text-gray-500 mt-2">Conectando talentos, impulsionando negócios.</p>
            </div>

            <!-- Card de Login -->
            <div class="bg-white rounded-2xl shadow-xl p-8">

                <div class="text-center mb-5">
                    <h2 class="text-2xl font-bold text-Dark">Bem-vindo de volta</h2>
                    <p class="text-sm text-gray-500 mt-1">Acesse sua conta para continuar</p>
                </div>

                @if ($errors->any())
                    <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form id="loginForm" method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Campo E-mail -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            E-mail
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400 text-sm"></i>
                            </div>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:bg-white focus:border-Primary-dark focus:outline-0 focus:border-2 transition duration-150 ease-in-out"
                                placeholder="seu@email.com" required>
                        </div>
                    </div>

                    <!-- Campo Senha -->
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Senha
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400 text-sm"></i>
                            </div>
                            <input type="password" id="password" name="password"
                                class="w-full pl-10 pr-12 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:bg-white focus:border-Primary-dark focus:outline-0 focus:border-2 transition duration-150 ease-in-out"
                                placeholder="Digite sua senha" required>
                            <button type="button"
                                class="toggle-password absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                                <i class="far fa-eye text-gray-400 hover:text-Primary"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Opções adicionais -->
                    <div class="flex justify-between items-center mb-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="h-3 w-3 accent-Primary">
                            <span class="text-sm text-gray-600">Lembrar-me</span>
                        </label>
                        <a href="#" class="text-sm font-medium text-Primary-dark">Esqueceu a
                            senha?</a>
                    </div>

                    <!-- Botão Login -->
                    <button type="submit"
                        class="bg-linear-to-r from-Primary-dark to-Primary w-full py-3 rounded-xl text-white font-semibold text-base hover:transform hover:-translate-y-0.5 transition duration-200 ease-in-out hover:shadow-2xl hover:-translate-x-0.5">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Entrar
                    </button>
                </form>

                <!-- Link para cadastro -->
                <div class="text-center mt-6 pt-4 border-t border-gray-100">
                    <p class="text-sm text-gray-600">
                        Não tem uma conta?
                        <a href="{{ route('register') }}" id="signupLink"
                            class="font-semibold py-1rounded-2xl text-Primary-dark">
                            Cadastre-se
                        </a>
                    </p>
                    <p class="text-sm text-gray-600 mt-2">
                        É uma empresa?
                        <a href="{{ route('company.login') }}" class="font-semibold text-Primary-dark">
                            Acesse o login empresarial
                        </a>
                    </p>
                    <div class="flex justify-center gap-4 mt-3 text-xs text-gray-400">
                        <a href="#" class="hover:text-gray-600">Termos de Uso</a>
                        <span>•</span>
                        <a href="#" class="hover:text-gray-600">Política de Privacidade</a>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-6">
                <p class="text-xs text-gray-400">
                    © 2024 WorkVale - Todos os direitos reservados
                </p>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        const togglePasswordBtn = document.querySelector('.toggle-password');
        const passwordInput = document.getElementById('password');

        togglePasswordBtn.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            const icon = this.querySelector('i');
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>
