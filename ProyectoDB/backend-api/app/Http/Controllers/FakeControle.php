<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\datafake;
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
    public function createProdF(Faker $faker)
    {   
        for($x=0;$x<10;$x++)
            {
                #Marcas
                $marcas = new marcas;
                $marcas->nombre = $faker->company;
                $marcas->save();
                #Categoria
                $categorias = new categorias;
                $categorias->nombre = $request->word;
                $categorias->save();
                #Clientes
                $clientes = new clientes;
                $clientes->nombre = $request->nombre;
                $clientes->save();
                #Productos
                $hola=categorias::all()->random();
                $hola=$hola->id;
                $hola2=marcas::all()->random();;
                $hola2=$hola2->id;
                $productos = new productos;
                $productos->nombre = $faker->name;
                $productos->id_categorias = $hola;
                $productos->id_marcas = $hola2;
                $productos->save();
            }
        for($x=0;$x<10;$x++)
            {
                $clientesR=clientes::all()->random();
                $clientesR=$clientesR->id;
                $facturas = new facturas;
                $facturas->fecha = $faker->name;
                $facturas->hora = $faker->time;
                $facturas->total = $hola;
                $facturas->id_clientes = $clientesR;
                $facturas->save();
                $facturasR=facturas::all()->random();
                $facturasR=$facturasR->id;
                $productosR=productos::all()->random();
                $productosR=$productosR->id;
                for($x=0;$x<3;$x++)
                    {
                        $lineaF = new linea_factura;
                        $lineaF->precio =$faker->name; 
                        $lineaF->cantidad = $faker->name;
                        $lineaF->id_facturas =$facturasR;
                        $lineaF->id_productos = $productosR;
                    }

            }
        return response()->json([
            'success' => true,
            'message' => 'creado'
        ], 200);
    }
}
