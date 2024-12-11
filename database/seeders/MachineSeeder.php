<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Machine;


class MachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Machine::create(['name' => 'Premix Preparator']);
        Machine::create(['name' => 'Moulding Line']);
        Machine::create(['name' => 'Extractor']);
        Machine::create(['name' => 'Moisturizer']);
        Machine::create(['name' => 'Packaging']);
        Machine::create(['name' => 'Heat Oven']);
    }
}
