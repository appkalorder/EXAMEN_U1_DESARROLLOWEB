@extends('layouts.app')

@section('title', 'Registro')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">Crear Cuenta</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Nombre
                </label>
                <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-persian"
                       type="text"
                       name="name"
                       id="name"
                       value="{{ old('name') }}"
                       required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Correo Electrónico
                </label>
                <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-persian"
                       type="email"
                       name="email"
                       id="email"
                       value="{{ old('email') }}"
                       required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Contraseña
                </label>
                <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-persian"
                       type="password"
                       name="password"
                       id="password"
                       required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">
                    Confirmar Contraseña
                </label>
                <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-persian"
                       type="password"
                       name="password_confirmation"
                       id="password_confirmation"
                       required>
            </div>

            <div class="flex items-center justify-between mb-6">
                <button type="submit"
                        class="bg-persian text-white font-bold py-2 px-4 rounded-lg hover:bg-persian-600 focus:outline-none focus:ring-2 focus:ring-persian focus:ring-opacity-50">
                    Registrarse
                </button>
                <a href="{{ route('login') }}"
                   class="text-sm text-persian hover:text-persian-600">
                    Ya tengo cuenta
                </a>
            </div>
        </form>
    </div>
</div>
@endsection