<?php

use Illuminate\Database\Migrations\Migration;
use Modules\Master\Models\Permission;
use Modules\Master\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create roles
        $roles = collect(['Admin', 'Student', 'Supervisor'])
            ->mapWithKeys(fn ($role) => [$role => Role::create(['name' => $role])]);

        // Define all permissions
        $permissions = [
            'department' => ['create', 'view', 'update', 'delete'],
            'study program' => ['create', 'view', 'update', 'delete'],
            'period' => ['create', 'view', 'update', 'delete'],
            'competition' => ['create', 'view', 'update', 'delete', 'approve'],
            'achievement' => ['create', 'view', 'update', 'delete', 'approve'],
        ];

        $allPermissions = [];

        foreach ($permissions as $module => $actions) {
            foreach ($actions as $action) {
                $perm = Permission::create(['name' => "{$action} {$module}"]);
                $allPermissions["{$action} {$module}"] = $perm;
            }
        }

        // Assign all to Admin
        $roles['Admin']->givePermissionTo($allPermissions);

        // Assign only competition permissions to Student & Supervisor
        $competitionPermissions = collect($allPermissions)
            ->filter(fn ($_, $key) => str_contains($key, 'competition') && $key !== 'approve competition')
            ->values();
        $achievementPermissions = collect($allPermissions)
            ->filter(fn ($_, $key) => str_contains($key, 'achievement') && $key !== 'approve achievement')
            ->values();

        $roles['Student']->givePermissionTo($competitionPermissions, $achievementPermissions);
        $roles['Supervisor']->givePermissionTo($competitionPermissions, $achievementPermissions);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {}
};
