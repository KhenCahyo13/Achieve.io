<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;
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
                'name' => 'alexrin',
                'email' => 'alexrin@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'Supervisor',
            ],
            [
                'name' => 'zarco',
                'email' => 'zarco@gmail.com',
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
