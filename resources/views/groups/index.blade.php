<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-200 leading-tight">
                {{ 'Mis Grupos' }}
            </h2>
            <a href="{{ route('groups.create') }}"
                class="text-sm text-gray-900 hover:text-purple-100 transition duration-300">
                Crear grupo
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse ($groups as $group)
                @php
                    $priorityName = strtolower(optional($group->priority)->name ?? '');
                    
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

                    $priorityBadgeClass = [
                        'alta' => 'bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-300',
                        'media' => 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300',
                        'baja' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
                    ][$priorityName] ?? 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300';
                @endphp

                <div @class([
                    'bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden border-l-4 transition-all duration-300 hover:shadow-xl hover:-translate-y-1',
                    $borderClass,
                ])>
                    <div class="p-6 flex flex-col h-full">
                        <div class="flex justify-between items-start mb-4">
                            <h3 @class([
                                'text-lg font-semibold break-words',
                                $titleClass
                            ])>
                                {{ $group->name }}
                            </h3>
                            <a href="{{ route('groups.edit', $group) }}" 
                                class="text-sm font-medium text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-200">
                                Editar
                            </a>
                        </div>

                        @if ($group->description)
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                                {{ Str::limit($group->description, 120) }}
                            </p>
                        @endif

                        <div class="flex flex-wrap gap-2 mb-4">
                            @if ($group->category)
                                <span class="px-2 py-0.5 inline-flex items-center text-xs font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                    {{ $group->category->name }}
                                </span>
                            @endif

                            @if ($group->priority)
                                <span @class([
                                    'px-2 py-0.5 inline-flex items-center text-xs font-semibold rounded-full',
                                    $priorityBadgeClass
                                ])>
                                    {{ $group->priority->name }}
                                </span>
                            @endif
                        </div>

                        {{-- Lista de tareas --}}
                        @if ($group->tasks->count() > 0)
                            <ul class="space-y-3">
                                @foreach ($group->tasks as $task)
                                    <li class="border border-gray-200 dark:border-gray-700 rounded-md p-3 hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-300">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <strong class="text-gray-900 dark:text-white">{{ $task->title }}</strong>
                                                @if ($task->description)
                                                    <p class="text-sm text-gray-600 dark:text-gray-300">
                                                        {{ Str::limit($task->description, 80) }}
                                                    </p>
                                                @endif
                                            </div>
                                            <a href="{{ route('tasks.edit', $task) }}" 
                                                class="text-xs font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-200">
                                                Editar
                                            </a>
                                        </div>

                                        <div class="mt-2 text-xs text-gray-500 dark:text-gray-300 flex flex-wrap gap-2">
                                            <span>Estado: {{ $task->status->name }}</span>
                                            <span>|</span>
                                            <span>Prioridad: {{ $task->priority->name }}</span>
                                            @if ($task->deadline)
                                                <span>|</span>
                                                <span>Límite: {{ $task->deadline->format('d M, Y') }}</span>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-sm text-gray-500 dark:text-gray-400 italic">No hay tareas en este grupo.</p>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3">
                    <div class="flex flex-col items-center justify-center text-center bg-white dark:bg-gray-800 rounded-lg shadow-md p-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Sin grupos aún</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Organiza tus tareas creando tu primer grupo.</p>
                        <a href="{{ route('groups.create') }}" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Crear primer grupo
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

</x-app-layout>
