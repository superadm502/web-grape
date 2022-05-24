<?php

namespace Database\Seeders;

use App\Models\DayHour;
use Illuminate\Database\Seeder;

class DayHoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itens = [
            [
                'id' => 1,
                'hour' => '10:30'
            ],
            [
                'id' => 2,
                'hour' => '11:00'
            ],
            [
                'id' => 3,
                'hour' => '11:30'
            ],
            [
                'id' => 4,
                'hour' => '12:00'
            ],
            [
                'id' => 5,
                'hour' => '12:30'
            ],
            [
                'id' => 6,
                'hour' => '13:00'
            ],
            [
                'id' => 7,
                'hour' => '13:30'
            ],
            [
                'id' => 8,
                'hour' => '17:00'
            ],
            [
                'id' => 9,
                'hour' => '17:30'
            ],
            [
                'id' => 10,
                'hour' => '18:00'
            ],
            [
                'id' => 11,
                'hour' => '18:30'
            ]
        ];

        foreach ($itens as $item) {
            $day_hour = DayHour::find($item['id']);

            if ($day_hour) {
                $day_hour->hour = $item['hour'];
                $day_hour->save();
            } else {
                DayHour::create($item);
            }
        }
    }
}
