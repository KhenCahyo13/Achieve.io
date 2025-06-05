<?php

use Illuminate\Database\Migrations\Migration;
use Modules\Achievement\Models\Field;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $fields = [
            ['name' => 'Web Development', 'general_name' => 'Software Development'],
            ['name' => 'Mobile Development', 'general_name' => 'Software Development'],
            ['name' => 'Cloud Computing', 'general_name' => 'Cloud Computing'],
            ['name' => 'Networking', 'general_name' => 'Cloud Computing'],
            ['name' => 'Machine Learning', 'general_name' => 'Data Analyst'],
            ['name' => 'Artificial Intelligence', 'general_name' => 'AI'],
            ['name' => 'UI/UX Design', 'general_name' => 'Design'],
        ];

        foreach ($fields as $field) {
            Field::create([
                'name' => $field['name'],
                'general_name' => $field['general_name'],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {}
};
