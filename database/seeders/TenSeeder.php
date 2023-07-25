<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'cuong',
            'email'=>'cuong@gmail.com',
            'password' => Hash::make('Cuonglm1780')
        ]);
    }
}
