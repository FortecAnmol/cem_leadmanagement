<?php

namespace App\Http\Controllers;

use App\Exports\DailyReport;
use App\Exports\LeadClosedExport;
use App\Exports\LeadClosedExportAll;
use App\Exports\LeadReportSingle;
use App\Models\Lead;
use App\Models\Source;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class DailyReportController extends Controller
{
    public function daily_report(Request $request, $id,$date)
    {
        Source::all();
        $name =  Source::query()->where("id", '=', $id)->get();
        foreach ($name as $data) {
            $data1 = [
                'source_name' => $data['source_name'],
            ];
        }
        $source_name =  $data['source_name'];
        $storeExcel =  Excel::store(new DailyReport($request->id,$request->date), "public/Daily_Report".date("-d-m-Y")."/" . $source_name . date("-d-m-Y") . '.xlsx');
        return Excel::download(new DailyReport($request->id, $request->date), ($source_name . date("-d-m-Y") . ".xlsx"));
    }
}
