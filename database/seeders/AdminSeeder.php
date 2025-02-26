<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Admin;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $admin =
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'username' => 'superadmin',
                'password' => Hash::make('12345678'),
            ];

        Admin::create($admin);

        // Run factory to create additional admins with unique details.
        Admin::factory()->count(10)->create();
        $this->command->info('Admins table seeded with 11 admins!');
    }
}
