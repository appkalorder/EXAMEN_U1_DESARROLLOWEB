@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content')
    <div class="bg-silver rounded shadow p-6 grow-1">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">
            Bienvenido al EXAMEN_U1
        </h2>
        <p class="text-gray-600">
            Aqui 
        </p>

        <a href="{{ route('computadores.index') }}"
           class="inline-block mt-4 bg-persian text-black font-medium px-4 py-2 rounded hover:bg-persian-400 transition">
            <i class="fas fa-plus-circle mr-2"></i> Ver registros
        </a>
    </div>
@endsection
