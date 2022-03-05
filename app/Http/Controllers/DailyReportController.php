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
    public function daily_report(Request $request, $id)
    {

        if (request()->get('campaign_id')) {
            $campaign_id =  $_GET['campaign_id'];
        } else {
            $campaign_id =  "";
        }
        if(request()->get('date_from')){
            $date_from =  $_GET['date_from']; 
        }else{
            $date_from =  "";
        }
        if(request()->get('date_to')){
            $date_to =  $_GET['date_to']; 
        }else{
            $date_to =  "";
        }
        if($id && $campaign_id && empty($date_from) && empty($date_to)){
        Source::all();
        $name =  Source::query()->where("id", '=', $campaign_id)->get();
        foreach ($name as $data) {
            $data1 = [
                'source_name' => $data['source_name'],
            ];
        }
        $source_name =  $data['source_name'];
        $storeExcel =  Excel::store(new DailyReport($request->id,$campaign_id, $date_from, $date_to), "public/Daily_Report".date("-d-m-Y")."/" . $source_name . date("-d-m-Y") . '.xlsx');
        return Excel::download(new DailyReport($request->id, $campaign_id, $date_from, $date_to), ($source_name . date("-d-m-Y") . ".xlsx"));
    }
        elseif($id && empty($campaign_id) && empty($date_from) && empty($date_to)){
        User::all();
        $emp_name = User::query()->where('id','=',$id)->get();
        foreach ($emp_name as $emp_name) {
            $emp_name = [
                'source_name' => $emp_name['first_name'].' '.$emp_name['last_name'],
            ];
        }
        $emp_name = $emp_name['source_name'];
        $storeExcel =  Excel::store(new DailyReport($request->id,$campaign_id, $date_from, $date_to), "public/Daily_Report".date("-d-m-Y")."/" . $emp_name . date("-d-m-Y") . '.xlsx');
        return Excel::download(new DailyReport($request->id, $campaign_id, $date_from, $date_to), ($emp_name . date("-d-m-Y") . ".xlsx"));
    }
    elseif($id && $campaign_id && $date_from && $date_to){
        Source::all();
        $name =  Source::query()->where("id", '=', $campaign_id)->get();
        foreach ($name as $data) {
            $data1 = [
                'source_name' => $data['source_name'],
            ];
        }
        $source_name =  $data['source_name'];
        $storeExcel =  Excel::store(new DailyReport($request->id,$campaign_id, $date_from, $date_to), "public/Daily_Report".date("-d-m-Y")."/" . $source_name . date("-d-m-Y") . '.xlsx');
        return Excel::download(new DailyReport($request->id, $campaign_id, $date_from, $date_to), ($source_name . date("-d-m-Y") . ".xlsx"));
    }
    elseif($id && empty($campaign_id) && $date_from && $date_to){
        User::all();
        $emp_name = User::query()->where('id','=',$id)->get();
        foreach ($emp_name as $emp_name) {
            $emp_name = [
                'source_name' => $emp_name['first_name'].' '.$emp_name['last_name'],
            ];
        }
        $emp_name = $emp_name['source_name'];
        $storeExcel =  Excel::store(new DailyReport($request->id,$campaign_id, $date_from, $date_to), "public/Daily_Report".date("-d-m-Y")."/" . $emp_name . date("-d-m-Y") . '.xlsx');
        return Excel::download(new DailyReport($request->id, $campaign_id, $date_from, $date_to), ($emp_name . date("-d-m-Y") . ".xlsx"));
    }
    }
}
