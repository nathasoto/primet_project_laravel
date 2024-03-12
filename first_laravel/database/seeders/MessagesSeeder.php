<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('messages')->insert([
            'id'=>Str::uuid(),
            'message' => Str::random(300), 
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => 1,
        ]);
        
      
    }
}
