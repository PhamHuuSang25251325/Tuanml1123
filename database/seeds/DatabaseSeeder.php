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
        DB::table('admins')->insert(
            [
                'name'=>'Hien',
                'username'=>'hien123',
                'password'=>bcrypt(123456),
            ]
        );
    }
}
