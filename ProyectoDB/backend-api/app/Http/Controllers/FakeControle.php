<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\datafake;
use Faker\Generator as Faker;

class FakeControle extends Controller
{
    public function storeFaker(Faker $faker)
    {   
        #$datafake = factory(datafake::class)->create();
        $contador=1;
        for($x=0;$x<3;$x++)
            {$datafake = new datafake;
            #$datafake->name = 'diego5';
            echo "hola";
            $contador++;
            $datafake->id = $contador;
            $datafake->email = 'diego@gmail.com';
            #$datafake->name = factory(datafake::class)->make();
            $datafake->name = $faker->name;
            $datafake->save();}

        return response()->json([
            'success' => true,
            'message' => 'creado'
        ], 200);
    }
    public function getUsersF() {
        $datafake = datafake::all();
        $datafake= $datafake;
        
        #echo "Probando...";
        return response()->json([
            'success' => true,
            'users' => $datafake,
            'message'=>'Funciono',
        ], 200);
    }
}
