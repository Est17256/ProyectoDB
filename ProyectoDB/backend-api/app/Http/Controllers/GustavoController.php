<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\productos;
use App\opcional;
use App\valoropcional;
use App\facturas;
use App\linea_factura;


class GustavoController extends Controller
{
    public function createPro(Request $request)
    {
        $productos = new productos;
        #$productos->id = $request->id;
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

        //echo "Probando...";
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
    public function createFac(Request $request)
    {   
        $facturas = new facturas;
        
        #$facturas->id = $request->id;
        $facturas->fecha = $request->fecha;
        $facturas->hora = $request->hora;
        $facturas->total = $request->total;
        $facturas->id_clientes = $request->id_clientes;
        $facturas->save();
        
        return response()->json([
            'success' => true,
            'message' => 'creado'
        ], 200);
    }
    public function getFac() {
        $facturas = facturas::all();
        $facturas= $facturas;

        #echo "Probando...";
        return response()->json([
            'success' => true,
            'facturas' => $facturas,
            'message'=>'Funciono',
        ], 200);
    }
    public function createLinFac(Request $request)
    {   
        $linea_factura = new linea_factura;
        
        #$linea_factura->id = $request->id;
        $linea_factura->cantidad = $request->cantidad;
        $linea_factura->precio = $request->precio;
        $linea_factura->id_facturas = $request->id_facturas;
        $linea_factura->id_productos = $request->id_productos;
        $linea_factura->save();
        
        return response()->json([
            'success' => true,
            'message' => 'creado'
        ], 200);
    }
    public function getLinFac() {
        $linea_factura = facturas::all();
        $linea_factura = $linea_factura;

        #echo "Probando...";
        return response()->json([
            'success' => true,
            'linea_factura' => $linea_factura,
            'message'=>'Funciono',
        ], 200);
    }
    
    
}
