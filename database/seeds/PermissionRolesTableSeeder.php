<?php

use Illuminate\Database\Seeder;

class PermissionRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permission__roles')->delete();
        
        \DB::table('permission__roles')->insert(array (
            0 => 
            array (
                'permission_id' => 9,
                'role_id' => 1,
                'c' => 1,
                'r' => 1,
                'u' => 1,
                'd' => 1,
                'admin' => 1,
                'created_at' => '2019-06-06 14:46:04',
                'updated_at' => '2019-06-06 14:46:04',
            ),
            1 => 
            array (
                'permission_id' => 8,
                'role_id' => 1,
                'c' => 0,
                'r' => 0,
                'u' => 0,
                'd' => 0,
                'admin' => 0,
                'created_at' => '2019-06-06 14:46:04',
                'updated_at' => '2019-06-06 14:46:04',
            ),
            2 => 
            array (
                'permission_id' => 13,
                'role_id' => 1,
                'c' => 1,
                'r' => 1,
                'u' => 1,
                'd' => 1,
                'admin' => 1,
                'created_at' => '2019-06-06 14:46:04',
                'updated_at' => '2019-06-06 14:46:04',
            ),
            3 => 
            array (
                'permission_id' => 14,
                'role_id' => 1,
                'c' => 1,
                'r' => 1,
                'u' => 1,
                'd' => 1,
                'admin' => 1,
                'created_at' => '2019-06-06 14:46:04',
                'updated_at' => '2019-06-06 14:46:04',
            ),
            4 => 
            array (
                'permission_id' => 11,
                'role_id' => 1,
                'c' => 1,
                'r' => 1,
                'u' => 1,
                'd' => 1,
                'admin' => 1,
                'created_at' => '2019-06-06 14:46:04',
                'updated_at' => '2019-06-06 14:46:04',
            ),
            5 => 
            array (
                'permission_id' => 10,
                'role_id' => 1,
                'c' => 1,
                'r' => 1,
                'u' => 1,
                'd' => 1,
                'admin' => 1,
                'created_at' => '2019-06-06 14:46:04',
                'updated_at' => '2019-06-06 14:46:04',
            ),
            6 => 
            array (
                'permission_id' => 15,
                'role_id' => 1,
                'c' => 1,
                'r' => 1,
                'u' => 1,
                'd' => 1,
                'admin' => 1,
                'created_at' => '2019-06-06 14:46:04',
                'updated_at' => '2019-06-06 14:46:04',
            ),
            7 => 
            array (
                'permission_id' => 16,
                'role_id' => 1,
                'c' => 1,
                'r' => 1,
                'u' => 1,
                'd' => 1,
                'admin' => 1,
                'created_at' => '2019-06-06 14:46:04',
                'updated_at' => '2019-06-06 14:46:04',
            ),
            8 => 
            array (
                'permission_id' => 12,
                'role_id' => 1,
                'c' => 1,
                'r' => 1,
                'u' => 1,
                'd' => 1,
                'admin' => 1,
                'created_at' => '2019-06-06 14:46:04',
                'updated_at' => '2019-06-06 14:46:04',
            ),
            9 => 
            array (
                'permission_id' => 1,
                'role_id' => 1,
                'c' => 1,
                'r' => 1,
                'u' => 1,
                'd' => 1,
                'admin' => 1,
                'created_at' => '2019-06-06 14:46:04',
                'updated_at' => '2019-06-06 14:46:04',
            ),
            10 => 
            array (
                'permission_id' => 3,
                'role_id' => 1,
                'c' => 0,
                'r' => 0,
                'u' => 0,
                'd' => 0,
                'admin' => 0,
                'created_at' => '2019-06-06 14:46:04',
                'updated_at' => '2019-06-06 14:46:04',
            ),
            11 => 
            array (
                'permission_id' => 2,
                'role_id' => 1,
                'c' => 1,
                'r' => 1,
                'u' => 1,
                'd' => 1,
                'admin' => 1,
                'created_at' => '2019-06-06 14:46:04',
                'updated_at' => '2019-06-06 14:46:04',
            ),
            12 => 
            array (
                'permission_id' => 4,
                'role_id' => 1,
                'c' => 0,
                'r' => 0,
                'u' => 0,
                'd' => 0,
                'admin' => 0,
                'created_at' => '2019-06-06 14:46:04',
                'updated_at' => '2019-06-06 14:46:04',
            ),
            13 => 
            array (
                'permission_id' => 5,
                'role_id' => 1,
                'c' => 1,
                'r' => 1,
                'u' => 1,
                'd' => 1,
                'admin' => 1,
                'created_at' => '2019-06-06 14:46:04',
                'updated_at' => '2019-06-06 14:46:04',
            ),
        ));
        
        
    }
}