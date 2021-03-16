<?php

namespace Database\Seeders;

use App\Models\Rule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
           ['id' => Str::uuid(), 'name' => 'pages that contains'],
           ['id' => Str::uuid(), 'name' => 'a specific page'],
           ['id' => Str::uuid(), 'name' => 'pages start with'],
           ['id' => Str::uuid(), 'name' => 'pages ending with'],
       ];

       DB::table('rules')->insert($data);
    }
}
