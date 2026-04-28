<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>WorkVale | Login Empresa</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-linear-to-t from-Primary-light to-gray-200 font-sans">
    <div class="min-h-screen flex items-center justify-center px-4 py-8 relative overflow-hidden">
        <div class="absolute rounded-[50%] z-0 w-96 h-96 top-20 -left-48 opacity-30"></div>
        <div class="absolute rounded-[50%] z-0 w-80 h-80 bottom-20 -right-48 opacity-20"></div>

        <div class="login-container max-w-md w-full relative z-10">
            <div class="text-center mb-8">
                <div class="inline-block">
                    <h1 class="text-4xl font-extrabold text-Primary">
                        Work<span class=" text-Primary-dark">Vale</span>
                    </h1>
                </div>
                <p class="text-sm text-gray-500 mt-2">Acesso exclusivo para empresas</p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-8">
                <div class="text-center mb-5">
                    <h2 class="text-2xl font-bold text-Dark">Login da Empresa</h2>
                    <p class="text-sm text-gray-500 mt-1">Entre para acessar seu dashboard</p>
                </div>

                @if ($errors->any())
                    <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('company.login.perform') }}">
                    @csrf
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2">E-mail da empresa</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-building text-gray-400 text-sm"></i>
                            </div>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:bg-white focus:border-Primary-dark focus:outline-0 focus:border-2 transition duration-150 ease-in-out"
                                placeholder="empresa@email.com" required>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Senha</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400 text-sm"></i>
                            </div>
                            <input type="password" name="password"
                                class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:bg-white focus:border-Primary-dark focus:outline-0 focus:border-2 transition duration-150 ease-in-out"
                                placeholder="Digite sua senha" required>
                        </div>
                    </div>

                    <button type="submit"
                        class="bg-linear-to-r from-Primary-dark to-Primary w-full py-3 rounded-xl text-white font-semibold text-base hover:shadow-2xl transition duration-200">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Entrar como Empresa
                    </button>
                </form>

                <div class="text-center mt-6 pt-4 border-t border-gray-100">
                    <p class="text-sm text-gray-600">
                        É freelancer?
                        <a href="{{ route('login') }}" class="font-semibold text-Primary-dark">Acesse aqui</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
