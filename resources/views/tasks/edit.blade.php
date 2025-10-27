<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarea</title>
</head>
<body>
    <h1>Editar Tarea</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PATCH')

        <div>
            <label for="title">Título</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}" required>
        </div>

        <div>
            <label for="description">Descripción</label>
            <textarea name="description" id="description" rows="4">{{ $task->description }}</textarea>
        </div>

        <div>
            <label for="deadline">Fecha Límite</label>
            <input type="date" name="deadline" id="deadline" value="{{ $task->deadline ? $task->deadline->format('Y-m-d') : '' }}">
        </div>

        <div>
            <label for="status_id">Estado</label>
            <select name="status_id" id="status_id" required>
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}" {{$task->status_id == $status-> id ? 'selected' : '' }}>
                        {{ $status->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="priority_id">Prioridad</label>
            <select name="priority_id" id="priority_id" required>
                @foreach ($priorities as $priority)
                    <option value="{{ $priority->id }}" {{ $task->priority_id == $priority->id ? 'selected' : '' }}>
                        {{ $priority->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <a href="{{ route('tasks.index') }}">Cancelar</a>
            <button type="submit">Actualizar Tarea</button>
        </div>
    </form>

    <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta tarea?');">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar Tarea</button>
    </form>
</body>
</html>