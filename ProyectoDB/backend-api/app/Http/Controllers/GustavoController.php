<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\productos;
use App\opcional;
use App\valoropcional;

class GustavoController extends Controller
{
    public function createPro(Request $request)
    {
        $productos = new productos;
        $productos->id = $request->id;
        $productos->nombre = $request->nombre;
        $productos->id_categorias = $request->categoria;
        $productos->id_marcas = $request->marca;
        $productos->save();

        return response()->json([
            'success' => true,
            'message' => 'creado'
        ], 200);

    }
    public function getPro() {
        $productos = productos::all();
        $productos= $productos;

        echo "Probando...";
        return response()->json([
            'success' => true,
            'productos' => $productos,
            'message'=>'Funciono',
        ], 200);
    }
    public function createOpc(Request $request)
    {    
        $opcional = new opcional;
        $opcional->id = $request->id;
        $opcional->nombre = $request->nombre;
        $opcional->save();

        return response()->json([
            'success' => true,
            'message' => 'creado'
        ], 200);

    }
    public function getOpc() {
        $opcional = opcional::all();
        $opcional= $opcional;

        #echo "Probando...";
        return response()->json([
            'success' => true,
            'opcional' => $opcional,
            'message'=>'Funciono',
        ], 200);
    }
    public function createValOp(Request $request)
    {   
        $valoropcional = new valoropcional;
        
        $valoropcional->id = $request->id;
        $valoropcional->id_campo = $request->id_campo;
        $valoropcional->nombre_campo = $request->nombre_campo;
        $valoropcional->valor = $request->valor;
        $valoropcional->save();
        

        return response()->json([
            'success' => true,
            'message' => 'creado',
            'hola' => $request->valor
        ], 200);

    }
    public function getValOp() {
        $valoropcional = valoropcional::all();
        $valoropcional= $valoropcional;

        #echo "Probando...";
        return response()->json([
            'success' => true,
            'valoropcional' => $valoropcional,
            'message'=>'Funciono',
        ], 200);
    }

}
