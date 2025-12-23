<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trashcan;

class TrashcanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Trashcan::create([
            'location' => 'Building A - Floor 1',
            'waste_type' => 'organic',
            'capacity' => 100,
            'test_var' => 'Example 1',
            'fill_level' => 0,
        ]);
    }
}
