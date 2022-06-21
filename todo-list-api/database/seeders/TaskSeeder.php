<?php

namespace Database\Seeders;
use App\Models\Task;

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::create([
            'name'              => 'criar login com JWT',
            'completion_date'   => '2022-06-17',
            'status'            => 'Concluído',
            'user_id'           => 3,
        ]);
        Task::create([
            'name'              => 'criar CRUD de tarefas',
            'completion_date'   => '2022-06-18',
            'status'            => 'Concluído',
            'user_id'           => 8,
        ]);
        Task::create([
            'name'              => 'enviar email ao atualizar registro',
            'completion_date'   => '2022-06-20',
            'status'            => 'Aberto',
            'user_id'           => 8,
        ]);
        Task::create([
            'name'              => 'testar rotas de API',
            'completion_date'   => '2022-06-21',
            'status'            => 'Aberto',
            'user_id'           => 4,
        ]);
    }
}
