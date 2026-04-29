@extends('Layouts.app')

@section('title', 'Editar trabalho')

@section('header')
    <div class="mb-3">
        <h1 class="text-2xl font-bold text-white">Editar trabalho</h1>
        <p class="text-sm text-gray-200">Atualize os dados do trabalho</p>
    </div>
@endsection

@section('content')
    <div class="max-w-2xl mx-auto pb-20">
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <form action="{{ route('works.update', $work) }}" method="POST" class="space-y-4">
                @method('PUT')
                @include('Home.Company.Works._form')
            </form>
        </div>
    </div>
@endsection
