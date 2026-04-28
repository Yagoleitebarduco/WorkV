@extends('Layouts.app')

@section('title', 'Trabalhos')

@section('header')
    <div class="mb-3">
        <h1 class="text-2xl font-bold text-white">Trabalhos</h1>
        <p class="text-sm text-gray-200">Gerencie os trabalhos da plataforma</p>
    </div>
@endsection

@section('content')
    <div class="max-w-2xl mx-auto pb-20">
        @if (session('success'))
            <div class="mb-4 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('works.create') }}"
                class="inline-flex items-center gap-2 rounded-xl px-4 py-2 text-white bg-Primary-dark">
                <i class="fas fa-plus"></i>
                Novo trabalho
            </a>
        </div>

        <div class="space-y-3">
            @forelse ($works as $work)
                <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h3 class="font-bold text-gray-800">{{ $work->name_work }}</h3>
                            <p class="text-sm text-gray-500">{{ $work->description_work }}</p>
                            <div class="text-xs text-gray-500 mt-2 space-y-1">
                                <p><i class="fas fa-building mr-1"></i>{{ $work->company->company_name ?? 'Empresa não definida' }}</p>
                                <p><i class="fas fa-code mr-1"></i>{{ $work->skill->skill_name ?? 'Skill não definida' }}</p>
                                <p><i class="fas fa-dollar-sign mr-1"></i>R$ {{ number_format((float) $work->payment, 2, ',', '.') }}</p>
                            </div>
                        </div>
                        <span class="text-xs px-2 py-1 rounded-full bg-Primary-light text-Primary-dark">
                            {{ $work->status }}
                        </span>
                    </div>

                    <div class="flex gap-2 mt-4 pt-3 border-t border-gray-100">
                        <a href="{{ route('works.show', $work) }}"
                            class="flex-1 text-center py-2 rounded-lg border border-gray-200 text-gray-600 text-sm font-medium">
                            Ver
                        </a>
                        <a href="{{ route('works.edit', $work) }}"
                            class="flex-1 text-center py-2 rounded-lg text-sm font-medium bg-Primary-light text-Primary-dark">
                            Editar
                        </a>
                        <form action="{{ route('works.destroy', $work) }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full py-2 rounded-lg text-sm font-medium bg-red-500 text-white"
                                onclick="return confirm('Tem certeza que deseja excluir este trabalho?')">
                                Excluir
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="text-center py-12 bg-white rounded-xl border border-gray-100">
                    <i class="fas fa-briefcase text-4xl text-gray-300 mb-3"></i>
                    <p class="text-gray-500">Nenhum trabalho cadastrado ainda.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-5">
            {{ $works->links() }}
        </div>
    </div>
@endsection
