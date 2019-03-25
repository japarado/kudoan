<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SponsorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sponsor')->insert([
            'name' => 'ECE Manufacturing Corporation',
            'logo' => 'LOGO',
            'desc' => 'A manufacturing company sponsor',
        ]);
    }
}
