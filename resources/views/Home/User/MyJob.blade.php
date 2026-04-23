@extends('Layouts.app')
@section('title')
    Meus Jobs
@endsection

@section('header')
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
                <h1 class="text-2xl font-bold text-white">Meus Trabalhos</h1>
            </div>
            <div class="relative">
                <div class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center"
                    style="color: var(--primary-dark);">
                    <i class="fas fa-briefcase"></i>
                </div>
            </div>
        </div>
        <p class="text-sm text-gray-200">Gerencie todos os seus trabalhos em andamento e concluídos</p>
    </div>
@endsection

@section('content')
    <div class="max-w-2xl mx-auto">
        <!-- Stats Cards -->
        <div class="grid grid-cols-3 gap-3 mb-6">
            <div class="bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">
                <i class="fas fa-clock text-xl" style="color: var(--accent-yellow);"></i>
                <p class="text-2xl font-bold text-gray-800 mt-1" id="emAndamentoCount">3</p>
                <p class="text-xs text-gray-500">Em andamento</p>
            </div>
            <div class="bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">
                <i class="fas fa-check-circle text-xl" style="color: var(--accent-green);"></i>
                <p class="text-2xl font-bold text-gray-800 mt-1" id="concluidosCount">2</p>
                <p class="text-xs text-gray-500">Concluídos</p>
            </div>
            <div class="bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">
                <i class="fas fa-chart-line text-xl" style="color: var(--primary-dark);"></i>
                <p class="text-2xl font-bold text-gray-800 mt-1" id="totalGanhos">R$ 8.500</p>
                <p class="text-xs text-gray-500">Total ganho</p>
            </div>
        </div>

        <!-- Tabs -->
        <div class="flex gap-2 mb-6 bg-white p-1 rounded-xl shadow-sm border border-gray-100">
            <button class="tab-btn active flex-1 py-2.5 rounded-lg font-medium transition text-gray-600"
                data-tab="andamento">
                <i class="fas fa-play-circle mr-2"></i> Em andamento
            </button>
            <button class="tab-btn flex-1 py-2.5 rounded-lg font-medium transition text-gray-600" data-tab="concluidos">
                <i class="fas fa-check-circle mr-2"></i> Concluídos
            </button>
        </div>

        <!-- Trabalhos em Andamento -->
        <div id="andamentoTab" class="tab-content space-y-4">

            <!-- Card 1 - Em andamento -->
            <div class="work-card bg-white rounded-xl p-5 shadow-sm border border-gray-100" data-status="andamento">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="status-badge text-xs font-medium px-2 py-1 rounded-full"
                                style="background: rgba(255, 193, 7, 0.1); color: #d4a000;">
                                <i class="fas fa-spinner fa-pulse mr-1"></i> Em andamento
                            </span>
                            <span class="text-xs text-gray-400">Prazo: 5 dias</span>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg mb-1">Desenvolvimento de E-commerce</h3>
                        <p class="text-sm text-gray-500 mb-2">
                            <i class="fas fa-building mr-1"></i> TechSolutions Ltda
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                            <span><i class="fas fa-calendar-check mr-1"></i> Início: 01/04/2024</span>
                            <span><i class="fas fa-calendar-times mr-1"></i> Entrega: 10/04/2024</span>
                        </div>
                        <div class="mb-3">
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-gray-600">Progresso</span>
                                <span class="font-medium" style="color: var(--primary-dark);">60%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="progress-bar h-2 rounded-full"
                                    style="width: 60%; background: var(--primary-dark);"></div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-2xl font-bold" style="color: var(--primary-dark);">R$ 3.500</span>
                            <span class="text-xs text-gray-500">/projeto</span>
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 pt-3 border-t border-gray-100">
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium transition"
                        style="background: var(--primary-light); color: var(--primary-dark);"
                        onclick="openProgressModal(this)">
                        <i class="fas fa-chart-line mr-1"></i> Atualizar progresso
                    </button>
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium text-white transition"
                        style="background: var(--primary-dark);" onclick="openDeliveryModal(this)">
                        <i class="fas fa-paper-plane mr-1"></i> Entregar trabalho
                    </button>
                </div>
            </div>

            <!-- Card 2 - Em andamento -->
            <div class="work-card bg-white rounded-xl p-5 shadow-sm border border-gray-100" data-status="andamento">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="status-badge text-xs font-medium px-2 py-1 rounded-full"
                                style="background: rgba(255, 193, 7, 0.1); color: #d4a000;">
                                <i class="fas fa-spinner fa-pulse mr-1"></i> Em andamento
                            </span>
                            <span class="text-xs text-gray-400">Prazo: 2 dias</span>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg mb-1">Design de Interface Mobile</h3>
                        <p class="text-sm text-gray-500 mb-2">
                            <i class="fas fa-building mr-1"></i> Creative Agency
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                            <span><i class="fas fa-calendar-check mr-1"></i> Início: 03/04/2024</span>
                            <span><i class="fas fa-calendar-times mr-1"></i> Entrega: 07/04/2024</span>
                        </div>
                        <div class="mb-3">
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-gray-600">Progresso</span>
                                <span class="font-medium" style="color: var(--primary-dark);">30%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="progress-bar h-2 rounded-full"
                                    style="width: 30%; background: var(--primary-dark);"></div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-2xl font-bold" style="color: var(--primary-dark);">R$ 2.800</span>
                            <span class="text-xs text-gray-500">/projeto</span>
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 pt-3 border-t border-gray-100">
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium transition"
                        style="background: var(--primary-light); color: var(--primary-dark);"
                        onclick="openProgressModal(this)">
                        <i class="fas fa-chart-line mr-1"></i> Atualizar progresso
                    </button>
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium text-white transition"
                        style="background: var(--primary-dark);" onclick="openDeliveryModal(this)">
                        <i class="fas fa-paper-plane mr-1"></i> Entregar trabalho
                    </button>
                </div>
            </div>

            <!-- Card 3 - Em andamento -->
            <div class="work-card bg-white rounded-xl p-5 shadow-sm border border-gray-100" data-status="andamento">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="status-badge text-xs font-medium px-2 py-1 rounded-full"
                                style="background: rgba(255, 193, 7, 0.1); color: #d4a000;">
                                <i class="fas fa-spinner fa-pulse mr-1"></i> Em andamento
                            </span>
                            <span class="text-xs text-gray-400">Prazo: 8 dias</span>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg mb-1">Marketing Digital para Startup</h3>
                        <p class="text-sm text-gray-500 mb-2">
                            <i class="fas fa-building mr-1"></i> Digital Growth
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                            <span><i class="fas fa-calendar-check mr-1"></i> Início: 28/03/2024</span>
                            <span><i class="fas fa-calendar-times mr-1"></i> Entrega: 12/04/2024</span>
                        </div>
                        <div class="mb-3">
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-gray-600">Progresso</span>
                                <span class="font-medium" style="color: var(--primary-dark);">80%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="progress-bar h-2 rounded-full"
                                    style="width: 80%; background: var(--primary-dark);"></div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-2xl font-bold" style="color: var(--primary-dark);">R$ 4.200</span>
                            <span class="text-xs text-gray-500">/mês</span>
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 pt-3 border-t border-gray-100">
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium transition"
                        style="background: var(--primary-light); color: var(--primary-dark);"
                        onclick="openProgressModal(this)">
                        <i class="fas fa-chart-line mr-1"></i> Atualizar progresso
                    </button>
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium text-white transition"
                        style="background: var(--primary-dark);" onclick="openDeliveryModal(this)">
                        <i class="fas fa-paper-plane mr-1"></i> Entregar trabalho
                    </button>
                </div>
            </div>
        </div>

        <!-- Trabalhos Concluídos (inicialmente escondido) -->
        <div id="concluidosTab" class="tab-content space-y-4 hidden">

            <!-- Card 1 - Concluído -->
            <div class="work-card bg-white rounded-xl p-5 shadow-sm border border-gray-100" data-status="concluido">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="status-badge text-xs font-medium px-2 py-1 rounded-full"
                                style="background: rgba(110, 203, 99, 0.1); color: var(--accent-green);">
                                <i class="fas fa-check-circle mr-1"></i> Concluído
                            </span>
                            <span class="text-xs text-gray-400">Entregue em: 30/03/2024</span>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg mb-1">Landing Page para Cliente</h3>
                        <p class="text-sm text-gray-500 mb-2">
                            <i class="fas fa-building mr-1"></i> WebDesign Pro
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                            <span><i class="fas fa-star text-yellow-400 mr-1"></i> Avaliação: 4.8</span>
                            <span><i class="fas fa-clock mr-1"></i> Entregue antes do prazo</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-2xl font-bold" style="color: var(--accent-green);">R$ 1.500</span>
                            <span class="text-xs text-gray-500">/projeto</span>
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 pt-3 border-t border-gray-100">
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium transition"
                        style="background: var(--primary-light); color: var(--primary-dark);"
                        onclick="viewWorkDetails(this)">
                        <i class="fas fa-eye mr-1"></i> Ver detalhes
                    </button>
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium transition"
                        style="background: var(--accent-green); color: white;" onclick="openRatingModal(this)">
                        <i class="fas fa-star mr-1"></i> Avaliar cliente
                    </button>
                </div>
            </div>

            <!-- Card 2 - Concluído -->
            <div class="work-card bg-white rounded-xl p-5 shadow-sm border border-gray-100" data-status="concluido">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="status-badge text-xs font-medium px-2 py-1 rounded-full"
                                style="background: rgba(110, 203, 99, 0.1); color: var(--accent-green);">
                                <i class="fas fa-check-circle mr-1"></i> Concluído
                            </span>
                            <span class="text-xs text-gray-400">Entregue em: 25/03/2024</span>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg mb-1">Desenvolvimento de API REST</h3>
                        <p class="text-sm text-gray-500 mb-2">
                            <i class="fas fa-building mr-1"></i> Backend Solutions
                        </p>
                        <div class="flex items-center gap-4 text-xs text-gray-500 mb-3">
                            <span><i class="fas fa-star text-yellow-400 mr-1"></i> Avaliação: 5.0</span>
                            <span><i class="fas fa-clock mr-1"></i> Entregue no prazo</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-2xl font-bold" style="color: var(--accent-green);">R$ 2.200</span>
                            <span class="text-xs text-gray-500">/projeto</span>
                        </div>
                    </div>
                </div>
                <div class="flex gap-2 pt-3 border-t border-gray-100">
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium transition"
                        style="background: var(--primary-light); color: var(--primary-dark);"
                        onclick="viewWorkDetails(this)">
                        <i class="fas fa-eye mr-1"></i> Ver detalhes
                    </button>
                    <button class="flex-1 py-2 rounded-lg text-sm font-medium transition"
                        style="background: var(--accent-green); color: white;" onclick="openRatingModal(this)">
                        <i class="fas fa-star mr-1"></i> Avaliar cliente
                    </button>
                </div>
            </div>
        </div>

        <!-- Empty State (caso não tenha trabalhos) -->
        <div id="emptyState" class="empty-state hidden text-center py-12">
            <div class="w-24 h-24 mx-auto mb-4 rounded-full bg-gray-100 flex items-center justify-center">
                <i class="fas fa-briefcase text-4xl text-gray-400"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Nenhum trabalho ainda</h3>
            <p class="text-sm text-gray-500 mb-4">Você ainda não pegou nenhum trabalho</p>
            <button class="px-6 py-2 rounded-lg text-white font-medium" style="background: var(--primary-dark);">
                Explorar oportunidades
            </button>
        </div>
    </div>
@endsection
