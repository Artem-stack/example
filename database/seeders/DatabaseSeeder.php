<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
     static $status = [
        'waiting',
        'in progress',
        'completed'
    ];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        foreach (self::$status as $status) {
            DB::table('status')->insert([
                'name' => $status,
                
            ]);
        }
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
