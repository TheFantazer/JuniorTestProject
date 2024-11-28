<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schedules = [
            // Расписание для маршрута №11
            ['route_id' => 1, 'bus_stop_id' => 1, 'arrival_time' => '08:15:00'],
            ['route_id' => 1, 'bus_stop_id' => 1, 'arrival_time' => '08:45:00'],
            ['route_id' => 1, 'bus_stop_id' => 1, 'arrival_time' => '09:15:00'],
            ['route_id' => 1, 'bus_stop_id' => 2, 'arrival_time' => '08:20:00'],
            ['route_id' => 1, 'bus_stop_id' => 2, 'arrival_time' => '08:50:00'],
            ['route_id' => 1, 'bus_stop_id' => 2, 'arrival_time' => '09:20:00'],
            // Расписание для маршрута 12
            ['route_id' => 2, 'bus_stop_id' => 6, 'arrival_time' => '09:00:00'],
            ['route_id' => 2, 'bus_stop_id' => 7, 'arrival_time' => '09:10:00'],
            ['route_id' => 2, 'bus_stop_id' => 8, 'arrival_time' => '09:20:00'],
            ['route_id' => 2, 'bus_stop_id' => 9, 'arrival_time' => '09:30:00'],
            ['route_id' => 2, 'bus_stop_id' => 10, 'arrival_time' => '09:40:00'],

            // Расписание для маршрута №13
            ['route_id' => 3, 'bus_stop_id' => 11, 'arrival_time' => '10:00:00'],
            ['route_id' => 3, 'bus_stop_id' => 12, 'arrival_time' => '10:10:00'],
            ['route_id' => 3, 'bus_stop_id' => 13, 'arrival_time' => '10:20:00'],
            ['route_id' => 3, 'bus_stop_id' => 14, 'arrival_time' => '10:30:00'],
            ['route_id' => 3, 'bus_stop_id' => 15, 'arrival_time' => '10:40:00'],

            // Расписание для маршрута №21
            ['route_id' => 4, 'bus_stop_id' => 4, 'arrival_time' => '08:30:00'],
            ['route_id' => 4, 'bus_stop_id' => 4, 'arrival_time' => '09:00:00'],
            ['route_id' => 4, 'bus_stop_id' => 4, 'arrival_time' => '09:30:00'],

            ['route_id' => 4, 'bus_stop_id' => 2, 'arrival_time' => '08:35:00'],
            ['route_id' => 4, 'bus_stop_id' => 2, 'arrival_time' => '09:05:00'],
            ['route_id' => 4, 'bus_stop_id' => 2, 'arrival_time' => '09:35:00'],
        ];

        foreach ($schedules as $schedule) {
            Schedule::create($schedule);
        }
    }
}
