<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-200 leading-tight">
            {{ 'Crear grupo' }}
        </h2>
    </x-slot>

    <div class="flex justify-center">

        <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl shadow-2xl p-8 w-full max-w-lg text-white">

            <form action="{{ route('groups.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Nombre -->
                <div>
                    <label for="name" class="block text-sm font-medium text-purple-200 mb-1">Nombre del grupo</label>
                    <input type="text" name="name" id="name" required
                        class="w-full bg-transparent border border-purple-500/40 rounded-lg p-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-purple-400 transition duration-300"
                        placeholder="Ej. Proyecto final, Casa, Estudio...">
                </div>

                <!-- Descripción -->
                <div>
                    <label for="description" class="block text-sm font-medium text-purple-200 mb-1">Descripción</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full bg-transparent border border-purple-500/40 rounded-lg p-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:border-purple-400 transition duration-300"
                        placeholder="Describe brevemente el propósito del grupo..."></textarea>
                </div>

                <!-- Categoría -->
                <div>
                    <label for="category_id" class="block text-sm font-medium text-purple-200 mb-1">Categoría</label>
                    <select name="category_id" id="category_id"
                        class="w-full bg-transparent border border-purple-500/40 rounded-lg p-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-300">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" class="bg-indigo-900">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Prioridad -->
                <div>
                    <label for="priority_id" class="block text-sm font-medium text-purple-200 mb-1">Prioridad</label>
                    <select name="priority_id" id="priority_id"
                        class="w-full bg-transparent border border-purple-500/40 rounded-lg p-3 text-white focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-300">
                        @foreach ($priorities as $priority)
                            <option value="{{ $priority->id }}" class="bg-indigo-900">
                                {{ $priority->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Botones -->
                <div class="flex justify-between items-center pt-4">
                    <a href="{{ route('groups.index') }}"
                        class="text-sm text-purple-300 hover:text-purple-100 transition duration-300">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="px-6 py-2 rounded-lg bg-gradient-to-r from-purple-600 to-blue-600 hover:from-blue-600 hover:to-purple-600 text-white font-semibold shadow-lg hover:shadow-purple-500/30 transition duration-300">
                        Crear Grupo
                    </button>
                </div>
            </form>
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

</x-app-layout>
