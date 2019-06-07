<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'route' => 'user',
                'title' => 'Usuarios',
                'icon' => NULL,
                'menu' => 1,
                'priority' => 1,
                'parent' => 3,
                'created_at' => '2018-12-26 13:50:30',
                'updated_at' => '2018-12-26 13:50:30',
            ),
            1 => 
            array (
                'route' => 'permission',
                'title' => 'Permisos',
                'icon' => NULL,
                'menu' => 1,
                'priority' => 1,
                'parent' => 4,
                'created_at' => '2018-12-26 13:50:30',
                'updated_at' => '2018-12-26 13:50:30',
            ),
            2 => 
            array (
                'route' => NULL,
                'title' => 'Usuarios y Dependencias',
                'icon' => 'flaticon-users',
                'menu' => 1,
                'priority' => 4,
                'parent' => -1,
                'created_at' => '2018-12-26 13:50:30',
                'updated_at' => '2019-06-06 15:18:31',
            ),
            3 => 
            array (
                'route' => NULL,
                'title' => 'Developers',
                'icon' => 'la la-code',
                'menu' => 1,
                'priority' => 5,
                'parent' => -1,
                'created_at' => '2018-12-26 13:50:30',
                'updated_at' => '2019-06-06 15:18:31',
            ),
            4 => 
            array (
                'route' => 'role',
                'title' => 'Roles',
                'icon' => NULL,
                'menu' => 1,
                'priority' => 2,
                'parent' => 4,
                'created_at' => '2018-12-26 13:50:30',
                'updated_at' => '2018-12-26 13:50:30',
            ),
            5 => 
            array (
                'route' => NULL,
                'title' => 'Admin',
                'icon' => NULL,
                'menu' => 0,
                'priority' => 3,
                'parent' => -1,
                'created_at' => '2018-12-26 13:50:30',
                'updated_at' => '2019-06-06 15:18:31',
            ),
            6 => 
            array (
                'route' => 'developer',
                'title' => 'Developer',
                'icon' => NULL,
                'menu' => 0,
                'priority' => 6,
                'parent' => -11,
                'created_at' => '2018-12-26 13:50:30',
                'updated_at' => '2018-12-26 13:50:30',
            ),
            7 => 
            array (
                'route' => 'noruta',
                'title' => 'Catalogos',
                'icon' => 'fa fa-car',
                'menu' => 1,
                'priority' => 1,
                'parent' => -1,
                'created_at' => '2019-05-15 20:21:06',
                'updated_at' => '2019-06-06 15:18:41',
            ),
            8 => 
            array (
                'route' => 'vehicle',
                'title' => 'Vehiculos',
                'icon' => 'la la-film',
                'menu' => 1,
                'priority' => 1,
                'parent' => 8,
                'created_at' => '2019-05-15 20:21:22',
                'updated_at' => '2019-06-06 15:18:31',
            ),
            9 => 
            array (
                'route' => 'refection',
                'title' => 'Refacciones',
                'icon' => 'fa fa-toolbox',
                'menu' => 1,
                'priority' => 4,
                'parent' => 8,
                'created_at' => '2019-05-27 10:48:08',
                'updated_at' => '2019-06-06 15:18:31',
            ),
            10 => 
            array (
                'route' => 'oil',
                'title' => 'Aceites',
                'icon' => 'fa fa-oil-can',
                'menu' => 1,
                'priority' => 7,
                'parent' => 8,
                'created_at' => '2019-05-27 10:48:31',
                'updated_at' => '2019-06-06 15:18:31',
            ),
            11 => 
            array (
                'route' => 'brand',
                'title' => 'Marcas',
                'icon' => 'la la-certificate',
                'menu' => 1,
                'priority' => 2,
                'parent' => -1,
                'created_at' => '2019-05-27 10:50:00',
                'updated_at' => '2019-06-06 15:18:41',
            ),
            12 => 
            array (
                'route' => 'vehicleIn',
                'title' => 'Entrada de Vehiculos',
                'icon' => 'fa fa-car-crash',
                'menu' => 1,
                'priority' => 2,
                'parent' => 8,
                'created_at' => '2019-06-05 12:16:49',
                'updated_at' => '2019-06-06 15:18:31',
            ),
            13 => 
            array (
                'route' => 'vehicleOut',
                'title' => 'Salida de Vehiculos',
                'icon' => 'fa fa-car-side',
                'menu' => 1,
                'priority' => 3,
                'parent' => 8,
                'created_at' => '2019-06-05 15:23:23',
                'updated_at' => '2019-06-06 15:18:31',
            ),
            14 => 
            array (
                'route' => 'refectionIn',
                'title' => 'Entrada de Refacciones',
                'icon' => 'fa fa-toolbox',
                'menu' => 1,
                'priority' => 5,
                'parent' => 8,
                'created_at' => '2019-06-06 13:37:22',
                'updated_at' => '2019-06-06 15:18:31',
            ),
            15 => 
            array (
                'route' => 'refectionOut',
                'title' => 'Salida de Refacciones',
                'icon' => 'flaticon-logout',
                'menu' => 1,
                'priority' => 6,
                'parent' => 8,
                'created_at' => '2019-06-06 14:45:44',
                'updated_at' => '2019-06-06 15:18:31',
            ),
        ));
        
        
    }
}