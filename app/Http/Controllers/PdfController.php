<?php

namespace App\Http\Controllers;

use App\Models\Reports;
use App\Models\Units;
use App\Models\Buildings;
use App\Models\UnitTypes;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function __invoke(Reports $report)
    {

        $unit = $report->unit;

        $expenses = isset($unit->expenses) ? $unit->expenses : [];
        $building = isset($unit->building) ? $unit->building : [];
        $unitType = isset($unit->unitType) ? $unit->unitType : [];

        return Pdf::loadView('pdf',
            [
                'record' => $report,
                'unit' => $unit,
                'expenses' => $expenses,
                'building' => $building,
                'unitType' => $unitType
            ]
        )->setPaper('a4', 'portrait')->download($report->id. 'report.pdf');
    }
}
