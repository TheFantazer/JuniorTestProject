<?php

namespace Database\Seeders;

use App\Models\Route;
use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $route11 = Route::create(['name' => 'Автобус №11 в сторону ост. Попова']);
        $route12 = Route::create(['name' => 'Автобус №12 в сторону ост. Морской вокзал']);
        $route13 = Route::create(['name' => 'Автобус №13 в сторону ост. Смольный собор']);
        $route21 = Route::create(['name' => 'Автобус №21 в сторону ост. Ленина']);

        // Маршрут 11
        $route11->stops()->attach([
            ['bus_stop_id' => 1, 'direction' => 'forward', 'stop_order' => 1],
            ['bus_stop_id' => 2, 'direction' => 'forward', 'stop_order' => 2],
            ['bus_stop_id' => 3, 'direction' => 'forward', 'stop_order' => 3],
        ]);

        // Маршрут 12: forward
        $route12->stops()->attach([
            ['bus_stop_id' => 6, 'direction' => 'forward', 'stop_order' => 1],
            ['bus_stop_id' => 7, 'direction' => 'forward', 'stop_order' => 2],
            ['bus_stop_id' => 8, 'direction' => 'forward', 'stop_order' => 3],
            ['bus_stop_id' => 9, 'direction' => 'forward', 'stop_order' => 4],
            ['bus_stop_id' => 10, 'direction' => 'forward', 'stop_order' => 5],
        ]);

        // Маршрут 12: backward
        $route12->stops()->attach([
            ['bus_stop_id' => 9, 'direction' => 'backward', 'stop_order' => 1],
            ['bus_stop_id' => 8, 'direction' => 'backward', 'stop_order' => 2],
            ['bus_stop_id' => 7, 'direction' => 'backward', 'stop_order' => 3],
            ['bus_stop_id' => 6, 'direction' => 'backward', 'stop_order' => 4],
        ]);

        // Маршрут 13: forward
        $route13->stops()->attach([
            ['bus_stop_id' => 11, 'direction' => 'forward', 'stop_order' => 1],
            ['bus_stop_id' => 12, 'direction' => 'forward', 'stop_order' => 2],
            ['bus_stop_id' => 13, 'direction' => 'forward', 'stop_order' => 3],
            ['bus_stop_id' => 14, 'direction' => 'forward', 'stop_order' => 4],
            ['bus_stop_id' => 15, 'direction' => 'forward', 'stop_order' => 5],
        ]);

        // Маршрут 13: backward
        $route13->stops()->attach([
            ['bus_stop_id' => 14, 'direction' => 'backward', 'stop_order' => 1],
            ['bus_stop_id' => 13, 'direction' => 'backward', 'stop_order' => 2],
            ['bus_stop_id' => 12, 'direction' => 'backward', 'stop_order' => 3],
            ['bus_stop_id' => 11, 'direction' => 'backward', 'stop_order' => 4],
        ]);

        // Маршрут 21
        $route21->stops()->attach([
            ['bus_stop_id' => 4, 'direction' => 'forward', 'stop_order' => 1],
            ['bus_stop_id' => 2, 'direction' => 'forward', 'stop_order' => 2],
            ['bus_stop_id' => 5, 'direction' => 'forward', 'stop_order' => 3],
        ]);
    }
}
