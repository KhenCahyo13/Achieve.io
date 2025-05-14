<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Master\Models\Period;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        $periods = [
            [
                'title' => 'Tahun Ajaran 2025/2026',
                'start_year' => '2025',
                'end_year' => '2026',
            ],
            [
                'title' => 'Tahun Ajaran 2026/2027',
                'start_year' => '2026',
                'end_year' => '2027',
            ],
            [
                'title' => 'Tahun Ajaran 2027/2028',
                'start_year' => '2027',
                'end_year' => '2028',
            ],
            [
                'title' => 'Tahun Ajaran 2028/2029',
                'start_year' => '2028',
                'end_year' => '2029',
            ],
            [
                'title' => 'Tahun Ajaran 2029/2030',
                'start_year' => '2029',
                'end_year' => '2030',
            ],
            [
                'title' => 'Tahun Ajaran 2030/2031',
                'start_year' => '2030',
                'end_year' => '2031',
            ],
            [
                'title' => 'Tahun Ajaran 2031/2032',
                'start_year' => '2031',
                'end_year' => '2032',
            ],
            [
                'title' => 'Tahun Ajaran 2032/2033',
                'start_year' => '2032',
                'end_year' => '2033',
            ],
            [
                'title' => 'Tahun Ajaran 2033/2034',
                'start_year' => '2033',
                'end_year' => '2034',
            ],
            [
                'title' => 'Tahun Ajaran 2034/2035',
                'start_year' => '2034',
                'end_year' => '2035',
            ],
            [
                'title' => 'Tahun Ajaran 2035/2036',
                'start_year' => '2035',
                'end_year' => '2036',
            ],
            [
                'title' => 'Tahun Ajaran 2036/2037',
                'start_year' => '2036',
                'end_year' => '2037',
            ],
            [
                'title' => 'Tahun Ajaran 2037/2038',
                'start_year' => '2037',
                'end_year' => '2038',
            ],
            [
                'title' => 'Tahun Ajaran 2038/2039',
                'start_year' => '2038',
                'end_year' => '2039',
            ],
            [
                'title' => 'Tahun Ajaran 2039/2040',
                'start_year' => '2039',
                'end_year' => '2040',
            ],
            [
                'title' => 'Tahun Ajaran 2040/2041',
                'start_year' => '2040',
                'end_year' => '2041',
            ],
            [
                'title' => 'Tahun Ajaran 2041/2042',
                'start_year' => '2041',
                'end_year' => '2042',
            ],
        ];

        foreach ($periods as $period) {
            Period::create([
                'title' => $period['title'],
                'start_year' => $period['start_year'],
                'end_year' => $period['end_year'],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {}
};
