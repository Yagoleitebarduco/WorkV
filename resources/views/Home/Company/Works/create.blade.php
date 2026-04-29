@extends('Layouts.app')

@section('title', 'Novo trabalho')

@section('header')
    <div class="mb-3">
        <h1 class="text-2xl font-bold text-white">Novo trabalho</h1>
        <p class="text-sm text-gray-200">Preencha os dados para cadastrar</p>
    </div>
@endsection

@section('content')
    <div class="max-w-2xl mx-auto pb-20">
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <form action="{{ route('works.store') }}" method="POST" class="space-y-4">
                @include('Home.Company.Works._form')
            </form>
        </div>
    </div>
@endsection
