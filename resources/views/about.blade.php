<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Acerca de Nosotros</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

  <header class="bg-blue-600 text-white py-6 shadow">
    <div class="max-w-4xl mx-auto px-4">
      <h1 class="text-3xl font-bold">Acerca de Nosotros</h1>
    </div>
  </header>

  <main class="max-w-4xl mx-auto px-4 py-10 space-y-10">

    <section>
      <h2 class="text-2xl font-semibold text-blue-700 mb-2">Nuestra Historia</h2>
      <p class="text-gray-700">
        Somos una empresa dedicada a ofrecer soluciones tecnológicas innovadoras desde 2010. Nuestro objetivo es ayudar a las personas y organizaciones a crecer mediante el uso eficiente de la tecnología.
      </p>
    </section>

    <section>
      <h2 class="text-2xl font-semibold text-blue-700 mb-2">Misión</h2>
      <p class="text-gray-700">
        Nuestra misión es proporcionar productos y servicios de alta calidad que mejoren la vida de nuestros clientes.
      </p>
    </section>

    <section>
      <h2 class="text-2xl font-semibold text-blue-700 mb-2">Visión</h2>
      <p class="text-gray-700">
        Aspiramos a ser líderes en el sector tecnológico, reconocidos por nuestra innovación, compromiso y excelencia.
      </p>
    </section>

    <section>
      <h2 class="text-2xl font-semibold text-blue-700 mb-2">Equipo</h2>
      <p class="text-gray-700">
        Contamos con un equipo multidisciplinario de profesionales apasionados por la tecnología y el desarrollo personal.
      </p>
      <a href="{{ route('home') }}">Inicio</a>
    </section>

    <section>
        <a href="{{ route('home') }}" class="px-6 py-3 rounded-lg bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 transition transform hover:scale-105 shadow-lg">
            Inicio
        </a>
    </section>


  </main>

  <footer class="bg-gray-100 text-center py-4 mt-10 border-t text-sm text-gray-600">
    &copy; 2025 Nuestra Empresa. Todos los derechos reservados.
  </footer>

</body>
</html>
