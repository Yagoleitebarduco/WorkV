@extends('Layouts.app')
@section('title')
    Mural
@endsection


@section('header')
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
                <h1 class="text-2xl font-bold text-white">Mural de Oportunidades</h1>
            </div>

            <div class="relative">
                <button
                    class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center text-gray-600 hover:shadow-md transition">
                    <i class="fas fa-sliders-h text-Primary-dark"></i>
                </button>
            </div>
        </div>

        <p class="text-sm text-gray-200">Encontre as melhores oportunidades para você</p>
    </div>

    <!-- Search Bar -->
    <div class="mb-6">
        <div class="relative">
            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            <input type="text" id="searchInput" class="search-input w-full pl-12 pr-4 py-3 rounded-xl bg-white"
                placeholder="Buscar por título, empresa ou localização...">
        </div>
    </div>

    <!-- Filters -->
    <div class="mb-6 overflow-x-auto whitespace-nowrap pb-2 scrollbar-hide">
        <div class="flex gap-2">
            <span class="filter-chip active px-4 py-2 rounded-full text-sm font-medium bg-Primary-dark text-white">Todas</span>
            <span class="filter-chip px-4 py-2 rounded-full text-sm font-medium bg-white">Tecnologia</span>
            <span class="filter-chip px-4 py-2 rounded-full text-sm font-medium bg-white">Design</span>
            <span class="filter-chip px-4 py-2 rounded-full text-sm font-medium bg-white">Marketing</span>
            <span class="filter-chip px-4 py-2 rounded-full text-sm font-medium bg-white">Remoto</span>
            <span class="filter-chip px-4 py-2 rounded-full text-sm font-medium bg-white">Presencial</span>
            <span class="filter-chip px-4 py-2 rounded-full text-sm font-medium bg-white">Alta Demanda</span>
        </div>
    </div>
@endsection

@section('content')
    <div class="max-w-2xl mx-auto pb-24">
        <!-- Results Count -->
        <div class="flex justify-between items-center mb-4">
            <p class="text-sm text-gray-500"><span id="resultsCount">12</span> oportunidades encontradas</p>
            <div class="flex items-center gap-2">
                <span class="text-xs text-gray-500">Ordenar por:</span>
                <select class="text-sm border-none bg-transparent font-medium" style="color: var(--primary-dark);">
                    <option>Mais recentes</option>
                    <option>Maior valor</option>
                    <option>Menor valor</option>
                    <option>Mais relevantes</option>
                </select>
            </div>
        </div>

        {{-- Aplicar a lista de Oportunidades --}}

        <!-- Load More Button -->
        <div class="text-center mt-6">
            <button class="px-6 py-2 rounded-lg text-sm font-medium transition"
                style="background: var(--primary-light); color: var(--primary-dark);">
                Carregar mais oportunidades
                <i class="fas fa-chevron-down ml-2"></i>
            </button>
        </div>
    </div>
@endsection
