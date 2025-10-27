<!DOCTYPE html>
<html lang="es" class="dark"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Tareas</title>
    
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gradient-to-br from-blue-900 via-indigo-900 to-purple-900 min-h-screen">

    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        
        <h1 class="font-semibold text-3xl text-gray-800 dark:text-gray-200 leading-tight mb-8">
            Mis Tareas
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            @forelse ($tasks as $task)
                @php
                    $priorityName = strtolower($task->priority->name);
                    
                    $borderClass = [
                        'alta' => 'border-indigo-500 dark:border-indigo-400',
                        'media' => 'border-purple-500 dark:border-purple-400',
                        'baja' => 'border-blue-500 dark:border-blue-400',
                    ][$priorityName] ?? 'border-gray-500 dark:border-gray-400';

                    $titleClass = [
                        'alta' => 'text-indigo-700 dark:text-indigo-300',
                        'media' => 'text-purple-700 dark:text-purple-300',
                        'baja' => 'text-blue-700 dark:text-blue-300',
                    ][$priorityName] ?? 'text-gray-700 dark:text-gray-300';
                    
                    // Ajusté el color de 'alta' para que tenga mejor contraste
                    $priorityBadgeClass = [
                        'alta' => 'bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300', 
                        'media' => 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300',
                        'baja' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
                    ][$priorityName] ?? 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300';
                @endphp

                <div @class([
                    'bg-white dark:bg-gray-800',
                    'rounded-lg shadow-md overflow-hidden',
                    'transition-all duration-300 hover:shadow-xl hover:-translate-y-1',
                    'border-l-4',
                    $borderClass,
                ])>
                    <div class="p-5 flex flex-col h-full">

                        <div>
                            <div class="flex justify-between items-start mb-3">
                                <h2 @class([
                                    'text-lg font-semibold break-words',
                                    $titleClass
                                ])>
                                    {{ $task->title }}
                                </h2>
                                <a href="{{ route('tasks.edit', parameters: $task) }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-200 flex-shrink-0 ml-4">
                                    Editar
                                </a>
                            </div>
                            
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                                {{ $task->description }}
                            </p>
                        </div>

                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mt-auto pt-4">
                            <div class="flex flex-wrap gap-2">
                                <span @class([
                                    'px-2 py-0.5 inline-flex items-center text-xs leading-5 font-semibold rounded-full',
                                    'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' => $task->status->name == 'completada',
                                    'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300' => $task->status->name == 'pendiente',
                                    'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300' => in_array($task->status->name, ['25%', '50%', '75%']),
                                ])>
                                    <svg class="-ml-0.5 mr-1 h-3 w-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 000-1.5H10.75V5z" clip-rule="evenodd"></path></svg>
                                    {{ $task->status->name }}
                                </span>
                                
                                <span @class([
                                    'px-2 py-0.5 inline-flex items-center text-xs leading-5 font-semibold rounded-full',
                                    $priorityBadgeClass
                                ])>
                                    <svg class="w-3 h-3 -ml-0.5 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    {{ $task->priority->name }}
                                </span>
                            </div>

                            <div class="text-xs text-gray-500 dark:text-gray-300 mt-2 sm:mt-0 flex-shrink-0">
                                <span class="font-medium">Límite:</span>
                                {{ $task->deadline ? $task->deadline->format('d M, Y') : 'N/A' }}
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="flex flex-col items-center justify-center text-center bg-white dark:bg-gray-800 rounded-lg shadow-md p-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">¡Todo en orden!</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">No tienes tareas registradas por el momento.</p>
                        <a href="#" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Crear primera tarea
                        </a>
                    </div>
                </div>
            @endforelse

        </div>
    </div>

</body>
</html>