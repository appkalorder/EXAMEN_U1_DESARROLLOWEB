<!DOCTYPE html>
<html lang="es" class="h-full">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'CRUD Laravel')</title>
  
  {{-- Tailwind CSS CDN --}}
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            silver: {
              DEFAULT: '#c8c8c8',
              100: '#282828',
              200: '#505050',
              300: '#777777',
              400: '#9f9f9f',
              500: '#c8c8c8',
              600: '#d2d2d2',
              700: '#dddddd',
              800: '#e9e9e9',
              900: '#f4f4f4'
            },
            sage: {
              DEFAULT: '#bbb891',
              100: '#292819',
              200: '#525032',
              300: '#7b784c',
              400: '#a29e67',
              500: '#bbb891',
              600: '#c9c6a6',
              700: '#d6d5bd',
              800: '#e4e3d3',
              900: '#f1f1e9'
            },
            persian: {
              DEFAULT: '#dc965a',
              100: '#331e0b',
              200: '#673c16',
              300: '#9a5921',
              400: '#cd772c',
              500: '#dc965a',
              600: '#e3ac7c',
              700: '#eac19d',
              800: '#f1d5bd',
              900: '#f8eade'
            },
            raisin: {
              DEFAULT: '#242325',
              100: '#070707',
              200: '#0e0e0f',
              300: '#151516',
              400: '#1d1c1d',
              500: '#242325',
              600: '#504d52',
              700: '#7b787f',
              800: '#a7a5aa',
              900: '#d3d2d4'
            }
          }
        }
      }
    }
  </script>

  {{-- FontAwesome CDN --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
</head>
<body class="flex flex-col min-h-screen bg-silver/20 font-sans leading-normal tracking-normal">

    {{-- Barra superior --}}
    <nav class="bg-raisin text-silver shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">
                <i class="fas fa-database text-persian"></i> Examen U1
            </h1>
            <div class="flex items-center gap-4">
                @auth
                    <span class="text-silver">{{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-silver hover:text-white">
                            <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-silver hover:text-white">
                        <i class="fas fa-sign-in-alt"></i> Iniciar sesión
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- Contenido --}}
    <main class="flex-1 container mx-auto py-8 px-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-sage text-raisin text-sm py-6 text-center">
        © {{ date('Y') }} Desarrollado por Jordy Mejía
    </footer>

</body>
</html>