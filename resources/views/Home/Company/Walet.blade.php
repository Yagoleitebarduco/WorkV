@extends('Layouts.app')
@section('title')
    Walet
@endsection

@section('header')
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
                <h1 class="text-2xl font-bold text-white">Carteira</h1>
            </div>
            <div class="relative">
                <div class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center"
                    style="color: var(--primary-dark);">
                    <i class="fas fa-wallet"></i>
                </div>
            </div>
        </div>
        <p class="text-sm text-gray-200">Gerencie seus ganhos e pagamentos</p>
    </div>
@endsection

@section('content')
    <div class="max-w-2xl mx-auto">
        <!-- Balance Card -->
        <div class="bg-Primary-dark rounded-2xl p-6 mb-6 text-white shadow-lg">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-sm opacity-90 mb-1">Saldo disponível</p>
                    <p class="text-3xl font-bold" id="saldoDisponivel">R$ 5.850,00</p>
                </div>
                <div class="bg-white/20 rounded-full p-2">
                    <i class="fas fa-credit-card text-xl"></i>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-xs opacity-80 mb-1">Saldo a Receber</p>
                    <p class="text-lg font-semibold" id="saldoReceber">R$ 2.450,00</p>
                </div>
                <div>
                    <p class="text-xs opacity-80 mb-1">Total Ganho</p>
                    <p class="text-lg font-semibold" id="totalGanho">R$ 8.300,00</p>
                </div>
            </div>
        </div>

        <!-- Ações Rápidas -->
        <div class="grid grid-cols-2 gap-3 mb-6">
            <button class="withdraw-btn py-3 rounded-xl text-white font-semibold bg-Success">
                <i class="fas fa-money-bill-wave mr-2"></i> Sacar dinheiro
            </button>

            <button class="withdraw-btn py-3 rounded-xl font-semibold text-Primary-dark border border-Primary-dark">
                <i class="fa-brands fa-pix mr-2"></i> Gerenciar PIX
            </button>
        </div>

        {{-- Criar Grafiocop de desempenho --}}
        <!-- Gráfico de Desempenho Mensal -->
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 mb-6">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h3 class="font-semibold text-gray-800">Desempenho Mensal</h3>
                    <p class="text-xs text-gray-500">Últimos 6 meses</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full" style="background: var(--primary-dark);"></span>
                    <span class="text-xs text-gray-600">Ganhos</span>
                </div>
            </div>
            <canvas id="earningsChart" width="400" height="200"></canvas>
        </div>

        <!-- Chave PIX Cadastrada -->
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 mb-6 pix-card">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h3 class="font-semibold text-gray-800">Chave PIX Cadastrada</h3>
                    <p class="text-xs text-green-600 mt-1">
                        <i class="fas fa-check-circle mr-1"></i> Verificada
                    </p>
                </div>

                <i class="fa-brands fa-pix text-Primary-dark text-2xl"></i>
            </div>

            <div class="space-y-3">
                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                    <span class="text-sm text-gray-500">Tipo</span>
                    <span class="text-sm font-medium text-gray-800">CPF</span>
                </div>

                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                    <span class="text-sm text-gray-500">Chave</span>
                    <div class="flex items-center gap-2">
                        <span class="text-sm font-medium text-gray-800" id="pixKey">123.456.789-00</span>
                        <button onclick="copyPixKey()" class="copy-btn text-xs px-2 py-1 rounded"
                            style="background: var(--primary-light); color: var(--primary-dark);">
                            <i class="far fa-copy"></i> Copiar
                        </button>
                    </div>
                </div>

                <div class="flex justify-between items-center py-2">
                    <span class="text-sm text-gray-500">Banco</span>
                    <span class="text-sm font-medium text-gray-800">Banco WorkVale</span>
                </div>
            </div>

            <button onclick="openPixModal()" class="w-full mt-4 py-2 rounded-lg text-sm font-medium transition"
                style="background: var(--primary-light); color: var(--primary-dark);">
                <i class="fas fa-edit mr-1"></i> Editar chave PIX
            </button>
        </div>

        <!-- Transações Recentes -->
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-semibold text-gray-800">Transações Recentes</h3>
                <a href="#" class="text-xs" style="color: var(--primary-dark);">Ver todas</a>
            </div>
            
            <div class="space-y-3">
                <!-- Transação 1 - Recebimento -->
                <div class="transaction-item flex justify-between items-center p-3 rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center"
                            style="background: rgba(110, 203, 99, 0.1);">
                            <i class="fas fa-arrow-down" style="color: var(--accent-green);"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Pagamento recebido</p>
                            <p class="text-xs text-gray-500">Projeto E-commerce • 02/04/2024</p>
                        </div>
                    </div>
                    <div>
                        <p class="font-semibold" style="color: var(--accent-green);">+R$ 1.500,00</p>
                    </div>
                </div>

                <!-- Transação 2 - Saque -->
                <div class="transaction-item flex justify-between items-center p-3 rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center"
                            style="background: rgba(255, 107, 107, 0.1);">
                            <i class="fas fa-arrow-up" style="color: var(--accent-red);"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Saque realizado</p>
                            <p class="text-xs text-gray-500">PIX • 28/03/2024</p>
                        </div>
                    </div>
                    <div>
                        <p class="font-semibold" style="color: var(--accent-red);">-R$ 500,00</p>
                    </div>
                </div>

                <!-- Transação 3 - Recebimento -->
                <div class="transaction-item flex justify-between items-center p-3 rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center"
                            style="background: rgba(110, 203, 99, 0.1);">
                            <i class="fas fa-arrow-down" style="color: var(--accent-green);"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Pagamento recebido</p>
                            <p class="text-xs text-gray-500">Projeto Landing Page • 25/03/2024</p>
                        </div>
                    </div>
                    <div>
                        <p class="font-semibold" style="color: var(--accent-green);">+R$ 2.200,00</p>
                    </div>
                </div>

                <!-- Transação 4 - Recebimento -->
                <div class="transaction-item flex justify-between items-center p-3 rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center"
                            style="background: rgba(110, 203, 99, 0.1);">
                            <i class="fas fa-arrow-down" style="color: var(--accent-green);"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Pagamento recebido</p>
                            <p class="text-xs text-gray-500">Projeto API REST • 20/03/2024</p>
                        </div>
                    </div>
                    <div>
                        <p class="font-semibold" style="color: var(--accent-green);">+R$ 2.800,00</p>
                    </div>
                </div>
            </div>
        </div>
    @endsection


    {{-- <!-- Modal de Saque -->
    <div id="withdrawModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="modal-overlay absolute inset-0"></div>
        <div class="modal-content relative bg-white rounded-2xl max-w-md w-full p-6 shadow-2xl">
            <div class="text-center mb-4">
                <div class="w-16 h-16 rounded-full mx-auto mb-3 flex items-center justify-center"
                    style="background: var(--accent-green); background-opacity: 0.1;">
                    <i class="fas fa-money-bill-wave text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800">Sacar dinheiro</h3>
                <p class="text-sm text-gray-500 mt-1">O valor será transferido para sua conta</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Valor do saque</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">R$</span>
                    <input type="number" id="withdrawAmount"
                        class="w-full pl-10 pr-3 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-primary-dark"
                        placeholder="0,00" step="0.01">
                </div>
                <p class="text-xs text-gray-500 mt-1">Saldo disponível: <span id="modalSaldo">R$ 5.850,00</span></p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Chave PIX</label>
                <select
                    class="w-full px-3 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-primary-dark">
                    <option>123.456.789-00 (CPF)</option>
                    <option>maria.silva@email.com (E-mail)</option>
                </select>
            </div>
            <div class="flex gap-3">
                <button onclick="closeModal('withdrawModal')"
                    class="flex-1 px-4 py-2 rounded-lg border border-gray-300 text-gray-700 font-medium">Cancelar</button>
                <button onclick="confirmWithdraw()" class="flex-1 px-4 py-2 rounded-lg text-white font-medium"
                    style="background: var(--accent-green);">Confirmar saque</button>
            </div>
        </div>
    </div>

    <!-- Modal de Gerenciar PIX -->
    <div id="pixModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="modal-overlay absolute inset-0"></div>
        <div class="modal-content relative bg-white rounded-2xl max-w-md w-full p-6 shadow-2xl">
            <div class="text-center mb-4">
                <div class="w-16 h-16 rounded-full mx-auto mb-3 flex items-center justify-center"
                    style="background: var(--primary-light);">
                    <i class="fab fa-pix text-2xl" style="color: var(--primary-dark);"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800">Gerenciar Chave PIX</h3>
                <p class="text-sm text-gray-500 mt-1">Cadastre ou altere sua chave PIX</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de chave</label>
                <select id="pixType"
                    class="w-full px-3 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-primary-dark">
                    <option value="cpf">CPF</option>
                    <option value="email">E-mail</option>
                    <option value="phone">Telefone</option>
                    <option value="random">Chave aleatória</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Chave</label>
                <input type="text" id="pixKeyInput"
                    class="w-full px-3 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-primary-dark"
                    placeholder="Digite sua chave PIX" value="123.456.789-00">
            </div>
            <div class="flex gap-3">
                <button onclick="closeModal('pixModal')"
                    class="flex-1 px-4 py-2 rounded-lg border border-gray-300 text-gray-700 font-medium">Cancelar</button>
                <button onclick="savePixKey()" class="flex-1 px-4 py-2 rounded-lg text-white font-medium"
                    style="background: var(--primary-dark);">Salvar chave</button>
            </div>
        </div>
    </div> --}}
