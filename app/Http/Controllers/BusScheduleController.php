<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use App\Models\BusStop;
use App\Models\Route;
use App\Models\Schedule;
use Illuminate\Http\Request;

class BusScheduleController extends Controller
{
    public function findBus(Request $request)
    {
        $currentTime = Carbon::now()->format('H:i:s');
        $from = $request->input('from');
        $to = $request->input('to');

        // Проверка существования остановок
        $fromStop = BusStop::query()->find($from);
        $toStop = BusStop::query()->find($to);

        if (!$fromStop || !$toStop) {
            return response()->json([
                'error' => 'Invalid stop ID(s)',
                'details' => [
                    'from' => $fromStop ? null : "Stop with ID $from not found",
                    'to' => $toStop ? null : "Stop with ID $to not found"
                ]
            ], 404);
        }

        $routes = Route::whereHas('stops', function ($query) use ($from) {
            $query->where('bus_stop_id', $from);
        })
            ->whereHas('stops', function ($query) use ($to) {
                $query->where('bus_stop_id', $to);
            })
            ->get();

        $result = $routes->map(function ($route) use ($from, $currentTime) {
            /*$nextArrivals = Schedule::where('route_id', $route->id)
                ->where('bus_stop_id', $from)
                ->where('arrival_time', '>=', $currentTime)
                ->orderBy('arrival_time')
                ->take(3)
                ->pluck('arrival_time')
                ->toArray();*/
            $nextArrivals = Schedule::where('route_id', $route->id)
                ->where('bus_stop_id', $from)
                ->where(function ($query) use ($currentTime) {
                    $query->where('arrival_time', '>=', $currentTime)  // Расписание на сегодня
                    ->orWhere('arrival_time', '<', $currentTime); // Расписание на завтра
                })
                ->orderBy('arrival_time')
                ->take(3)
                ->pluck('arrival_time')
                ->toArray();

            return [
                'route' => $route->name,
                'next_arrivals' => $nextArrivals
            ];
        });

        return response()->json([
            'from' => $fromStop->name,
            'to' => $toStop->name,
            'buses' => $result
        ], 200,[],JSON_UNESCAPED_UNICODE);
    }
}
