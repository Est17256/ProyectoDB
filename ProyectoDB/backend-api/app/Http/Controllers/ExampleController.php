<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\datafake;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    public function getUsers() {
        $users = User::all();
        $users= $users;
        
        #echo "Probando...";
        return response()->json([
            'success' => true,
            'users' => $users,
            'message'=>'Funciono',
        ], 200);
    }
    public function index() {
        // regresa una respuesta con el objeto especificado como json
        // y el segundo parametro es el codigo HTTP.
        
        return response()->json([
            'success' => true,
            'message' => 'Hola amigos!!',
        ], 200);
    }

    public function getID() {
        $users = DB::select('SELECT id from users');
        #echo "Probando...";

        return response()->json([
            'success' => true,
            'users' => $users,
            'message'=>'Funciono',
        ], 200);
    }
    public function CreatT() {
        $query =DB::select('
        CREATE TABLE prueba(
         id INTEGER PRIMARY KEY,
         name VARCHAR (50))');
        #echo "Probando...";

        return response()->json([
            'success' => true,
            'message'=>'FuncionoCreacion',
        ], 200);
    }

    public function postExample(Request $request) {
        // hay varias maneras de acceder a los datos que vienen en el Request.
        // Una de ellas es simplemente como un atributo del objeto, con la sintaxis (->)
        // Es lo mismo que el (.) en otros lenguajes: objeto->nombreAtributo
        
        return response()->json([
            'success' => true,
            'message' => 'El usuario envio: '.$request->message
        ], 200);
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        $user=User::find($id);
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => 'eliminado'
        ], 200);
    }
    public function store()
    {    
        $user = new User;
        $user->name = 'diego';
        $user->email = 'diego@gmail.com';
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'creado'
        ], 200);
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'email' => 'email',
            'password' => 'min:6|max:255'
        ]);

        $id = $request->id;
        $user=User::find($id);
        #$user->name = 'diego';
        #$user->email = 'diego@gmail.com';
        #$user->password = '12345';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'creado'
        ], 200);
    }
}