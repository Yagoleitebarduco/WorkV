@extends('Layouts.app')

@section('title', 'Dashboard Empresa - WorkVale')

@section('header')
    <div class="top-0 z-10 border-b border-gray-100 pb-4 py-3 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-white">
                Work<span class="text-Secondary">Vale</span>
            </h1>
        </div>

        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center">
                <i class="fas fa-bell text-gray-500 text-sm"></i>
            </div>
            <!-- Engrenagem de configurações -->
            <button id="settingsBtn" class="settings-btn w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center">
                <i class="fas fa-cog text-gray-600 text-sm"></i>
            </button>
        </div>
    </div>

    <!-- Saudação -->
    <div class="mt-4 mb-5">
        <h2 class="text-xl font-semibold text-white">Olá, {{ Auth::user()->representative_name }}</h2>
        <p class="text-xs text-gray-200">Empresa {{ Auth::user()->company_name }}</p>
    </div>

    <!-- Stats Cards (3 cards) -->
    <div class="grid grid-cols-3 gap-3 mb-6">
        <div class="stat-card bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">
            <div class="w-10 h-10 rounded-full flex items-center justify-center mx-auto mb-2 bg-Primary-light">
                <i class="fas fa-briefcase text-lg text-Primary"></i>
            </div>

            <p class="text-xl font-bold text-gray-800">{{ $vagasAtivas ?? 24 }}</p>
            <p class="text-xs text-gray-500">Vagas ativas</p>
        </div>

        <div class="stat-card bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">
            <div class="w-10 h-10 rounded-full flex items-center justify-center mx-auto mb-2 bg-Success/15">
                <i class="fas fa-users text-lg text-green-500"></i>
            </div>
            <p class="text-xl font-bold text-gray-800">{{ $totalCandidatos ?? 156 }}</p>
            <p class="text-xs text-gray-500">Candidatos</p>
        </div>

        <div class="stat-card bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">
            <div class="w-10 h-10 rounded-full flex items-center justify-center mx-auto mb-2 bg-Secondary/15">
                <i class="fas fa-check-circle text-lg text-yellow-500"></i>
            </div>
            <p class="text-xl font-bold text-gray-800">{{ $contratacoes ?? 89 }}</p>
            <p class="text-xs text-gray-500">Contratações</p>
        </div>
    </div>
@endsection

@section('content')
    <!-- Conteúdo Principal -->
    <div class="dashboard-content px-4 pb-20">

        <!-- Gráfico de Contratações por Mês -->
        <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 mb-6">
            <div class="flex justify-between items-center mb-3">
                <div>
                    <h3 class="font-semibold text-gray-800 text-sm">Contratações por Mês</h3>
                    <p class="text-xs text-gray-400">Últimos 6 meses</p>
                </div>
                <select id="anoSelect" class="text-xs border border-gray-200 rounded-lg px-2 py-1 bg-white">
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                </select>
            </div>
            <canvas id="hiringChart" height="180"></canvas>
        </div>

        <!-- Vagas Recentes -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 mb-6">
            <div class="p-4 border-b border-gray-100">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="font-semibold text-gray-800 text-sm">Vagas Recentes</h3>
                        <p class="text-xs text-gray-400">Últimas vagas publicadas</p>
                    </div>
                    <a href="#" class="text-xs text-Primary-dark">
                        Ver todas
                    </a>
                </div>

            </div>
            <div class="divide-y divide-gray-100">
                {{-- @forelse($vagasRecentes ?? [] as $vaga)
                    <div class="recent-item p-3 flex items-center justify-between">
                        <div>
                            <h4 class="font-medium text-gray-800 text-sm">{{ $vaga['titulo'] }}</h4>
                            <p class="text-xs text-gray-400 mt-0.5">{{ $vaga['candidatos'] }} candidatos • há
                                {{ $vaga['dias'] }} dias</p>
                        </div>
                        <span class="status-badge status-{{ $vaga['status'] }} text-xs">
                            {{ $vaga['status_texto'] }}
                        </span>
                    </div>
                @empty
                    <div class="p-4 text-center text-gray-500 text-sm">
                        Nenhuma vaga recente encontrada
                    </div>
                @endforelse --}}
            </div>

            <div class="p-3 border-t border-gray-100">
                <a id="novaVagaBtn" class="flex justify-center items-center py-2 rounded-lg text-sm font-medium transition bg-Primary-light cursor-pointer">
                    <i class="fas fa-plus mr-2"></i> Nova Vaga
                </a>
            </div>
        </div>

        <!-- Próximos Passos e Top Candidatos lado a lado -->
        <div class="grid grid-cols-2 gap-3 mb-6">
            <!-- Próximos Passos -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-3">
                <h3 class="font-semibold text-gray-800 text-xs mb-3">Próximos Passos</h3>
                <div class="space-y-2">
                    <div class="flex items-center gap-2 p-2 rounded-lg bg-Light">
                        <div class="w-6 h-6 rounded-full flex items-center justify-center bg-orange-300">
                            <i class="fas fa-file-alt text-white text-[10px]"></i>
                        </div>

                        <div class="flex-1">
                            <p class="text-[11px] font-medium text-gray-800">Propostas pendentes</p>
                            <p class="text-[9px] text-gray-400">{{ $propostasPendentes ?? 3 }} aguardando</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 p-2 rounded-lg bg-Light">
                        <div class="w-6 h-6 rounded-full flex items-center justify-center bg-blue-300">
                            <i class="fas fa-calendar-check text-white text-[10px]"></i>
                        </div>

                        <div class="flex-1">
                            <p class="text-[11px] font-medium text-gray-800">Entrevistas hoje</p>
                            <p class="text-[9px] text-gray-400">{{ $entrevistasHoje ?? 5 }} agendadas</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Candidatos -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-3">
                <div class="flex justify-between items-center mb-2">
                    <h3 class="font-semibold text-gray-800 text-xs">Top Candidatos</h3>
                    <a href="#" class="text-[10px] text-Primary-dark">Ver</a>
                </div>

                <div class="space-y-2">
                    @forelse($topCandidatos ?? [] as $candidato)
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded-full bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-user text-gray-500 text-[10px]"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-[11px] font-medium text-gray-800">{{ $candidato['nome'] }}</p>
                                <p class="text-[9px] text-gray-400">{{ $candidato['cargo'] }}</p>
                            </div>
                            <div class="flex items-center gap-0.5">
                                <i class="fas fa-star text-yellow-400 text-[9px]"></i>
                                <span class="text-[10px] font-semibold">{{ $candidato['nota'] }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-gray-400 text-[10px] py-2">
                            Nenhum candidato em destaque
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
