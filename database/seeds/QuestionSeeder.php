<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question = [];
        $faker = Faker\Factory::create();
        for($i=0;$i<1000;$i++){
            $title = $faker->sentence(mt_rand(20, 50));
            $body = $faker->paragraph(mt_rand(20, 100));
            $created_at = Carbon\Carbon::now();
            $updated_at = Carbon\Carbon::now();
            $question[$i] = [
                'title' => $title,
                'body' => $body,
                'created_at' => $created_at,
                'updated_at' => $updated_at,
                'user_id' => 1
            ];
        }
        DB::table('questions')->insert($question);
    }
}
