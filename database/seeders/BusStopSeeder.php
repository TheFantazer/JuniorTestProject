<?php

namespace Database\Seeders;

use App\Models\BusStop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusStopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stops = [
            ['name' => 'ул. Пушкина'],
            ['name' => 'ул. Ленина'],
            ['name' => 'ул. Попова'],
            ['name' => 'ул. Гагарина'],
            ['name' => 'ул. Советская'],
            ['name' => 'Проспект Славы'],
            ['name' => 'Звенигородская'],
            ['name' => 'Площадь Восстания'],
            ['name' => 'Московский вокзал'],
            ['name' => 'Пролетарская ул.'],
            ['name' => 'Невский проспект'],
            ['name' => 'Сенная площадь'],
            ['name' => 'Лиговский проспект'],
            ['name' => 'Казанский собор'],
            ['name' => 'Дворцовая площадь'],
            ['name' => 'Адмиралтейская'],
            ['name' => 'Васильевский о.'],
            ['name' => 'Гаваньская ул.'],
            ['name' => 'Морской вокзал'],
            ['name' => 'ул. Рубинштейна'],
            ['name' => 'Смольный собор'],
        ];

        foreach ($stops as $stop) {
            BusStop::create($stop);
        }
    }
}
