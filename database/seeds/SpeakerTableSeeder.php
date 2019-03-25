<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpeakerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('speaker')->insert([
            'name' => 'L\'arc Lagoon',
            'desc' => 'Feldragon Hunter',
            'picture' => 'picture',
        ]);
    }
}
