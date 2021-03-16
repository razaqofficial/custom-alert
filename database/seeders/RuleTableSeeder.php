<?php

namespace Database\Seeders;

use App\Models\Rule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [
           ['name' => 'pages that contains'],
           ['name' => 'a specific page'],
           ['name' => 'pages start with'],
           ['name' => 'pages ending with'],
       ];

       DB::table('rules')->insert($data);
    }
}
