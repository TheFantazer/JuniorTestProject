<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
use App\Models\BusStop;
use App\Models\Schedule;

class RouteController extends Controller
{
    public function store(Request $request)
    {
        // Создаем маршрут
        $route = Route::query()->create(['name' => $request->input('name')]);

        // Привязываем остановки к маршруту
        $stops = $request->input('stops', []);

        if (is_array($stops)) {
            foreach ($stops as $direction => $stopList) {
                foreach ($stopList as $order => $stopId) {
                    $route->stops()->attach($stopId, [
                        'direction' => $direction,
                        'stop_order' => $order + 1
                    ]);
                }
            }
        }

        // Добавляем расписания остановок
        $schedules = $request->input('schedules', []);

        if (is_array($schedules)) {
            foreach ($schedules as $schedule) {
                // Проверяем наличие необходимых данных
                if (isset($schedule['bus_stop_id'], $schedule['arrival_time'])) {
                    Schedule::query()->create([
                        'route_id' => $route->id,
                        'bus_stop_id' => $schedule['bus_stop_id'],
                        'arrival_time' => $schedule['arrival_time'],
                    ]);
                }
            }
        }

        return response()->json($route, 201, [], JSON_UNESCAPED_UNICODE);
    }

    public function update(Request $request, $id)
    {
        // Обновляем маршрут
        $route = Route::query()->findOrFail($id);

        // Удаляем старые привязки остановок
        $route->stops()->detach();

        foreach ($request->input('stops', []) as $direction => $stops) {
            foreach ($stops as $order => $stopId) {
                $route->stops()->attach($stopId, [
                    'direction' => $direction,
                    'stop_order' => $order + 1
                ]);
            }
        }

        // Удаляем старые расписания
        Schedule::query()->where('route_id', $route->id)->delete();

        // Добавляем новые расписания
        $schedules = $request->input('schedules', []);

        if (is_array($schedules)) {
            foreach ($schedules as $schedule) {
                if (isset($schedule['bus_stop_id'], $schedule['arrival_time'])) {
                    Schedule::query()->create([
                        'route_id' => $route->id,
                        'bus_stop_id' => $schedule['bus_stop_id'],
                        'arrival_time' => $schedule['arrival_time'],
                    ]);
                }
            }
        }

        return response()->json($route);
    }

    public function destroy($id)
    {
        // Удаляем маршрут
        Route::destroy($id);

        // Удаляем привязанные остановки и расписания
        Schedule::query()->where('route_id', $id)->delete();

        return response()->json(['message' => 'Route deleted'], 200);
    }
}
