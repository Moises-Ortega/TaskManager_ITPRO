<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks Index</title>
</head>
<body>
    <h1>Bienvenido al Tasks Index</h1>
    <h2>¡Bienvenido {{ $name }}!</h2>
    <p>Vista tasks.index</p>
    @if (count($tasks) === 1)
        <p>Tienes una sola tarea.<p/>
    @elseif (count($tasks) > 1)
        <p>Tienes múltiples tareas.<p/>
    @else
        <p>No tienes tareas pendientes. ¡Felicidades!<p/>
    @endif

    @unless (1 === 0)
        <p>1 no es igual a 0</p>
    @endunless

    @isset($unlessVariable)
        <p>UnlessVariable no es nula</p>
    @endisset

    @empty($unlessVariable)
        <p>UnlessVariable se encuentra vacía</p>
    @endempty

    @for ($i = 0; $i < 5; $i++)
        <p>Iteración número {{ $i }}</p>
    @endfor

    @while ($counter < 10)
        @php
            $counter++;
            $sum = $sum + $counter;
        @endphp
        <p>Suma del contador: {{ $sum }}</p>
    @endwhile

    @foreach ( $tasks as $task )
        <li>{{ $task['titulo'] }}</li>
    @endforeach

</body>
</html>