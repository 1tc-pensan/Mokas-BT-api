<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::factory()->count(3)->create();
        $tasks=[
            [
                'title'=>'Task 1',
                'description'=>'Description for Task 1',
                'státusz'=>'függőben',
            ],
            [
                'title'=>'Task 2',
                'description'=>'Description for Task 2',
                'státusz'=>'folyamatba',
            ],
            [
                'title'=>'Task 3',
                'description'=>'Description for Task 3',
                'státusz'=>'befejezett',
            ],
        ];
    }
}
