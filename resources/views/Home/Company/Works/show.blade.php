@extends('Layouts.app')

@section('title', 'Detalhes do trabalho')

@section('header')
    <div class="mb-3">
        <h1 class="text-2xl font-bold text-white">Detalhes do trabalho</h1>
        <p class="text-sm text-gray-200">Visualização completa do cadastro</p>
    </div>
@endsection

@section('content')
    <div class="max-w-2xl mx-auto pb-20">
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <h2 class="text-xl font-bold text-gray-800 mb-1">{{ $work->name_work }}</h2>
            <p class="text-gray-500 mb-4">{{ $work->description_work }}</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">
                <div class="rounded-lg bg-gray-50 p-3">
                    <p class="text-gray-400 text-xs mb-1">Empresa</p>
                    <p class="font-medium text-gray-700">{{ $work->company->company_name ?? '-' }}</p>
                </div>
                <div class="rounded-lg bg-gray-50 p-3">
                    <p class="text-gray-400 text-xs mb-1">Skill</p>
                    <p class="font-medium text-gray-700">{{ $work->skill->skill_name ?? '-' }}</p>
                </div>
                <div class="rounded-lg bg-gray-50 p-3">
                    <p class="text-gray-400 text-xs mb-1">Data de início</p>
                    <p class="font-medium text-gray-700">{{ \Carbon\Carbon::parse($work->start_date)->format('d/m/Y') }}</p>
                </div>
                <div class="rounded-lg bg-gray-50 p-3">
                    <p class="text-gray-400 text-xs mb-1">Data de término</p>
                    <p class="font-medium text-gray-700">
                        {{ $work->end_date ? \Carbon\Carbon::parse($work->end_date)->format('d/m/Y') : 'Sem prazo final' }}
                    </p>
                </div>
                <div class="rounded-lg bg-gray-50 p-3">
                    <p class="text-gray-400 text-xs mb-1">Tipo</p>
                    <p class="font-medium text-gray-700">{{ $work->type_work }}</p>
                </div>
                <div class="rounded-lg bg-gray-50 p-3">
                    <p class="text-gray-400 text-xs mb-1">Duração</p>
                    <p class="font-medium text-gray-700">{{ $work->duration }} dias</p>
                </div>
                <div class="rounded-lg bg-gray-50 p-3">
                    <p class="text-gray-400 text-xs mb-1">Pagamento</p>
                    <p class="font-medium text-gray-700">R$ {{ number_format((float) $work->payment, 2, ',', '.') }}</p>
                </div>
                <div class="rounded-lg bg-gray-50 p-3">
                    <p class="text-gray-400 text-xs mb-1">Status</p>
                    <p class="font-medium text-gray-700">{{ $work->status }}</p>
                </div>
            </div>

            <div class="flex gap-2 mt-5 pt-4 border-t border-gray-100">
                <a href="{{ route('works.index') }}"
                    class="flex-1 text-center py-2 rounded-xl border border-gray-300 text-gray-600 font-medium">
                    Voltar
                </a>
                <a href="{{ route('works.edit', $work) }}"
                    class="flex-1 text-center py-2 rounded-xl bg-Primary-dark text-white font-medium">
                    Editar
                </a>
            </div>
        </div>
    </div>
@endsection
