<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TaskCatalogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['name' => 'pendiente'],
            ['name' => '25%'],
            ['name' => '50%'],
            ['name' => '75%'],
            ['name' => 'completada'],
        ];

        DB::table('task_statuses')->insert($statuses);

        $priorities = [
            ['name' => 'baja'],
            ['name' => 'media'],
            ['name' => 'alta'],
        ];        

        DB::table('task_priorities')->insert($priorities);

    }

}
