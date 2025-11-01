
<x-app-layout>

    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-200 leading-tight">
                {{ 'Editar tarea' }}
            </h2>
    </x-slot>

    <div class="flex justify-center">

        <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl shadow-2xl p-8 w-full max-w-lg text-white">
    
            {{-- Formulario de actualización --}}
            <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-5">
                @csrf
                @method('PATCH')
    
                <div>
                    <label for="title" class="block text-sm font-medium text-purple-200 mb-1">Título</label>
                    <input type="text" name="title" id="title" value="{{ $task->title }}" required
                        class="w-full bg-transparent border border-purple-500/40 rounded-lg p-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-purple-400 transition duration-300">
                </div>
    
                <div>
                    <label for="description" class="block text-sm font-medium text-purple-200 mb-1">Descripción</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full bg-transparent border border-purple-500/40 rounded-lg p-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-purple-400 transition duration-300">{{ $task->description }}</textarea>
                </div>
    
                <div>
                    <label for="deadline" class="block text-sm font-medium text-purple-200 mb-1">Fecha Límite</label>
                    <input type="date" name="deadline" id="deadline" 
                        value="{{ $task->deadline ? $task->deadline->format('Y-m-d') : '' }}"
                        class="w-full bg-transparent border border-purple-500/40 rounded-lg p-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-purple-400 transition duration-300">
                </div>
    
                <div>
                    <label for="status_id" class="block text-sm font-medium text-purple-200 mb-1">Estado</label>
                    <select name="status_id" id="status_id" required
                        class="w-full bg-transparent border border-purple-500/40 rounded-lg p-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-300">
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}" {{ $task->status_id == $status->id ? 'selected' : '' }} class="bg-indigo-900">
                                {{ $status->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
    
                <div>
                    <label for="priority_id" class="block text-sm font-medium text-purple-200 mb-1">Prioridad</label>
                    <select name="priority_id" id="priority_id" required
                        class="w-full bg-transparent border border-purple-500/40 rounded-lg p-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-300">
                        @foreach ($priorities as $priority)
                            <option value="{{ $priority->id }}" {{ $task->priority_id == $priority->id ? 'selected' : '' }} class="bg-indigo-900">
                                {{ $priority->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                @if($groups->count() > 0)
                    <div>
                        <label for="group_id" class="block text-sm font-medium text-purple-200 mb-1">Grupo</label>
                        <select name="group_id" id="group_id" 
                            class="w-full bg-transparent border border-purple-500/40 rounded-lg p-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-300">
                            <option value="">Seleccionar un grupo</option>
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}" {{ $task->group_id == $group->id ? 'selected' : '' }} class="bg-indigo-900">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <p>No tienes ningun grupo creado aún</p>
                @endif
    
                <div class="flex justify-between items-center pt-4">
                    <a href="{{ route('tasks.index') }}"
                       class="text-sm text-purple-300 hover:text-purple-100 transition duration-300">
                        Cancelar
                    </a>
    
                    <div class="flex gap-3">
                        <button type="submit"
                            class="px-6 py-2 rounded-lg bg-gradient-to-r from-purple-600 to-blue-600 hover:from-blue-600 hover:to-purple-600 text-white font-semibold shadow-lg hover:shadow-purple-500/30 transition duration-300">
                            Actualizar
                        </button>
    
                        {{-- Botón que activa el modal de confirmación --}}
                        <button type="button" id="deleteButton"
                            class="px-6 py-2 rounded-lg bg-gradient-to-r from-red-600 to-pink-600 hover:from-pink-600 hover:to-red-600 text-white font-semibold shadow-lg hover:shadow-red-500/30 transition duration-300">
                            Eliminar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    
        {{-- Modal de confirmación --}}
        <div id="deleteModal" class="fixed inset-0 hidden bg-black/70 backdrop-blur-sm flex items-center justify-center z-50">
            <div class="bg-white/10 border border-white/20 p-6 rounded-2xl shadow-xl text-center text-white max-w-sm">
                <h2 class="text-xl font-semibold mb-4">¿Eliminar esta tarea?</h2>
                <p class="text-sm text-purple-200 mb-6">Esta acción no se puede deshacer.</p>
    
                <div class="flex justify-center gap-4">
                    <button id="cancelDelete" 
                        class="px-5 py-2 rounded-lg bg-gray-600/60 hover:bg-gray-500 transition duration-300">
                        Cancelar
                    </button>
    
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" id="deleteForm">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-5 py-2 rounded-lg bg-gradient-to-r from-red-600 to-pink-600 hover:from-pink-600 hover:to-red-600 text-white font-semibold shadow-lg hover:shadow-red-500/30 transition duration-300">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <style>
        body {
            background-size: 200% 200%;
            animation: gradientShift 8s ease infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>

    <script>
        // Mostrar y ocultar modal
        const deleteButton = document.getElementById('deleteButton');
        const deleteModal = document.getElementById('deleteModal');
        const cancelDelete = document.getElementById('cancelDelete');

        deleteButton.addEventListener('click', () => {
            deleteModal.classList.remove('hidden');
        });

        cancelDelete.addEventListener('click', () => {
            deleteModal.classList.add('hidden');
        });

        // Cerrar modal al hacer clic fuera
        deleteModal.addEventListener('click', (e) => {
            if (e.target === deleteModal) {
                deleteModal.classList.add('hidden');
            }
        });
    </script>


</x-app-layout>

    

