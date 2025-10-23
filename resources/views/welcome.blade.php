<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bienvenido - Task Manager</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Activar modo oscuro futurista opcional */
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-blue-900 via-indigo-900 to-purple-900 text-white min-h-screen flex items-center justify-center">

  <div class="text-center px-6 max-w-2xl">
    <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight mb-6 bg-clip-text text-transparent bg-gradient-to-r from-blue-400 via-purple-400 to-indigo-500">
      Bienvenido a Task Manager
    </h1>
    <p class="text-lg md:text-xl text-purple-200 mb-10">
      Tu gestor de tareas del futuro. Organiza, prioriza y conquista tu día con tecnología de vanguardia.
    </p>
    
    <div class="flex justify-center space-x-4">
      <a href="{{ route('about') }}" class="px-6 py-3 rounded-lg bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 transition transform hover:scale-105 shadow-lg">
        Acerca de nosotros
      </a>
      <a href="{{ route('contact') }}" class="px-6 py-3 rounded-lg border border-purple-400 text-purple-200 hover:bg-purple-800 transition transform hover:scale-105">
        Contacto
      </a>
    </div>
  </div>

  <!-- Fondo decorativo -->
  <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-[-1]">
    <div class="absolute -top-20 -left-20 w-[600px] h-[600px] bg-purple-600 opacity-20 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-blue-500 opacity-20 rounded-full blur-2xl animate-pulse delay-200"></div>
  </div>

</body>
</html>
