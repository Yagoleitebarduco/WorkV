@extends('Layouts.app')

@section('title', 'Dashboard Empresa - WorkVale')

@section('header')
<div class="sticky top-0 z-10 bg-white border-b border-gray-100 px-4 py-3 flex justify-between items-center">
    <div>
        <h1 class="text-xl font-bold" style="background: linear-gradient(135deg, var(--primary-dark), var(--primary-medium)); -webkit-background-clip: text; background-clip: text; color: transparent;">
            Work<span style="color: var(--primary-dark);">Vale</span>
        </h1>
        <p class="text-xs text-gray-400">Dashboard Empresa</p>
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
@endsection

@section('content')
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
        --accent-blue: #3498db;
        --accent-orange: #FF9800;
        --bg-light: #F8F9FA;
        --text-dark: #343A40;
        --text-gray: #6c757d;
        --white: #FFFFFF;
        --border-color: #e5e7eb;
    }
    
    .stat-card {
        transition: all 0.2s ease;
    }
    
    .stat-card:active {
        transform: scale(0.98);
    }
    
    .recent-item {
        transition: all 0.2s ease;
    }
    
    .recent-item:active {
        background: var(--primary-light);
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .dashboard-content {
        animation: fadeInUp 0.3s ease-out forwards;
    }
    
    /* Status badges */
    .status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.7rem;
        font-weight: 500;
        white-space: nowrap;
    }
    .status-pending { background: rgba(255, 193, 7, 0.1); color: #d4a000; }
    .status-progress { background: rgba(52, 152, 219, 0.1); color: var(--accent-blue); }
    .status-completed { background: rgba(110, 203, 99, 0.1); color: var(--accent-green); }
    
    /* Bottom navigation */
    .bottom-nav-item {
        transition: all 0.2s ease;
        cursor: pointer;
    }
    .bottom-nav-item:active {
        transform: scale(0.95);
    }
    .bottom-nav-item.active {
        color: var(--primary-dark);
    }
    
    /* Settings button */
    .settings-btn {
        transition: all 0.2s ease;
    }
    .settings-btn:active {
        transform: rotate(30deg);
    }

    /* Container principal */
    .dashboard-container {
        max-width: 28rem;
        margin: 0 auto;
        background: white;
        min-height: 100vh;
        position: relative;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
    }
</style>

<div class="dashboard-container">
    
    <!-- Conteúdo Principal -->
    <div class="dashboard-content px-4 pb-20">
        
        <!-- Saudação -->
        <div class="mt-4 mb-5">
            <h2 class="text-lg font-semibold text-gray-800">Olá, {{ $empresaNome ?? 'Agência SP' }}</h2>
            <p class="text-xs text-gray-500">Aqui está o resumo da sua empresa</p>
        </div>

        <!-- Stats Cards (3 cards) -->
        <div class="grid grid-cols-3 gap-3 mb-6">
            <div class="stat-card bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">
                <div class="w-10 h-10 rounded-full flex items-center justify-center mx-auto mb-2" style="background: rgba(106, 38, 152, 0.1);">
                    <i class="fas fa-briefcase text-lg" style="color: var(--primary-dark);"></i>
                </div>
                <p class="text-xl font-bold text-gray-800">{{ $vagasAtivas ?? 24 }}</p>
                <p class="text-xs text-gray-500">Vagas ativas</p>
            </div>
            
            <div class="stat-card bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">
                <div class="w-10 h-10 rounded-full flex items-center justify-center mx-auto mb-2" style="background: rgba(110, 203, 99, 0.1);">
                    <i class="fas fa-users text-lg" style="color: var(--accent-green);"></i>
                </div>
                <p class="text-xl font-bold text-gray-800">{{ $totalCandidatos ?? 156 }}</p>
                <p class="text-xs text-gray-500">Candidatos</p>
            </div>
            
            <div class="stat-card bg-white rounded-xl p-3 text-center shadow-sm border border-gray-100">
                <div class="w-10 h-10 rounded-full flex items-center justify-center mx-auto mb-2" style="background: rgba(255, 193, 7, 0.1);">
                    <i class="fas fa-check-circle text-lg" style="color: var(--accent-yellow);"></i>
                </div>
                <p class="text-xl font-bold text-gray-800">{{ $contratacoes ?? 89 }}</p>
                <p class="text-xs text-gray-500">Contratações</p>
            </div>
        </div>

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
                    <a href="{{ route('empresa.vagas') }}" class="text-xs" style="color: var(--primary-dark);">Ver todas</a>
                </div>
            </div>
            <div class="divide-y divide-gray-100">
                @forelse($vagasRecentes ?? [] as $vaga)
                <div class="recent-item p-3 flex items-center justify-between">
                    <div>
                        <h4 class="font-medium text-gray-800 text-sm">{{ $vaga['titulo'] }}</h4>
                        <p class="text-xs text-gray-400 mt-0.5">{{ $vaga['candidatos'] }} candidatos • há {{ $vaga['dias'] }} dias</p>
                    </div>
                    <span class="status-badge status-{{ $vaga['status'] }} text-xs">
                        {{ $vaga['status_texto'] }}
                    </span>
                </div>
                @empty
                <div class="p-4 text-center text-gray-500 text-sm">
                    Nenhuma vaga recente encontrada
                </div>
                @endforelse
            </div>
            <div class="p-3 border-t border-gray-100">
                <button id="novaVagaBtn" class="w-full py-2 rounded-lg text-sm font-medium transition" style="background: var(--primary-light); color: var(--primary-dark);">
                    <i class="fas fa-plus mr-2"></i> Nova Vaga
                </button>
            </div>
        </div>

        <!-- Próximos Passos e Top Candidatos lado a lado -->
        <div class="grid grid-cols-2 gap-3 mb-6">
            <!-- Próximos Passos -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-3">
                <h3 class="font-semibold text-gray-800 text-xs mb-3">Próximos Passos</h3>
                <div class="space-y-2">
                    <div class="flex items-center gap-2 p-2 rounded-lg" style="background: var(--bg-light);">
                        <div class="w-6 h-6 rounded-full flex items-center justify-center" style="background: var(--accent-orange);">
                            <i class="fas fa-file-alt text-white text-[10px]"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-[11px] font-medium text-gray-800">Propostas pendentes</p>
                            <p class="text-[9px] text-gray-400">{{ $propostasPendentes ?? 3 }} aguardando</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 p-2 rounded-lg" style="background: var(--bg-light);">
                        <div class="w-6 h-6 rounded-full flex items-center justify-center" style="background: var(--accent-blue);">
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
                    <a href="{{ route('empresa.candidatos') }}" class="text-[10px]" style="color: var(--primary-dark);">Ver</a>
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

    <!-- Bottom Navigation (Android Style) -->
    <div class="fixed bottom-0 left-0 right-0 max-w-md mx-auto bg-white border-t border-gray-200 px-4 py-2 flex justify-around items-center">
        <div class="bottom-nav-item active flex flex-col items-center" data-nav="dashboard">
            <i class="fas fa-chart-line text-xl"></i>
            <span class="text-xs mt-0.5">Dashboard</span>
        </div>
        <div class="bottom-nav-item flex flex-col items-center text-gray-400" data-nav="vagas">
            <i class="fas fa-briefcase text-xl"></i>
            <span class="text-xs mt-0.5">Vagas</span>
        </div>
        <div class="bottom-nav-item flex flex-col items-center text-gray-400" data-nav="candidatos">
            <i class="fas fa-users text-xl"></i>
            <span class="text-xs mt-0.5">Candidatos</span>
        </div>
        <div class="bottom-nav-item flex flex-col items-center text-gray-400" data-nav="perfil">
            <i class="fas fa-user-circle text-xl"></i>
            <span class="text-xs mt-0.5">Perfil</span>
        </div>
    </div>
</div>

<!-- Modal de Configurações (engrenagem) -->
<div id="settingsModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
    <div class="relative bg-white rounded-2xl max-w-sm w-full p-5 mx-4 shadow-2xl" style="animation: fadeInUp 0.2s ease-out;">
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
                        <input type="checkbox" name="notificacoes_push" class="sr-only peer" value="1" {{ ($configuracoes['notificacoes_push'] ?? true) ? 'checked' : '' }}>
                        <div class="w-9 h-5 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-[#6A2698]"></div>
                    </label>
                </div>
                
                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-envelope" style="color: var(--primary-dark);"></i>
                        <span class="text-sm text-gray-700">Notificações por e-mail</span>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="notificacoes_email" class="sr-only peer" value="1" {{ ($configuracoes['notificacoes_email'] ?? true) ? 'checked' : '' }}>
                        <div class="w-9 h-5 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-[#6A2698]"></div>
                    </label>
                </div>
                
                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-language" style="color: var(--primary-dark);"></i>
                        <span class="text-sm text-gray-700">Idioma</span>
                    </div>
                    <select name="idioma" class="text-sm border border-gray-200 rounded-lg px-2 py-1">
                        <option value="pt" {{ ($configuracoes['idioma'] ?? 'pt') == 'pt' ? 'selected' : '' }}>Português</option>
                        <option value="en" {{ ($configuracoes['idioma'] ?? '') == 'en' ? 'selected' : '' }}>English</option>
                        <option value="es" {{ ($configuracoes['idioma'] ?? '') == 'es' ? 'selected' : '' }}>Español</option>
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
            
            <button type="submit" class="w-full mt-5 py-2 rounded-lg text-white font-medium" style="background: var(--primary-dark);">
                Salvar Configurações
            </button>
        </form>
        
        <button id="closeSettingsFooterBtn" class="w-full mt-3 py-2 rounded-lg border border-gray-300 text-gray-600 font-medium">
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
                    legend: { display: false },
                    tooltip: { callbacks: { label: (ctx) => `${ctx.raw} contratações` } }
                },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#e5e7eb' }, ticks: { stepSize: 8 } },
                    x: { grid: { display: false } }
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
                'dashboard': '{{ route("empresa.dashboard") }}',
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
    });
    
    // Seleção de ano para o gráfico
    const anoSelect = document.getElementById('anoSelect');
    if (anoSelect) {
        anoSelect.addEventListener('change', async function() {
            const ano = this.value;
            try {
                const response = await fetch(`{{ route("empresa.grafico.dados") }}?ano=${ano}`);
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
@endsection