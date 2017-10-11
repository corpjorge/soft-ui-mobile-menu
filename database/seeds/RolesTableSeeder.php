<?php

use Illuminate\Database\Seeder;
use App\Model\General\Roles;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dato = new Roles();
        $dato->descripcion="Super Admin";      
        $dato->save();

        $dato = new Roles();
        $dato->descripcion="Administrador";       
        $dato->save();

        $dato = new Roles();
        $dato->descripcion="Usuario";    
        $dato->save();  

        $dato = new Roles();
        $dato->descripcion="Invitado";    
        $dato->save();           

    }
}
