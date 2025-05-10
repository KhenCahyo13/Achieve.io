<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Master\Models\Department;
use Modules\Master\Models\StudyProgram;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('study_programs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('department_id')->references('id')->on('departments')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name', 150);
            $table->timestamps();
        });

        $departments = [
            'Information Technology' => [
                'D2 Software Development',
                'D4 Informatics Engineering',
                'D4 Business Information Systems',
            ],
            'Mechanical Engineering' => [
                'D3 Mechanical Engineering',
                'D4 Automotive Electronics Engineering',
                'D4 Production and Maintenance Mechanical Engineering',
            ],
            'Accounting' => [
                'D3 Accounting',
                'D4 Finance',
                'D4 Management Accounting'
            ],
            'Chemical Engineering' => [
                'D3 Chemical Engineering',
                'D4 Chemical Engineering'
            ],
            'Business Administration' => [
                'D3 Business Administration',
                'D3 English',
                'D4 Marketing Management',
                'D4 English'
            ],
            'Electrical Engineering' => [
                'D3 Electronics Engineering',
                'D3 Telecommunication Engineering',
                'D3 Electrical Engineering',
                'D4 Digital Telecommunication Networks',
                'D4 Power Systems',
                'D4 Electronics Engineering'
            ],
            'Civil Engineering' => [
                'D3 Civil Engineering',
                'D3 Mining Engineering',
                'D3 Road, Bridge, and Water Construction Engineering Technology',
                'D4 Construction Engineering Management',
                'D5 Road and Bridge Construction Engineering Technology'
            ],
        ];

        foreach ($departments as $department => $studyPrograms) {
            $department = Department::create([
                'name' => $department
            ]);

            foreach ($studyPrograms as $studyProgram) {
                StudyProgram::create([
                    'name' => $studyProgram,
                    'department_id' => $department->id
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_programs');
    }
};
