<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => "Rafael Vera",
                'username' => "rafael.vera",
                'email' => "rafael.vera@nogalessonora.gob.mx",
                'role_id' => 1,
                'dependency_id' => 20,
                'department_id' => 1,
                'password' => '123456',
                'active' => 1
            ],
            [
                'name' => "Noe Navidad",
                'username' => "noe.navidad",
                'email' => "noe.navidad@nogalessonora.gob.mx",
                'role_id' => 1,
                'dependency_id' => 20,
                'department_id' => 1,
                'password' => '123456',
                'active' => 1
            ]
        ];
        
        foreach($data as $user){
            User::create($user);
        }

    }
}
