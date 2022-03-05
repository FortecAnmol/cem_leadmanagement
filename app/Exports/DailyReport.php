<?php

namespace App\Exports;

use App\Models\Lead;
use App\Models\LhsReport;
use App\Models\Note;
use App\Models\Source;
use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class DailyReport implements FromQuery, WithHeadings, WithEvents, ShouldAutoSize, WithMapping
{

    use Exportable;
    function __construct($id,$campaign_id, $date_from, $date_to)
    {
        $this->id = $id;
        $this->campaign_id = $campaign_id;
        $this->date_from = $date_from;
        $this->date_to = $date_to;
    }
    public function map($lead): array
    {
        $data =   Source::where("id", '=', $lead->source_id)->get();
        foreach ($data as $datas2) {
            $lead->source_id = $datas2['source_name'];
        }
        $data1 = User::where('id', '=', $lead->user_id)->get();
        foreach ($data1 as $datas1) {
            $lead->user_id = $datas1['name'];
        }
        $data3 = User::where('id', '=', $lead->asign_to)->get();
        foreach ($data3 as $datas3) {
            $lead->asign_to = $datas3['name'];
        }
        $data4 = User::where('id', '=', $lead->asign_to_manager)->get();
        foreach ($data4 as $datas4) {
            $lead->asign_to_manager = $datas4['name'];
        }
        if ($lead->status == 1) {
            $status =  'pending';
        } elseif ($lead->status == 3) {
            $status =  'closed';
        } elseif ($lead->status == 2) {
            $status =  'failed';
        } else{
            $status =  'In Progress';
        }
        $data6 =   LhsReport::get();
        foreach ($data6 as $datas6) {
         if ($lead->status == 3) {
            $lead->download_word =  "$lead->prospect_first_name$lead->prospect_last_name".date('-d-m-Y').".doc";
            }
        }
        $data5 = Note::where('lead_id', '=', $lead->lead_id)->get();
        $lead_data = array();
        $i = 1;
        foreach ($data5 as $key =>  $items) {
            $number = $i;

            $lead_data[$key] = $number . ') ' . $items->feedback;

            $lead->lead_data = implode(",\n", $lead_data);
            $i++;
        }

        $return = [
            $lead->id,
            $lead->user_id,
            $lead->company_name,
            $lead->prospect_first_name .' '. $lead->prospect_last_name,
            $lead->company_industry,
            $lead->linkedin_address,
            $lead->source_id,
            $lead->prospect_email,
            $lead->contact_number_1,
            $lead->contact_number_2,
            $lead->asign_to,
            $lead->asign_to_manager,
            $lead->lead_data,
            $lead->status = $status,
            $lead->location,
            $lead->timezone,
            $lead->prospect_first_name .' '. $lead->prospect_last_name,
            $lead->designation,
            $lead->designation_level,
            $lead->bussiness_function,
            $lead->date_shared,
            $lead->created_at,
            $lead->updated_at,
            $lead->download_word,
        ];


        return $return;
    }
    public function query()
    {
        $date = date("Y-m-d");
        if($this->id && empty($this->campaign_id) && empty($this->date_from) && empty($this->date_to)){
        $data = Lead::where("asign_to", '=', $this->id)->latest('notes.updated_at', 'desc')->groupBy('notes.lead_id')->join('notes','notes.lead_id','=','leads.id');
        }
        elseif($this->id && $this->campaign_id && empty($this->date_from) && empty($this->date_to))
        {
            $data = Lead::where("asign_to", '=', $this->id)->where('source_id','=',$this->campaign_id)->latest('notes.updated_at', 'desc')->groupBy('notes.lead_id')->join('notes','notes.lead_id','=','leads.id');
        }
        elseif($this->id && $this->campaign_id && $this->date_from && $this->date_to)
        {
            $data = Lead::where("asign_to", '=', $this->id)->where('source_id','=',$this->campaign_id)->latest('notes.updated_at', 'desc')->groupBy('notes.lead_id')->join('notes','notes.lead_id','=','leads.id')->whereBetween('notes.updated_at', [$this->date_from, $this->date_to]);
        }
        elseif($this->id && empty($this->campaign_id) && $this->date_from && $this->date_to)
        {
            $data = Lead::where("asign_to", '=', $this->id)->latest('notes.updated_at', 'desc')->groupBy('notes.lead_id')->join('notes','notes.lead_id','=','leads.id')->whereBetween('notes.updated_at', [$this->date_from, $this->date_to]);
        }
        return $data;
    }

    public function headings(): array
    {
        return [
            'S.No.',
            'Lead Added By',
            'Organization',
            'Name',
            // 'prospect_last_name',
            // 'job_title',
            // 'employee_size',
            // 'web_address',
            // 'revenue_size',
            'Organization Industry',
            // 'physical_address',
            // 'city',
            // 'state',
            // 'zip_code',
            // 'country',
            // 'lead_name',
            // 'lead_details',
            'LinkedIn',
            'Campaign Name',
            'Email ID',
            'Contact number 1',
            'Contact number 2',
            'Asigned To Employee',
            'Asign To Manager',
            'Feedback',
            'Status',
            // 'total_amount',
            // 'no_of_installment',
            'Location',
            'Timezone',
            'Prospect Name',
            'Designation',
            'Designation Level',
            'Bussiness Function',
            'Date Shared',
            'Created On',
            'Updated On',
            // 'deleted_at',
            'Download Word',
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:AZ1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ],
                ]);
            }
        ];
    }
}
