@extends('Layouts.app')

@section('title', 'Dashboard Empresa - WorkVale')
@section('hideDefaultBottomNav', '1')

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
<<<<<<< HEAD
=======

    <!-- Modal de Configurações (engrenagem) -->
    <div id="settingsModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
        <div class="relative bg-white rounded-2xl max-w-sm w-full p-5 mx-4 shadow-2xl"
            style="animation: fadeInUp 0.2s ease-out;">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold text-gray-800">Configurações</h3>
                <button id="closeSettingsBtn" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center">
                    <i class="fas fa-times text-gray-500"></i>
                </button>
            </div>

            <form id="settingsForm" method="POST" action="{{ route('empresa.configuracoes.atualizar') }}">
                @csrf
                @method('PUT')

                <div class="space-y-3">
                    <div class="flex items-center justify-between py-2 border-b border-gray-100">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-bell" style="color: var(--primary-dark);"></i>
                            <span class="text-sm text-gray-700">Notificações push</span>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="notificacoes_push" class="sr-only peer" value="1"
                                {{ $configuracoes['notificacoes_push'] ?? true ? 'checked' : '' }}>
                            <div
                                class="w-9 h-5 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-[#6A2698]">
                            </div>
                        </label>
                    </div>

                    <div class="flex items-center justify-between py-2 border-b border-gray-100">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-envelope" style="color: var(--primary-dark);"></i>
                            <span class="text-sm text-gray-700">Notificações por e-mail</span>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="notificacoes_email" class="sr-only peer" value="1"
                                {{ $configuracoes['notificacoes_email'] ?? true ? 'checked' : '' }}>
                            <div
                                class="w-9 h-5 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-[#6A2698]">
                            </div>
                        </label>
                    </div>

                    <div class="flex items-center justify-between py-2 border-b border-gray-100">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-language" style="color: var(--primary-dark);"></i>
                            <span class="text-sm text-gray-700">Idioma</span>
                        </div>
                        <select name="idioma" class="text-sm border border-gray-200 rounded-lg px-2 py-1">
                            <option value="pt" {{ ($configuracoes['idioma'] ?? 'pt') == 'pt' ? 'selected' : '' }}>
                                Português</option>
                            <option value="en" {{ ($configuracoes['idioma'] ?? '') == 'en' ? 'selected' : '' }}>
                                English</option>
                            <option value="es" {{ ($configuracoes['idioma'] ?? '') == 'es' ? 'selected' : '' }}>
                                Español</option>
                        </select>
                    </div>

                    <div class="flex items-center justify-between py-2 border-b border-gray-100">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-shield-alt" style="color: var(--primary-dark);"></i>
                            <span class="text-sm text-gray-700">Privacidade</span>
                        </div>
                        <i class="fas fa-chevron-right text-gray-400 text-sm"></i>
                    </div>

                    <div class="flex items-center justify-between py-2">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-info-circle" style="color: var(--primary-dark);"></i>
                            <span class="text-sm text-gray-700">Versão do app</span>
                        </div>
                        <span class="text-xs text-gray-500">2.0.1</span>
                    </div>
                </div>

                <button type="submit" class="w-full mt-5 py-2 rounded-lg text-white font-medium"
                    style="background: var(--primary-dark);">
                    Salvar Configurações
                </button>
            </form>

            <button id="closeSettingsFooterBtn"
                class="w-full mt-3 py-2 rounded-lg border border-gray-300 text-gray-600 font-medium">
                Fechar
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Gráfico de Contratações com dados do backend
        const hiringCtx = document.getElementById('hiringChart').getContext('2d');
        let hiringChart = null;

        function initChart(dados) {
            if (hiringChart) {
                hiringChart.destroy();
            }

            hiringChart = new Chart(hiringCtx, {
                type: 'line',
                data: {
                    labels: dados.labels || ['Out', 'Nov', 'Dez', 'Jan', 'Fev', 'Mar'],
                    datasets: [{
                        label: 'Contratações',
                        data: dados.values || [12, 19, 15, 17, 22, 24],
                        borderColor: '#6A2698',
                        backgroundColor: 'rgba(106, 38, 152, 0.05)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#6A2698',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: (ctx) => `${ctx.raw} contratações`
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#e5e7eb'
                            },
                            ticks: {
                                stepSize: 8
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        }

        // Inicializar gráfico com dados do backend
        // const dadosGrafico = @json($dadosGrafico ?? ['labels' => ['Out', 'Nov', 'Dez', 'Jan', 'Fev', 'Mar'], 'values' => [12, 19, 15, 17, 22, 24]]);

        // Modal Configurações
        const settingsBtn = document.getElementById('settingsBtn');
        const settingsModal = document.getElementById('settingsModal');
        const closeSettingsBtn = document.getElementById('closeSettingsBtn');
        const closeSettingsFooterBtn = document.getElementById('closeSettingsFooterBtn');

        function openSettingsModal() {
            settingsModal.classList.remove('hidden');
            settingsModal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeSettingsModal() {
            settingsModal.classList.add('hidden');
            settingsModal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        settingsBtn.addEventListener('click', openSettingsModal);
        closeSettingsBtn.addEventListener('click', closeSettingsModal);
        closeSettingsFooterBtn.addEventListener('click', closeSettingsModal);

        // Fechar ao clicar no overlay
        if (settingsModal) {
            settingsModal.querySelector('.absolute.inset-0.bg-black\\/50').addEventListener('click', closeSettingsModal);
        }

        // Bottom Navigation
        const navItems = document.querySelectorAll('.bottom-nav-item');
        navItems.forEach(item => {
            item.addEventListener('click', function() {
                const nav = this.dataset.nav;
                navItems.forEach(nav => {
                    nav.classList.remove('active');
                    nav.style.color = '#9ca3af';
                });
                this.classList.add('active');
                this.style.color = 'var(--primary-dark)';

                // Redirecionamento baseado na navegação
                const rotas = {
                    'dashboard': '{{ route('empresa.dashboard') }}',
                    'vagas': '{{ route('empresa.vagas') }}',
                    'candidatos': '{{ route('empresa.candidatos') }}',
                    'perfil': '{{ route('empresa.perfil') }}'
                };

                if (rotas[nav]) {
                    window.location.href = rotas[nav];
                }
            }
        });
    }
    
// Inicializar gráfico com fallback estático (evita erro de parse do Blade)
const dadosGrafico = {
    labels: ['Out', 'Nov', 'Dez', 'Jan', 'Fev', 'Mar'],
    values: [12, 19, 15, 17, 22, 24],
};
initChart(dadosGrafico);

// Modal Configurações
const settingsBtn = document.getElementById('settingsBtn');
const settingsModal = document.getElementById('settingsModal');
const closeSettingsBtn = document.getElementById('closeSettingsBtn');
const closeSettingsFooterBtn = document.getElementById('closeSettingsFooterBtn');
    
    function openSettingsModal() {
        settingsModal.classList.remove('hidden');
        settingsModal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
    
    function closeSettingsModal() {
        settingsModal.classList.add('hidden');
        settingsModal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
    
    settingsBtn.addEventListener('click', openSettingsModal);
    closeSettingsBtn.addEventListener('click', closeSettingsModal);
    closeSettingsFooterBtn.addEventListener('click', closeSettingsModal);
    
    // Fechar ao clicar no overlay
    if (settingsModal) {
        settingsModal.querySelector('.absolute.inset-0.bg-black\\/50').addEventListener('click', closeSettingsModal);
    }
    
    // Bottom Navigation
    const navItems = document.querySelectorAll('.bottom-nav-item');
    navItems.forEach(item => {
        item.addEventListener('click', function() {
            const nav = this.dataset.nav;
            navItems.forEach(nav => {
                nav.classList.remove('active');
                nav.style.color = '#9ca3af';
            });
            this.classList.add('active');
            this.style.color = 'var(--primary-dark)';
            
            // Redirecionamento baseado na navegação
            const rotas = {
                'dashboard': '{{ route("company.dashboard") }}',
                'vagas': '{{ route("empresa.vagas") }}',
                'candidatos': '{{ route("empresa.candidatos") }}',
                'perfil': '{{ route("empresa.perfil") }}'
            };
            
            if (rotas[nav]) {
                window.location.href = rotas[nav];
            }
        });
    });
    
    // Nova vaga button
    const novaVagaBtn = document.getElementById('novaVagaBtn');
    if (novaVagaBtn) {
        novaVagaBtn.addEventListener('click', () => {
            window.location.href = '{{ route("empresa.vagas.criar") }}';
        });
    }
    
    // Próximos passos clicks
    const nextSteps = document.querySelectorAll('.bg-light');
    nextSteps.forEach(step => {
        step.addEventListener('click', () => {
            const title = step.querySelector('.font-medium')?.innerText;
            if (title && title.includes('Propostas')) {
                window.location.href = '{{ route("empresa.propostas") }}';
            } else if (title && title.includes('Entrevistas')) {
                window.location.href = '{{ route("empresa.entrevistas") }}';
            }
        });

        // Nova vaga button
        const novaVagaBtn = document.getElementById('novaVagaBtn');
        if (novaVagaBtn) {
            novaVagaBtn.addEventListener('click', () => {
                window.location.href = '{{ route('empresa.vagas.criar') }}';
            });
        }

        // Próximos passos clicks
        const nextSteps = document.querySelectorAll('.bg-light');
        nextSteps.forEach(step => {
            step.addEventListener('click', () => {
                const title = step.querySelector('.font-medium')?.innerText;
                if (title && title.includes('Propostas')) {
                    window.location.href = '{{ route('empresa.propostas') }}';
                } else if (title && title.includes('Entrevistas')) {
                    window.location.href = '{{ route('empresa.entrevistas') }}';
                }
            });
        });

        // Seleção de ano para o gráfico
        const anoSelect = document.getElementById('anoSelect');
        if (anoSelect) {
            anoSelect.addEventListener('change', async function() {
                const ano = this.value;
                try {
                    const response = await fetch(`{{ route('empresa.grafico.dados') }}?ano=${ano}`);
                    const data = await response.json();
                    initChart(data);
                } catch (error) {
                    console.error('Erro ao carregar dados do gráfico:', error);
                }
            });
        }

        // Form de configurações
        const settingsForm = document.getElementById('settingsForm');
        if (settingsForm) {
            settingsForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                const formData = new FormData(this);

                try {
                    const response = await fetch(this.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });

                    if (response.ok) {
                        alert('Configurações salvas com sucesso!');
                        closeSettingsModal();
                    } else {
                        alert('Erro ao salvar configurações');
                    }
                } catch (error) {
                    console.error('Erro:', error);
                    alert('Erro ao salvar configurações');
                }
            });
        }
    </script>
>>>>>>> 1f499d5948ca58facf471f6ede8b282c101fe61a
@endsection
