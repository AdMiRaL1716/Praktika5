<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        $cities = [
            [
                'name' =>'Tallinn',
                'population' =>'1300000',
                'id_country' =>'1',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'name' => 'Shanghai',
                'population' =>'13000000',
                'id_country' =>'2',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ]
        ];
        DB::table('cities')->insert($cities);
    }
}
