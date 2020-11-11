<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('filter_price')->insert([
            ['name' => 'Thương lượng','min'=>0,'max'=>'0'],
        ]);
    }
}
