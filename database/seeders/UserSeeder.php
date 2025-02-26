<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Use UserFactory to create 10 users.
        User::factory()->count(10)->create();
        $this->command->info('Users table seeded with 10 users!');
    }
}
