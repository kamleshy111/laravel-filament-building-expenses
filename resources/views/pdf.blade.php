<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link rel="stylesheet" href="{{ asset('assets/pdf.css') }}" type="text/css">
    <style>
        div {
            page-break-before: avoid;
        }
        tr {
            page-break-before: avoid;
        }
    </style>
</head>
<body>
<table class="products">
    <tr>
        <td>
            <table class="w-full products" style="padding: 10px">
                <tr>
                    <td class="w-50" style="width: 350px">
                        <p>Building: &nbsp; <b>{{ $building->name }}</b> </p>
                        <p>Address:  &nbsp;{{ $building->address }},  &nbsp;{{ $building->city }},  &nbsp;{{ $building->State }}</p>
                        <p> &nbsp;{{ $building->country }} &nbsp; {{ $building->zip_code }} </p>
                        <p>Total Amount:.: &nbsp;{{ $record->total_expenses }}</p>
                        <p>Total Building Area:.: &nbsp;{{ $totalArea }}</p>
                    </td>
                    <td class="w-50">
                        <p>Report Generated Date: &nbsp;{{ date('m.d.Y', strtotime($record->generation_date)) }} </p>
                        <p>Report NO:.: &nbsp;{{ $record->id }}</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    @foreach($units as $unit)
        <tr>
            <td>
                <table class="w-full products" style="padding: 10px; border-top: 1px solid black;: ">
                    <tr>
                        <td class="w-50" style="width: 350px">
                            <p><b>Unit Name: &nbsp;{{ $unit->name }} </b></p>
                            <p>Unit Type: &nbsp;{{ $unit->unitType->name }}</p>
                        </td>
                        <td class="w-50">
                            <p>Unit Total Area: &nbsp;{{ $unit->area }}</p>
                            <p>Unit Total Expenses: &nbsp;{{ number_format(($unit->area * $perSqFitExpenses), 2) }}</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table class="products" style="border: solid #000000 1px;">
                    <tr class="item font-12">
                        <th style="width: 25px">No</th>
                        <td style="width: 100px">Expense Type</td>
                        <td style="width: 125px">Vendor</td>
                        <td style="width: 100px">Amount</td>
                        <td style="width: 250px">Description</td>
                        <td style="width: 100px">Date</td>
                    </tr>
                    @php $totalQty = $totalWeight = 0; $itemNumber = 1; $page = 1; $subtractValue = 0; @endphp

                    @foreach($expenses as $exp)
                        <tr class="items">
                            <td>{{$itemNumber}}</td>
                            <td>{{ $exp->expenseType->name }}</td>
                            <td>{{ $exp->vendor->name }}</td>
                            <td>${{ number_format((($exp->amount/$totalArea) * $unit->area), 2 ) }}</td>
                            <td>{{ $exp->description }}</td>
                            <td>{{ date('m.d.Y', strtotime($exp->date)) }}</td>
                        </tr>
                        @php $itemNumber = ($itemNumber + 1) @endphp
                    @endforeach
                </table>
            </td>
        <tr>
    @endforeach
</table>
</body>
</html>

