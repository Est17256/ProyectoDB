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
        $categorias->id = $request->id;
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
        $marcas->id = $request->id;
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
    public function getAll() {
        $categorias = categorias::all();
        $categorias= $categorias;
        $marcas = marcas::all();
        $marcas= $marcas;
        $clientes = clientes::all();
        $clientes = $clientes;
        
        #echo "Probando...";
        return response()->json([
            'success' => true,
            'categorias' => $categorias,
            'marcas' => $marcas,
            'clientes' => $clientes,
            'message'=>'Funciono',
        ], 200);
    }
}
