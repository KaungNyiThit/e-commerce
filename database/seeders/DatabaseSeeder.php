<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Spec;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $lists = ['Phone', 'Laptop'];
        foreach($lists as $name){
            Category::create(['name' => $name]);
        }


        
            

        

    }
}
