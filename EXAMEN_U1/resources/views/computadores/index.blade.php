@extends('layouts.app')

@section('title', 'Listado de Computadores')

@section('content')
    <div class="bg-silver rounded shadow p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Computadores</h2>
            @if(auth()->check() && auth()->user()->isAdmin())
                <a href="{{ route('computadores.create') }}" class="bg-persian text-white px-4 py-2 rounded hover:bg-persian-600">
                    <i class="fas fa-plus-circle"></i> Nuevo Computador
                </a>
            @endif
        </div>

        <div class="mb-6">
            <form action="{{ route('computadores.index') }}" method="GET" class="flex gap-4">
                <div class="flex-1">
                    <input type="text" 
                           name="search" 
                           placeholder="Buscar por código de tienda..."
                           value="{{ request('search') }}"
                           class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-persian">
                </div>
                <button type="submit" class="bg-persian text-white px-4 py-2 rounded hover:bg-persian-600">
                    <i class="fas fa-search"></i> Buscar
                </button>
                @if(request('search'))
                    <a href="{{ route('computadores.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                        <i class="fas fa-times"></i> Limpiar
                    </a>
                @endif
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg">
                <thead class="bg-raisin text-white">
                    <tr>
                        <th class="px-6 py-3">Código</th>
                        <th class="px-6 py-3">Procesador</th>
                        <th class="px-6 py-3">RAM</th>
                        <th class="px-6 py-3">Precio</th>
                        <th class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($computadores as $computador)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $computador->codigo_tienda }}</td>
                            <td class="px-6 py-4">{{ $computador->procesador }}</td>
                            <td class="px-6 py-4">{{ $computador->RAM }}</td>
                            <td class="px-6 py-4">${{ number_format($computador->precio, 2) }}</td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('computadores.show', $computador) }}" class="text-blue-600 hover:text-blue-900">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @if(auth()->check() && auth()->user()->isAdmin())
                                    <a href="{{ route('computadores.edit', $computador) }}" class="text-yellow-600 hover:text-yellow-900">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('computadores.destroy', $computador) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Está seguro?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection