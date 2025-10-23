<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contacto - TaskNova</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gradient-to-br from-blue-900 via-indigo-900 to-purple-900 text-white min-h-screen flex items-center justify-center relative">

  <div class="w-full max-w-3xl px-6 py-10 bg-white/5 backdrop-blur-sm rounded-xl shadow-lg border border-white/10">
    <h1 class="text-4xl md:text-5xl font-bold text-center mb-8 bg-clip-text text-transparent bg-gradient-to-r from-blue-400 via-purple-400 to-indigo-500">
      Contáctanos
    </h1>

    <p class="text-center text-purple-200 mb-10">
      ¿Tienes dudas, ideas o sugerencias? Escríbenos y te responderemos lo antes posible.
    </p>

    <form action="#" method="POST" class="space-y-6">
      <div>
        <label for="name" class="block mb-2 text-sm text-purple-300">Nombre</label>
        <input type="text" id="name" name="name" required
          class="w-full px-4 py-3 rounded-lg bg-white/10 text-white placeholder-purple-300 focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Tu nombre completo" />
      </div>

      <div>
        <label for="email" class="block mb-2 text-sm text-purple-300">Correo Electrónico</label>
        <input type="email" id="email" name="email" required
          class="w-full px-4 py-3 rounded-lg bg-white/10 text-white placeholder-purple-300 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="nombre@ejemplo.com" />
      </div>

      <div>
        <label for="message" class="block mb-2 text-sm text-purple-300">Mensaje</label>
        <textarea id="message" name="message" rows="5" required
          class="w-full px-4 py-3 rounded-lg bg-white/10 text-white placeholder-purple-300 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Escribe tu mensaje aquí..."></textarea>
      </div>

      <div class="text-center">
        <button type="submit"
          class="mt-4 px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg shadow-md hover:from-blue-600 hover:to-purple-700 transition transform hover:scale-105">
          Enviar mensaje
        </button>
      </div>
    </form>
  </div>

  <!-- Fondo decorativo -->
  <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10">
    <div class="absolute -top-24 -left-32 w-[600px] h-[600px] bg-purple-600 opacity-20 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-blue-500 opacity-20 rounded-full blur-2xl animate-pulse delay-200"></div>
  </div>

</body>
</html>
