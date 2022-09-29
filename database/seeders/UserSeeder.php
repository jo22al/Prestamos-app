<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        User::factory()->count(1)
            ->create()
            ->each(
                function ($user) {
                    $user->assignRole('Admin');
                }
            );

        User::factory()->count(1)
            ->create()
            ->each(
                function ($user) {
                    $user->assignRole('Secretaria');
                }
            );

        User::create([
            'nombre' => 'Mario Ramirez',
            'correo' => 'admin@example.com',
            'password' => '123456789',
        ])->each(
            function ($user) {
                $user->assignRole('Admin');
            }
        );
    }
}
