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

        $building = isset($report->building) ? $report->building : [];
        $units = isset($building->units) ? $building->units : [];
        $totalArea = $perSqFitExpenses =0;
        if (!empty($building->units)) {
            $totalArea = $building->units->sum('area');
            $perSqFitExpenses = ($report->total_expenses/ $totalArea);
        }

        $expenses = isset($building->expenses) ? $building->expenses : [];

        return Pdf::loadView('pdf',
            [
                'record' => $report,
                'expenses' => $expenses,
                'building' => $building,
                'units' => $units,
                'totalArea' => $totalArea,
                'perSqFitExpenses' => $perSqFitExpenses
            ]
        )->setPaper('a4', 'portrait')->download($report->id. 'report.pdf');
    }
}
