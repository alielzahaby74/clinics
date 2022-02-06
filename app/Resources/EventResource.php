<?php


namespace App\Resources;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $start = Carbon::create($this->from)->format('H:i:s');
        $end = Carbon::create($this->to)->format('H:i:s');
        $ev =  [
            "id"=>$this->id,
            "start"=>$this->date."T".$start,
            "end"=>$this->date."T".$end,
            "title"=>$this->doctor_name,
            "url"=>route('dash.appointments.index',$this->id)
        ];
        $opt = [
            "display"=>"list-item",
        ];
        return array_merge($ev,$opt);
    }

}
