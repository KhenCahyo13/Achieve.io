<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Arr;
use Modules\Master\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'Admin',
            ],
            [
                'name' => 'Francesco Bagnaia',
                'email' => 'bagnaia@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'Supervisor',
            ],
            [
                'name' => 'Marc Marquez',
                'email' => 'marquez@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'Supervisor',
            ],
            [
                'name' => 'Fabio Quartararo',
                'email' => 'quartararo@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'Supervisor',
            ],
            [
                'name' => 'Jorge Martin',
                'email' => 'martin@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'Student',
            ],
            [
                'name' => 'Enea Bastianini',
                'email' => 'bastianini@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'Student',
            ],
            [
                'name' => 'Brad Binder',
                'email' => 'binder@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'Student',
            ],
            [
                'name' => 'Maverick Vinales',
                'email' => 'vinales@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'Student',
            ],
            [
                'name' => 'Aleix Espargaro',
                'email' => 'espargaro@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'Student',
            ],
        ];

        foreach ($users as $data) {
            $user = User::create(Arr::except($data, ['role']));
            $user->assignRole($data['role']);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {}
};
