<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            ['name' => 'Write new code', 'priority' =>1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Test bug', 'priority' =>2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Upload to coalision', 'priority' =>3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Relax', 'priority' =>4, 'created_at' => now(), 'updated_at' => now()]
        ];

        foreach($tasks as $task) {
            Task::firstOrCreate(
                ['name' =>  Arr::get($task, 'name')],
                $task
            );

        }
    }
}
