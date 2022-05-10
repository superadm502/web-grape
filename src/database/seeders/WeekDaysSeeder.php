<?php

namespace Database\Seeders;

use App\Models\WeekDay;
use Illuminate\Database\Seeder;

class WeekDaysSeeder extends Seeder
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
                'week_day' => 'Domingo'
            ],
            [
                'id' => 2,
                'week_day' => 'Segunda-feira'
            ],
            [
                'id' => 3,
                'week_day' => 'Terça-feira'
            ],
            [
                'id' => 4,
                'week_day' => 'Quarta-feira'
            ],
            [
                'id' => 5,
                'week_day' => 'Quinta-feira'
            ],
            [
                'id' => 6,
                'week_day' => 'Sexta-feira'
            ],
            [
                'id' => 7,
                'week_day' => 'Sábado'
            ],
        ];

        foreach ($itens as $item) {
            $week_day = WeekDay::find($item['id']);

            if ($week_day) {
                $week_day->week_day = $item['week_day'];
                $week_day->save();
            } else {
                WeekDay::create($item);
            }
        }
    }
}
