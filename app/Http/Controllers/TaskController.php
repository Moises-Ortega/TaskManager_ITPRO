<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = [
            ['titulo' => 'Tarea opcional'],
            ['titulo' => 'Tarea obligatoria'],
            ['titulo' => 'Terminar informe bimestral de servicio social'],
            ['titulo' => 'Comprar pluma']
        ];
        $unlessVariable = [1, 2, 3];
        $counter = 1;
        $sum = 0;
        $name = "<script>alert('Hackeado!');</script>";
        return view('tasks.index', compact('tasks', 'unlessVariable', 'counter', 'sum', 'name'));
    }
}
