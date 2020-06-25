<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        DB::table('role_user')->truncate();

        $adminRole = Role::where('name','admin')->first();
        $normalRole = Role::where('name','normal_user')->first();

        $random = Str::random(10);
         //Insert the default admin user
       
        $admin = User::create([
            'id' => 1,
            'name' => 'Administrator',
            'email' => 'manager@example.com',
            'password' => bcrypt('12345'),
            'position'=>'trainingManager',
            'address'=>'Phnom Penh',
            'remember_token' => $random
        ]);
        
        $normal = User::create([
            'id' => 2,
            'name' => 'Tutor',
            'email' => 'tutor@gmail.com',
            'password' => Hash::make('12345'),
            'position'=>'traner',
            'address'=>'Phnom Penh',
            'remember_token' => $random
        ]);
        $admin->roles()->attach($adminRole);
        $normal->roles()->attach($normalRole);
    }
}
