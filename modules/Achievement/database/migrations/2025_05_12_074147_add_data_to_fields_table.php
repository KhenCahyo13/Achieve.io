<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Achievement\Models\Field;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        $fields = [
            ['name' => 'Web Development', 'general_name' => 'Software & Systems'],
            ['name' => 'Mobile Development', 'general_name' => 'Software & Systems'],
            ['name' => 'Software Engineering', 'general_name' => 'Software & Systems'],
            ['name' => 'Machine Learning', 'general_name' => 'Data & AI'],
            ['name' => 'Data Science', 'general_name' => 'Data & AI'],
            ['name' => 'Artificial Intelligence', 'general_name' => 'Data & AI'],
            ['name' => 'Cloud Computing', 'general_name' => 'Software & Systems'],
            ['name' => 'Cybersecurity', 'general_name' => 'Software & Systems'],
            ['name' => 'Network Engineering', 'general_name' => 'Software & Systems'],
            ['name' => 'Mechanical Design', 'general_name' => 'Engineering & Design'],
            ['name' => 'Automotive Engineering', 'general_name' => 'Engineering & Design'],
            ['name' => 'Manufacturing Technology', 'general_name' => 'Engineering & Design'],
            ['name' => 'Accounting', 'general_name' => 'Business & Marketing'],
            ['name' => 'Finance', 'general_name' => 'Business & Marketing'],
            ['name' => 'Management Accounting', 'general_name' => 'Business & Marketing'],
            ['name' => 'Chemical Process Engineering', 'general_name' => 'Engineering & Design'],
            ['name' => 'Industrial Chemistry', 'general_name' => 'Research & Development'],
            ['name' => 'Business Administration', 'general_name' => 'Business & Marketing'],
            ['name' => 'Marketing', 'general_name' => 'Business & Marketing'],
            ['name' => 'English for Business', 'general_name' => 'Business & Marketing'],
            ['name' => 'Electronics Engineering', 'general_name' => 'Engineering & Design'],
            ['name' => 'Telecommunication Engineering', 'general_name' => 'Engineering & Design'],
            ['name' => 'Power Systems', 'general_name' => 'Engineering & Design'],
            ['name' => 'Civil Engineering', 'general_name' => 'Engineering & Design'],
            ['name' => 'Mining Engineering', 'general_name' => 'Engineering & Design'],
            ['name' => 'Construction Management', 'general_name' => 'Engineering & Design'],
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
