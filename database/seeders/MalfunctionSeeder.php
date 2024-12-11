<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Malfunction;
 
class MalfunctionSeeder extends Seeder
{
    public function run()
    {
        $malfunctions = [
            ['machine_id' => 1, 'status_id' => 1, 'user_id' => 1, 'description' => 'Machine stopped working.', 'finished_at' => null],
            ['machine_id' => 2, 'status_id' => 2, 'user_id' => 2, 'description' => 'Need maintenance.', 'finished_at' => null],
            ['machine_id' => 3, 'status_id' => 3, 'user_id' => 3, 'description' => 'Parts replacement required.', 'finished_at' => null],
            ['machine_id' => 4, 'status_id' => 1, 'user_id' => 1, 'description' => 'Overheating issue.', 'finished_at' => null],
            ['machine_id' => 5, 'status_id' => 2, 'user_id' => 2, 'description' => 'Noisy operation.', 'finished_at' => null],
            ['machine_id' => 6, 'status_id' => 3, 'user_id' => 3, 'description' => 'Electrical malfunction.', 'finished_at' => null],
        ];
 
        foreach ($malfunctions as $data) {
            $item = new Malfunction();
            $item->machine_id = $data['machine_id'];
            $item->status_id = $data['status_id'];
            $item->user_id = $data['user_id'];
            $item->description = $data['description'];
            $item->finished_at = $data['finished_at']; // Set to null
            $item->save();
        }
    }
}