<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\categorias;
use App\marcas;
use App\clientes;
class LuisController extends Controller
{
    public function createCat(Request $request)
    {    
        $categorias = new categorias;
        #$categorias->id = $request->id;
        $categorias->nombre = $request->nombre;
        $categorias->save();
        return response()->json([
            'success' => true,
            'message' => 'creado'
        ], 200);
    }
    public function createMar(Request $request)
    {    
        $marcas = new marcas;
        #$marcas->id = $request->id;
        $marcas->nombre = $request->nombre;
        $marcas->save();

        return response()->json([
            'success' => true,
            'message' => 'creado'
        ], 200);
    }
    public function createCli(Request $request)
    {    
        $clientes = new clientes;
        $clientes->id = $request->id;
        $clientes->nombre = $request->nombre;
        $clientes->save();

        return response()->json([
            'success' => true,
            'message' => 'creado'
        ], 200);
    }
    public function getMar() {
        $marcas = marcas::all();
        $marcas= $marcas;

        #echo "Probando...";
        return response()->json([
            'success' => true,
            'marcas' => $marcas,
            'message'=>'Funciono',
        ], 200);
    }
    public function getCat() {
        $categorias = categorias::all();
        $categorias= $categorias;
        #echo "Probando...";
        return response()->json([
            'success' => true,
            'categorias' => $categorias,
            'message'=>'Funciono',
        ], 200);
    }
    public function getCli() {
        $clientes = clientes::all();
        $clientes = $clientes;
        
        #echo "Probando...";
        return response()->json([
            'success' => true,
            'clientes' => $clientes,
            'message'=>'Funciono',
        ], 200);
    }
}
