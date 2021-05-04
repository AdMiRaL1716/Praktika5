<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContinentsTableSeeder extends Seeder
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
        $continents = [
            [
                'name' =>'Europe',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'name' => 'Asia',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ]
        ];
        DB::table('continents')->insert($continents);
    }
}
