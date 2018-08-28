<?php

use Illuminate\Database\Seeder;

class VisibilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Visibility::updateOrCreate([
           'name' => 'public'
        ], [
            'show_name' => 'Видна всем'
        ]);
        \App\Visibility::updateOrCreate([
           'name' => 'unlisted'
        ], [
            'show_name' => 'По ссылке'
        ]);
        \App\Visibility::updateOrCreate([
           'name' => 'private'
        ], [
            'show_name' => 'Видна только автору'
        ]);
    }
}
