<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Tareas</title>

    <!-- ✅ Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex flex-col items-center p-6">

    <h1 class="text-3xl font-bold text-gray-800 mb-6">📝 Mis Tareas</h1>

    <div class="w-full max-w-4xl grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($tasks as $task)
            <div class="bg-white shadow-lg rounded-2xl p-5 flex flex-col justify-between border border-gray-100 hover:shadow-xl transition duration-300">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">
                        {{ $task->title }}
                    </h2>
                    <p class="text-gray-600 text-sm mb-4">
                        {{ $task->description }}
                    </p>
                </div>

                <div class="mt-auto">
                    <div class="flex justify-between items-center mb-2">
                        <span class="inline-block px-2 py-1 text-xs font-medium rounded-full 
                            {{ $task->status->name == 'Completada' ? 'bg-green-100 text-green-700' : 
                               ($task->status->name == 'Pendiente' ? 'bg-yellow-100 text-yellow-700' : 'bg-gray-100 text-gray-700') }}">
                            {{ $task->status->name }}
                        </span>

                        <span class="inline-block px-2 py-1 text-xs font-medium rounded-full 
                            {{ $task->priority->name == 'Alta' ? 'bg-red-100 text-red-700' : 
                               ($task->priority->name == 'Media' ? 'bg-orange-100 text-orange-700' : 'bg-blue-100 text-blue-700') }}">
                            {{ $task->priority->name }}
                        </span>
                    </div>

                    <div class="text-sm text-gray-500">
                        <span class="font-medium">Límite:</span>
                        {{ $task->deadline ? $task->deadline->format('d M, Y') : 'N/A' }}
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white shadow-lg rounded-2xl p-8 text-center border border-gray-100">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">🎉 ¡Todo en orden!</h3>
                <p class="text-gray-600 mb-4">No tienes tareas registradas por el momento.</p>
                <a href="#"
                   class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700 transition">
                    Crear primera tarea
                </a>
            </div>
        @endforelse
    </div>

</body>
</html>
