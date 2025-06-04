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
            ['name' => 'Development', 'general_name' => 'Software & Systems'],
            ['name' => 'Data Science', 'general_name' => 'Data & AI'],
            ['name' => 'Artificial Intelligence', 'general_name' => 'Data & AI'],
            ['name' => 'Cloud & Infrastructure', 'general_name' => 'Software & Systems'],
            ['name' => 'Software Engineering', 'general_name' => 'Software & Systems'],
            ['name' => 'Marketing', 'general_name' => 'Business & Marketing'],
            ['name' => 'Engineering', 'general_name' => 'Engineering & Design'],
            ['name' => 'Machine Learning', 'general_name' => 'Data & AI'],
            ['name' => 'Business Analytics', 'general_name' => 'Business & Marketing'],
            ['name' => 'AI Research', 'general_name' => 'Research & Development'],
            ['name' => 'Design', 'general_name' => 'Engineering & Design'],
            ['name' => 'Biotechnology', 'general_name' => 'Research & Development'],
            ['name' => 'Human Resources', 'general_name' => 'Business & Marketing'],
            ['name' => 'Physics', 'general_name' => 'Research & Development'],
            ['name' => 'Medical Science', 'general_name' => 'Research & Development'],
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
