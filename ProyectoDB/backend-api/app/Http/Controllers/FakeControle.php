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
                $categorias->nombre = $faker->word;
                $categorias->save();
                #Clientes
                $clientes = new clientes;
                $clientes->nombre = $faker->name;
                $clientes->save();
                #Productos
                $hola=categorias::all()->random();
                $hola=$hola->id;
                $hola2=marcas::all()->random();;
                $hola2=$hola2->id;
                $productos = new productos;
                $productos->nombre = $faker->word;
                $productos->id_categorias = $hola;
                $productos->id_marcas = $hola2;
                $productos->save();
            }
        for($x=0;$x<10;$x++)
            {
                $clientesR=clientes::all()->random();
                $clientesR=$clientesR->id;
                $facturas = new facturas;
                $facturas->fecha = $faker->date;
                $facturas->hora = $faker->time;
                $facturas->total = 10;
                $facturas->id_clientes = $clientesR;
                $facturas->save();
                $facturasR=facturas::all()->random();
                $facturasR=$facturasR->id;
                #$productosR=productos::all()->random();
                #$productosR=$productosR->id;
                for($i=0;$i<3;$i++)
                    {   
                        $calculo=0;
                        $productosR=productos::all()->random();
                        $productosR=$productosR->id;
                        $lineaF = new linea_factura;
                        $lineaF->precio =10; 
                        $lineaF->cantidad = 10;
                        $lineaF->id_facturas =$facturasR;
                        $lineaF->id_productos = $productosR;
                        $lineaF->save();
                        $calculo=$lineaF->precio*$lineaF->cantidad;
                        $calc=factura::find($facturasR);
                        $calc->total = $calculo;
                        $calc->save();
                    }

            }
        return response()->json([
            'success' => true,
            'message' => 'creado'
        ], 200);
    }
}
