@extends('Layouts.app')
@section('title')
    Início
@endsection


@section('header')
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-white text-3xl font-bold tracking-wide">
                Work<span class="text-Secondary">Vale</span>
            </h1>
            <p class=" text-xs text-gray-200 mt-1">Conectando
                talentos, impulsionando negócios.</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="#" class="bg-white/20 rounded-xl p-2 cursor-pointer transition duration-400">
                <i class="far fa-bell text-lg text-white"></i>
            </a>
            <a href="#" class="bg-Secondary rounded-xl p-2 cursor-pointer transition duration-400">
                <i class="far fa-user-circle text-lg text-black "></i>
            </a>
        </div>
    </div>

    <!-- Saudação Profissional -->
    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-white mb-1">
            Olá, <span class=" font">{{ Auth::user()->complete_name }}</span>
        </h2>

        <div>
            <form action="{{ route('logout') }}" method="post" class="mx-2 p-2 w-20 rounded-2xl text-black bg-Primary-light  text-center">
                @csrf
                <button type="submit" class="cursor-pointer">
                    Sair
                </button>
            </form>
            
        </div>
        <p class="text-xs text-gray-300">3 novos desafios disponíveis para você</p>
    </div>

    <!-- Cards de Métricas -->
    <div class="grid grid-cols-3 gap-3">
        <div class="bg-gray-100/20 rounded-xl p-3 text-center">
            <i class="fas fa-folder-open text-Secondary text-base"></i>
            <p class="text-white text-lg font-semibold mt-1">12</p>
            <p class="text-white/70 text-xs">Projetos</p>
        </div>

        <div class="bg-gray-100/20 rounded-xl p-3 text-center">
            <i class="fas fa-award text-Secondary text-base"></i>
            <p class="text-white text-lg font-semibold mt-1">8</p>
            <p class="text-white/70 text-xs">Conquistas</p>
        </div>

        <div class="bg-gray-100/20 rounded-xl p-3 text-center">
            <i class="fas fa-chart-line text-Secondary text-base"></i>
            <p class="text-white text-lg font-semibold mt-1">R$ 4.8k</p>
            <p class="text-white/70 text-xs">Ganhos</p>
        </div>
    </div>
@endsection


@section('content')
    <!-- Seção de Destaque -->
    <div class="flex justify-between items-center mb-4">
        <div>
            <h3 class="text-lg font-semibold text-Dark">Desafios em Destaque</h3>
            <p class="text-xs text-gray-500 mt-1">Oportunidades de alto valor</p>
        </div>

        <span class="bg-Primary-light text-Primary-dark px-3 py-1 rounded-md text-xs font-medium">
            3 novos
        </span>
    </div>

    <div class="space-y-3">
        <!-- Card 1 -->
        <div class="bg-white rounded-xl p-4 border border-gray-300 shadow-">
            <div class="flex justify-between items-start mb-1">
                <div class="flex justify-between items-center w-full">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="bg-Secondary text-black text-xs font-medium px-2 py-1 rounded-lg">
                            Prioridade
                        </span>
                        <span class="bg-Primary text-white text-xs font-medium px-2 py-1 rounded-lg">
                            Remoto
                        </span>
                    </div>

                    <span class="bg-Primary-light px-4 py-0.5 rounded-xl text-center">
                        <span class=" text-Primary-dark text-xs font-medium">Cores</span>
                    </span>
                </div>
            </div>

            <div class="mb-2">
                <h4 class=" font-bold text-Dark text-xl">
                    Desenvolvedor Java
                </h4>
                <p class="text-xs text-gray-500 mt-1">
                    <i class="fas fa-building w-4 mr-1"></i>
                    Agência: Consulta SP
                </p>
            </div>

            <div class="flex items-center gap-3 mb-3">
                <div class="flex items-center gap-1">
                    <i class="fas fa-star text-Secondary text-sm"></i>
                    <i class="fas fa-star text-Secondary text-sm"></i>
                    <i class="fas fa-star text-Secondary text-sm"></i>
                    <i class="fas fa-star text-Secondary text-sm"></i>
                    <i class="fas fa-star-half-alt text-Secondary text-sm"></i>
                    <span class="text-xs text-gray-500 ml-1">(48)</span>
                </div>
            </div>

            <div class="flex justify-between items-center">
                <div>
                    <p class="text-lg font-bold text-Success">R$ 1.200</p>
                </div>

                <a href="#"
                    class="bg-Primary text-white px-4 py-2 rounded-lg font-medium hover:bg-Primary-dark transition-colors duration-300">
                    Ver detalhes <i class="fas fa-arrow-right text-xs ml-2"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Seção de Recomendações -->
    <div class="mt-8">
        <div class="flex justify-between items-center mb-4">
            <div>
                <h3 class="text-lg font-semibold text-Dark"">
                    Recomendados para você
                </h3>
                <p class="text-xs text-gray-500 mt-1">Baseado no seu perfil</p>
            </div>

            <a href="#"
                class="text-Dark text-xs font-medium decoration-0 hover:text-Primary-dark hover:text-base transition-all duration-200">
                Ver todos <i class="fas fa-arrow-right text-xs ml-2"></i>
            </a>
        </div>

        <div class="bg-white border border-gray-300 rounded-xl p-4 shadow-sm flex items-center gap-3 mb-3">
            <div class="bg-Primary-dark w-12 h-12 flex justify-center items-center rounded-xl">
                <i class="fas fa-code text-white text-xl"></i>
            </div>

            <div class="flex-1">
                <h4 class="font-bold text-Dark text-lg">
                    Arquiteto de Software
                </h4>

                <p class="text-xs text-gray-500">
                    TechLead Corp • Remoto
                </p>

                <p class="text-lg font-bold text-Success mt-2">
                    R$ 3.800
                </p>
            </div>

            <a href="#" class=" transform hover:scale-105 hover:translate-x-1.5 transition-all duration-300">
                <i class="fas fa-chevron-right text-Primary-dark text-lg"></i>
            </a>
        </div>
    </div>
@endsection