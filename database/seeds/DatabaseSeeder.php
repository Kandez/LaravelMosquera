<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\student;
use App\grade;
use App\studies;
use App\company;
use App\petition;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(student::class)->create(['id' => '1', 'name' => 'Marta', 'lastname' => 'Armario Borras', 'age' => '21']);
        factory(student::class)->create(['id' => '2', 'name' => 'Rober', 'lastname' => 'Armario Leon', 'age' => '25']);
        factory(student::class)->create(['id' => '3', 'name' => 'Cristian', 'lastname' => 'Guerrero', 'age' => '24']);
        factory(student::class)->create(['id' => '4', 'name' => 'Quino', 'lastname' => 'Guzman Garcia', 'age' => '24']);
        factory(student::class)->create(['id' => '5', 'name' => 'Jose Manuel', 'lastname' => 'Mosquera Gómez', 'age' => '22']);
        factory(student::class)->create(['id' => '6', 'name' => 'Manuel', 'lastname' => 'Reina', 'age' => '21']);

        factory(grade::class)->create(['id' => '1', 'name' => 'Actividades Comerciales', 'level' => 'Medio']);
        factory(grade::class)->create(['id' => '2', 'name' => 'Calderería y Soldadura', 'level' => 'Medio']);
        factory(grade::class)->create(['id' => '3', 'name' => 'Electromecánica de vehículos Automóviles', 'level' => 'Medio']);
        factory(grade::class)->create(['id' => '4', 'name' => 'Gestión Administrativa', 'level' => 'Medio']);
        factory(grade::class)->create(['id' => '5', 'name' => 'Instalaciones de Telecomunicaciones', 'level' => 'Medio']);
        factory(grade::class)->create(['id' => '6', 'name' => 'Instalaciones Eléctricas y Automáticas', 'level' => 'Medio']);
        factory(grade::class)->create(['id' => '7', 'name' => 'Instalaciones Frigoríficas y de Climatización', 'level' => 'Medio']);
        factory(grade::class)->create(['id' => '8', 'name' => 'Administrador de Sistemas Informaticos en Red', 'level' => 'Superior']);
        factory(grade::class)->create(['id' => '9', 'name' => 'Desarrollo de Aplicaciones Multiplataforma', 'level' => 'Superior']);
        factory(grade::class)->create(['id' => '10', 'name' => 'Mecatrónica', 'level' => 'Superior']);

        factory(studies::class)->create(['id' => '1', 'id_student' => '1', 'id_grade' => '9']);
        factory(studies::class)->create(['id' => '2', 'id_student' => '2', 'id_grade' => '9']);
        factory(studies::class)->create(['id' => '3', 'id_student' => '3', 'id_grade' => '9']);
        factory(studies::class)->create(['id' => '4', 'id_student' => '4', 'id_grade' => '9']);
        factory(studies::class)->create(['id' => '5', 'id_student' => '5', 'id_grade' => '9']);
        factory(studies::class)->create(['id' => '6', 'id_student' => '5', 'id_grade' => '6']);
        
        factory(company::class)->create(['id' => '1', 'name' => 'AT_Sistemas', 'city' => 'Jerez', 'cp' => '11401']);
        factory(company::class)->create(['id' => '2', 'name' => 'Everis', 'city' => 'Sevilla', 'cp' => '41001']);
        factory(company::class)->create(['id' => '3', 'name' => 'IAGT', 'city' => 'Sevilla', 'cp' => '41001']);
        factory(company::class)->create(['id' => '4', 'name' => 'Tecnica_24', 'city' => 'Cadiz', 'cp' => '11001']);
        factory(company::class)->create(['id' => '5', 'name' => 'Accenture', 'city' => 'MAlaga', 'cp' => '29001']);

        factory(petition::class)->create(['id' => '1','id_company' => '1','id_grade'=> '1','type' => 'contrato','n_students'=> '1']);
        factory(petition::class)->create(['id' => '2','id_company' => '2','id_grade'=> '2','type' => 'Dual','n_students'=> '1']);
        factory(petition::class)->create(['id' => '3','id_company' => '2','id_grade'=> '3','type' => 'Dual','n_students'=> '1']);
        factory(petition::class)->create(['id' => '4','id_company' => '3','id_grade'=> '6','type' => 'FCT','n_students'=> '1']);
        factory(petition::class)->create(['id' => '5','id_company' => '4','id_grade'=> '4','type' => 'contrato','n_students'=> '1']);
        factory(petition::class)->create(['id' => '6','id_company' => '5','id_grade'=> '5','type' => 'FCT','n_students'=> '1']);

        factory(User::class)->create(['email' => 'admin@admin.com', 'password' => '123456']);

    }
}
