<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'surname' => 'admin',
            'password' => Hash::make('nesvarbu'),
            'email' => 'admin@admin.lt',
            'type' => 1,
        ]);
    }
}
