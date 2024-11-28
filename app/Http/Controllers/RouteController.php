<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Route;
use App\Models\BusStop;

class RouteController extends Controller
{
    public function store(Request $request)
    {
//        dd($request->all());
        $route = Route::query()->create(['name' => $request->input('name')]);

        $stops = $request->input('stops', []);

        if (is_array($stops)) {
            foreach ($request->input('stops') as $direction => $stops) {
                foreach ($stops as $order => $stopId) {
                    $route->stops()->attach($stopId, [
                        'direction' => $direction,
                        'stop_order' => $order + 1
                    ]);
                }
            }
        }

        return response()->json($route, 201, [], JSON_UNESCAPED_UNICODE);
    }

    public function update(Request $request, $id)
    {
        $route = Route::query()->findOrFail($id);
        $route->stops()->detach();

        foreach ($request->input('stops') as $direction => $stops) {
            foreach ($stops as $order => $stopId) {
                $route->stops()->attach($stopId, [
                    'direction' => $direction,
                    'stop_order' => $order + 1
                ]);
            }
        }

        return response()->json($route);
    }

    public function destroy($id)
    {
        Route::destroy($id);
        return response()->json(['message' => 'Route deleted'], 200);
    }
}
