<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['route_id', 'bus_stop_id', 'arrival_time'];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function busStop()
    {
        return $this->belongsTo(BusStop::class);
    }
}
