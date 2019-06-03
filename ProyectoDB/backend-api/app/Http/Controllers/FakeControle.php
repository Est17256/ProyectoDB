<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\categorias;
use App\marcas;
use App\clientes;
use App\facturas;
use App\linea_factura;
use App\productos;
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
            #$datafake->id = $contador;
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
    public function getCatF() {
        $categorias = categorias::all()->random();
        #$categorias= $categorias->last();
        $categorias = $categorias->id;
        #echo "Probando...";
        return response()->json([
            'success' => true,
            'categorias' => $categorias,
            'message'=>'Funciono',
        ], 200);
    }
    public function createProdF(Request $request,Faker $faker)
    {   
        for($x=0;$x<10;$x++)
            {
                $clientesR=clientes::all()->random();
                $clientesR=$clientesR->id;
                $facturas = new facturas;
                $facturas->fecha = $request->fecha;
                $facturas->hora = $faker->time;
                $facturas->total = 0;
                $facturas->id_clientes = $clientesR;
                $facturas->save();
                $facturasR=facturas::all()->random();
                $facturasR=$facturasR->id;
                #$productosR=productos::all()->random();
                #$productosR=$productosR->id;
                $calculo=0;
                for($i=0;$i<3;$i++)
                    {   
                        $productosR=productos::all()->random();
                        $productosR=$productosR->id;
                        $lineaF = new linea_factura;
                        //$lineaF->id =$i+1; 
                        $lineaF->precio =$faker->randomDigit; 
                        $lineaF->cantidad = rand(1,5);
                        $lineaF->id_facturas =$facturas->id;
                        $lineaF->id_productos = $productosR;
                        $lineaF->save();
                        $calculo+=$lineaF->precio*$lineaF->cantidad;
                    }
                    $facturas->total = $calculo;
                    $facturas->save();

            }
        return response()->json([
            'success' => true,
            'message' => 'creado'
        ], 200);
    }
}
