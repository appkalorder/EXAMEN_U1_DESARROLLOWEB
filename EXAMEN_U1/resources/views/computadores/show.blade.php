@extends('layouts.app')

@section('title', 'Detalles del Computador')

@section('content')
    <div class="bg-silver rounded shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Detalles del Computador</h2>
            <div class="flex gap-2">
                <a href="{{ route('computadores.edit', $computador) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                    <i class="fas fa-edit"></i> Editar
                </a>
                <a href="{{ route('computadores.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @if($computador->imagen)
                <div class="md:col-span-2">
                    <img src="{{ asset($computador->imagen) }}" class="w-full max-w-md mx-auto rounded shadow">
                </div>
            @endif

            <div>
                <h3 class="font-bold text-gray-700">Código de Tienda</h3>
                <p>{{ $computador->codigo_tienda }}</p>
            </div>

            <div>
                <h3 class="font-bold text-gray-700">Procesador</h3>
                <p>{{ $computador->procesador }}</p>
            </div>

            <div>
                <h3 class="font-bold text-gray-700">RAM</h3>
                <p>{{ $computador->RAM }}</p>
            </div>

            <div>
                <h3 class="font-bold text-gray-700">Almacenamiento</h3>
                <p>{{ $computador->almacenamiento }}</p>
            </div>

            <div>
                <h3 class="font-bold text-gray-700">Tarjeta Gráfica</h3>
                <p>{{ $computador->tarjeta_grafica }}</p>
            </div>

            <div>
                <h3 class="font-bold text-gray-700">Precio</h3>
                <p>${{ number_format($computador->precio, 2) }}</p>
            </div>

            <div class="md:col-span-2">
                <h3 class="font-bold text-gray-700">Descripción</h3>
                <p>{{ $computador->descripcion }}</p>
            </div>
        </div>
    </div>
@endsection