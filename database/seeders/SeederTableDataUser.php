<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class SeederTableDataUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Adam Surya','email'=>'fourline66@gmail.com','password'=>'asdasd','flag_permesion'=>'Y'
        ]);
    }
}
