<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class GroupCatalogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'escolar'],
            ['name' => 'laboral'],
            ['name' => 'compras'],
            ['name' => 'quehaceres']
        ];

        DB::table('group_categories')->insert($categories);

        $priorities = [
            ['name' => 'baja'],
            ['name' => 'media'],
            ['name' => 'alta'],
        ]; 

        DB::table('group_priorities')->insert($priorities);
    }
}
