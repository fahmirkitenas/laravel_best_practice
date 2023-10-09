<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Tweet;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat data dummy User
        User::factory(1)->create();

        // Membuat data dummy Tweet dengan user_id 1
        Tweet::factory(10)->create(['user_id' => 1]);
    }
}
