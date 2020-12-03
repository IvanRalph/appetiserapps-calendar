<?php

namespace App\Http\Resources;

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
        return [
            'daysOfWeek' => $this->parseDays($this->days),
            'startRecur' => Carbon::create($this->event_start)->subDay()->format('Y-m-d'),
            'endRecur' => Carbon::create($this->event_end)->addDay()->format('Y-m-d'),
            'title' => $this->title
        ];
    }

    private function parseDays($days)
    {
        $daysOfWeek = [];
        $days = explode(',', $days);
        foreach ($days as $day) {
            switch ($day) {
                case 'monday':
                    array_push($daysOfWeek, 1);
                    break;
                case 'tuesday':
                    array_push($daysOfWeek, 2);
                    break;
                case 'wednesday':
                    array_push($daysOfWeek, 3);
                    break;
                case 'thursday':
                    array_push($daysOfWeek, 4);
                    break;
                case 'friday':
                    array_push($daysOfWeek, 5);
                    break;
                case 'saturday':
                    array_push($daysOfWeek, 6);
                    break;
                case 'sunday':
                    array_push($daysOfWeek, 0);
                    break;
            }
        }

        return $daysOfWeek;
    }
}
