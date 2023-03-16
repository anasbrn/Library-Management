<?php

namespace Database\Seeders;

use App\Models\Gender;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class genderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genders = ['Mystery', 'Horror', 'Suspense', 'Self-help', 'Fantasy'];

        foreach ($genders as $gender){
            Gender::create([
                'name' => $gender,
            ]);
        }
    }
}
