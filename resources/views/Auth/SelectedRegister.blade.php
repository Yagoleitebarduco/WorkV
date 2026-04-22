<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>WorkVale | Escolha seu Perfil</title>
    <!-- TailwindCSS CDN + Font Awesome -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-linear-to-r from-Light to-Primary-light min-h-screen font-sans">

    <div class="min-h-screen flex items-center justify-center px-4 py-8">

        <div class="max-w-5xl w-full">
            <!-- Header -->
            <div class="text-center mb-10">
                <div class="inline-block mb-4">
                    <div>
                        <h1 class="text-4xl font-extrabold text-Primary">
                            Work<span class="text-Primary-dark">Vale</span>
                        </h1>
                    </div>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Crie sua conta</h2>
                <p class="text-gray-500">Escolha o tipo de perfil que melhor se adequa a você</p>
            </div>

            <!-- Cards de Seleção -->
            <div class="grid md:grid-cols-2 gap-6 mb-8">

                <!-- Card Freelancer -->
                <div class="bg-white rounded-2xl p-6 text-center">
                    <div class="relative">
                        <div
                            class="w-24 h-24 mx-auto mb-4 rounded-full flex items-center justify-center pulse-icon bg-linear-to-r from-Primary to-Primary-dark">
                            <i class="fas fa-user-astronaut text-4xl text-white"></i>
                        </div>
                    </div>

                    <h3 class="text-xl font-bold text-gray-800 mb-2">Freelancer</h3>
                    <p class="text-gray-500 text-sm mb-4">Ofereça seus serviços e encontre oportunidades de trabalho</p>

                    <div class="space-y-2 text-left mb-4">
                        <div class="feature-item flex items-center gap-2 text-sm text-gray-600">
                            <i class="fas fa-check-circle text-xs text-Success"></i>
                            <span>Encontre trabalhos na sua área</span>
                        </div>
                        <div class="feature-item flex items-center gap-2 text-sm text-gray-600">
                            <i class="fas fa-check-circle text-xs text-Success"></i>
                            <span>Gerencie seus ganhos e pagamentos</span>
                        </div>
                        <div class="feature-item flex items-center gap-2 text-sm text-gray-600">
                            <i class="fas fa-check-circle text-xs text-Success"></i>
                            <span>Construa seu portfólio e reputação</span>
                        </div>
                        <div class="feature-item flex items-center gap-2 text-sm text-gray-600">
                            <i class="fas fa-check-circle text-xs text-Success"></i>
                            <span>Receba avaliações de clientes</span>
                        </div>
                    </div>

                    <div class="flex mt-8 text-center">
                        <a href="{{ route('register.freelancer') }}"
                            class="p-3 w-full rounded-xl bg-Primary-light text-sm font-medium text-Primary-dark cursor-pointer">
                            Cadastre-se
                        </a>
                    </div>
                </div>


                <!-- Card Empresa -->
                <div class="bg-white rounded-2xl p-6 text-center"">
                    <div class="relative">
                        <div
                            class="w-24 h-24 mx-auto mb-4 rounded-full flex items-center justify-center pulse-icon bg-linear-to-r from-Primary to-Primary-dark">
                            <i class="fas fa-building text-4xl text-white"></i>
                        </div>
                    </div>

                    <h3 class="text-xl font-bold text-gray-800 mb-2">Empresa</h3>
                    <p class="text-gray-500 text-sm mb-4">Encontre talentos qualificados para sua empresa ou negócio</p>

                    <div class="space-y-2 text-left mb-4">
                        <div class="feature-item flex items-center gap-2 text-sm text-gray-600">
                            <i class="fas fa-check-circle text-xs text-Success"></i>
                            <span>Publique vagas e encontre profissionais</span>
                        </div>
                        <div class="feature-item flex items-center gap-2 text-sm text-gray-600">
                            <i class="fas fa-check-circle text-xs text-Success"></i>
                            <span>Gerencie projetos e pagamentos</span>
                        </div>
                        <div class="feature-item flex items-center gap-2 text-sm text-gray-600">
                            <i class="fas fa-check-circle text-xs text-Success"></i>
                            <span>Acesse talentos verificados</span>
                        </div>
                        <div class="feature-item flex items-center gap-2 text-sm text-gray-600">
                            <i class="fas fa-check-circle text-xs text-Success"></i>
                            <span>Dashboard com métricas da empresa</span>
                        </div>
                    </div>

                    <div class="flex mt-8 text-center">
                        <a href="{{ route('register.company') }}"
                            class="p-3 w-full rounded-xl bg-Primary-light text-sm font-medium text-Primary-dark cursor-pointer">
                            Cadastre-se
                        </a>
                    </div>
                </div>
            </div>

            <!-- Link para Login -->
            <div class="text-center mt-6">
                <p class="text-sm text-gray-500">
                    Já tem uma conta?
                    <a href="{{ route('login') }}" class="font-semibold" style="color: var(--primary-dark);">Faça login</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>
