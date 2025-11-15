<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\WeightTarget;
use App\Models\WeightLog;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Test Taro',
            'email' => 'test'.rand(1,1000).'@example.com',
            'password' => bcrypt('password'),
        ]);

        WeightTarget::factory()->create([
            'user_id' => $user->id,
            'target_weight' => 60.0,
        ]);

        WeightLog::factory(35)->create([
            'user_id' => $user->id,
        ]);
    }
}
