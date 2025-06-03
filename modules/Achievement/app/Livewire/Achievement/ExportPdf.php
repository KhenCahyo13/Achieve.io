<?php

namespace Modules\Achievement\Livewire\Achievement;

use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Modules\Achievement\Models\Achievement;

class ExportPdf extends Component
{
    #[Validate('required', message: 'Start date is required')]
    #[Validate('date', message: 'Start date must be a valid date')]
    public string $startDate = '';

    #[Validate('required', message: 'End date is required')]
    #[Validate('date', message: 'End date must be a valid date')]
    #[Validate('after:startDate', message: 'End date must be after start date')]
    public string $endDate = '';

    #[Validate('required', message: 'Verification status is required')]
    public string $verificationStatus = '';

    public function render()
    {
        return view('achievement::livewire.achievement.export-pdf');
    }

    public function export()
    {
        $this->validate();

        $achievements = Achievement::getExportPdfData($this->startDate, $this->endDate, $this->verificationStatus);
        // dd($achievements);

        $pdf = Pdf::loadView('achievement::pages.achievement.export-pdf', compact('achievements'));
        $pdf->setPaper('A4', 'portrait');
        $pdf->setOption('isRemoteEnabled', true);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'achievements-report.pdf');
    }
}
