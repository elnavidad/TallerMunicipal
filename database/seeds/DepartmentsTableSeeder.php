<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('departments')->delete();
        
        \DB::table('departments')->insert(array (
            0 => 
            array (
                'name' => 'Desarrollo',
                'attendant' => 'Ing. Francisco Aurelio Vera Espinoza',
                'dependency_id' => '20',
                'created_at' => '2019-03-05 16:33:07.723',
                'updated_at' => '2019-03-05 16:33:07.723',
            ),
            1 => 
            array (
                'name' => 'Soporte',
                'attendant' => 'Ing. Fabian Medardo Barron Hurtado',
                'dependency_id' => '20',
                'created_at' => '2019-03-05 16:33:07.727',
                'updated_at' => '2019-03-05 16:33:07.727',
            ),
            2 => 
            array (
                'name' => 'Administrativo',
                'attendant' => 'Ing. Edgar Alonso Sosa Camargo',
                'dependency_id' => '20',
                'created_at' => '2019-03-05 16:33:07.727',
                'updated_at' => '2019-03-05 16:33:07.727',
            ),
            3 => 
            array (
                'name' => 'Coordinación de Atención Ciudadana',
                'attendant' => 'Paty Blaine',
                'dependency_id' => '1',
                'created_at' => '2019-03-06 09:12:33.357',
                'updated_at' => '2019-03-06 09:12:33.357',
            ),
            4 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Julia Patricia Angulo',
                'dependency_id' => '2',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            5 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Jorge Jauregui',
                'dependency_id' => '3',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            6 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Carlos Castros Martin del Campo',
                'dependency_id' => '4',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            7 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Pedro Garcilazo ',
                'dependency_id' => '5',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            8 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Jose Avila Ortiz',
                'dependency_id' => '6',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            9 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Luis Oscar Ruiz Benitez',
                'dependency_id' => '7',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            10 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Ignacio Sepulveda Valenzuela',
                'dependency_id' => '8',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            11 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Martin Enrique Morale Perez',
                'dependency_id' => '9',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            12 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Alejandro Castro Sandoval',
                'dependency_id' => '10',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            13 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Manuel Alejandro Corral Avechuco',
                'dependency_id' => '11',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            14 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Juan Jaime de la Torre Ruiz de Chavez',
                'dependency_id' => '12',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            15 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Bladimir Rojas Mendoza',
                'dependency_id' => '13',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            16 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Lucia Ester Alvarez',
                'dependency_id' => '14',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            17 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Jose de Jesus Baez Galvez',
                'dependency_id' => '15',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            18 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Alma Leticia Sobarzo Lopez',
                'dependency_id' => '16',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            19 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Jesus Alberto Dicochea Aguilar',
                'dependency_id' => '17',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            20 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Juan Alberto Vega Garcia',
                'dependency_id' => '18',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            21 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Jorge Alberto Valencia Castro',
                'dependency_id' => '19',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            22 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Edgar Alonso Sosa Camargo',
                'dependency_id' => '20',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            23 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Ramon Antonio Fernandez Palafox',
                'dependency_id' => '22',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            24 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Julio Cesar Chavez Coronado',
                'dependency_id' => '23',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            25 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Blanca Maricela Moreno Cano',
                'dependency_id' => '24',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            26 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Lucia Mendez Vega',
                'dependency_id' => '25',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            27 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Karla Leticia Rivera Nieblas ',
                'dependency_id' => '26',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            28 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Veronica Garcia Manzo',
                'dependency_id' => '27',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            29 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Juan Martin Espinoza Sotelo',
                'dependency_id' => '28',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            30 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Ignacio Lechuga',
                'dependency_id' => '29',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            31 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'David Rene Lopez Meza',
                'dependency_id' => '30',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            32 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Victor Manuel Rodriguez Hernández',
                'dependency_id' => '31',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
            33 => 
            array (
                'name' => 'Dirección',
                'attendant' => 'Jose Gim Nogales',
                'dependency_id' => '34',
                'created_at' => '2019-03-06 11:44:04.287',
                'updated_at' => '2019-03-06 11:44:04.287',
            ),
        ));
        
        
    }
}