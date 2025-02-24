<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class OutcomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        $data = [];
    
        $categories = Category::whereIn('name', ['salario', 'donación'])->get();
    
        for ($i = 0; $i <= 50; $i++) {
            $data[] = [
                'date' => $now,
                'category_id' => $categories->random()->id, 
                'taxes' => rand(50, 5000),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        DB::table('outcomes')->insert($data);
    }
}
