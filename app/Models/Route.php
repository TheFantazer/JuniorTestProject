<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = ['name'];

    public function stops()
    {
        return $this->belongsToMany(BusStop::class, 'route_stops')
            ->withPivot('direction', 'stop_order')
            ->orderBy('pivot_stop_order');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
