<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
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
        $countries = [
            [
                'name' =>'Estonia',
                'capital' =>'Tallinn',
                'description' =>'Hello Estonia',
                'population' =>'1300000',
                'id_continent' =>'1',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'name' => 'China',
                'capital' =>'Shanghai',
                'description' =>'Hello China',
                'population' =>'13000000',
                'id_continent' =>'2',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ]
        ];
        DB::table('countries')->insert($countries);
    }
}
