@extends('layouts.app')

@section('title', 'Nuevo Computador')

@section('content')
    <div class="bg-silver rounded shadow p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Nuevo Computador</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('computadores.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700 font-bold mb-2">Código de Tienda</label>
                    <input type="text" name="codigo_tienda" value="{{ old('codigo_tienda') }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2">Procesador</label>
                    <input type="text" name="procesador" value="{{ old('procesador') }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2">RAM</label>
                    <input type="text" name="RAM" value="{{ old('RAM') }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2">Almacenamiento</label>
                    <input type="text" name="almacenamiento" value="{{ old('almacenamiento') }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2">Tarjeta Gráfica</label>
                    <input type="text" name="tarjeta_grafica" value="{{ old('tarjeta_grafica') }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2">Precio</label>
                    <input type="number" name="precio" value="{{ old('precio') }}" step="0.01" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-gray-700 font-bold mb-2">Descripción</label>
                    <textarea name="descripcion" class="w-full border rounded px-3 py-2" rows="3">{{ old('descripcion') }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-gray-700 font-bold mb-2">Imagen</label>
                    <input type="file" name="imagen" class="w-full border rounded px-3 py-2">
                </div>
            </div>

            <div class="mt-6 flex gap-3">
                <button type="submit" class="bg-persian text-white px-4 py-2 rounded hover:bg-persian-600">
                    <i class="fas fa-save"></i> Guardar
                </button>
                <a href="{{ route('computadores.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    <i class="fas fa-times"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection