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
        $dato = new User();   
        $dato->documento="1014205146";
        $dato->name="Jorge Peralta";
        $dato->email="admin@admin.com";
        $dato->password="111111";
        $dato->rol_id=1;      
        $dato->estado=1;        
        $dato->save();

        $dato = new User();   
        $dato->documento="1010";
        $dato->name="Usuario";
        $dato->email="correo@correo.com";
        $dato->password="111111";
        $dato->rol_id=3;      
        $dato->estado=1;        
        $dato->save();
    }
}
