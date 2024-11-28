<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusStop extends Model
{
    protected $fillable = ['name'];

    public function routes()
    {
        return $this->belongsToMany(Route::class, 'route_stops')
            ->withPivot('direction', 'stop_order')
            ->orderBy('pivot_stop_order');
    }
}
