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
            'Web Development',
            'Mobile Development',
            'Software Engineering',
            'Network Engineering',
            'Mechanical Design',
            'Automotive Engineering',
            'Manufacturing Technology',
            'Accounting',
            'Finance',
            'Management Accounting',
            'Chemical Process Engineering',
            'Industrial Chemistry',
            'Business Administration',
            'Marketing',
            'English for Business',
            'Electronics Engineering',
            'Telecommunication Engineering',
            'Power Systems',
            'Civil Engineering',
            'Mining Engineering',
            'Construction Management',
        ];

        foreach ($fields as $field) {
            Field::create([
                'name' => $field
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {}
};
