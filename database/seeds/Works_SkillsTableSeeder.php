<?php

use Illuminate\Database\Seeder;

class Works_SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $works = App\Work::all();
        $skills = App\Skill::all();

        foreach ($works as $work) {
            $work->skills()->attach(
                $skills->random(rand(1,3))->pluck('id')->toArray()
            );
        }
     }
}
