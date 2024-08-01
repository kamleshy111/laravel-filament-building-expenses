<?php

namespace App\Http\Controllers;

use App\Models\Buildings;
use App\Models\Reports;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\URL;

class ReportController extends Controller
{
    public function __invoke(Buildings $buildings)
    {
        Reports::create([
            'name' => $buildings->name . ' report',
            'description' => $buildings->name . ' report',
            'generation_date' => date('Y-m-d'),
            'unit_id' => $buildings->id,
            'total_expenses' => $buildings->expenses->sum('amount'),
        ]);

        $previousUrl = URL::previous();
        return redirect($previousUrl)->with('success', 'PDF generated successfully!');
    }
}
