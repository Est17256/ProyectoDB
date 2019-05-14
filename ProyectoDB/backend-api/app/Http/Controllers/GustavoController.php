<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\productos;
use App\opcional;

class GustavoController extends Controller
{
    public function createPro(Request $request)
    {
        $productos = new productos;
        $productos->id = $request->id;
        $productos->nombre = $request->nombre;
        $productos->categoria = $request->categoria;
        $productos->marca = $request->marca;
        $productos->save();

        return response()->json([
            'success' => true,
            'message' => 'creado'
        ], 200);

    }
    public function getPro() {
        $productos = productos::all();
        $productos= $productos;

        #echo "Probando...";
        return response()->json([
            'success' => true,
            'productos' => $productos,
            'message'=>'Funciono',
        ], 200);
    }
    public function createExtra(Request $request)
    {
        $extra = new extra;
        $extra->id = $request->id;
        $extra->nombre = $request->nombre;
        $productos->save();

        return response()->json([
            'success' => true,
            'message' => 'creado'
        ], 200);

    }
    public function getExtra() {
        $productos = productos::all();
        $productos= $productos;

        #echo "Probando...";
        return response()->json([
            'success' => true,
            'productos' => $productos,
            'message'=>'Funciono',
        ], 200);
    }

    public function getCampoN() {
        $opcional = opcional::all();
        $opcional = opcional;

        #echo "Probando...";
        return response()->json([
            'success' => true,
            'opcional' => $opcional,
            'message'=>'Funciono',
        ], 200);
    }

}
