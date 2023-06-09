<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    public function Listar(Request $request){
        return view("listarPersonas",[
            "personas" => Persona::all()
        ]);
    }

    public function Eliminar(Request $request, $idPersona){
        $persona = Persona::findOrFail($idPersona);
        $persona -> delete();

        return redirect("/");

    }
    public function Insertar(Request $request){
        $persona = new Persona;
        $persona -> nombre = $request -> post("nombre");
        $persona -> apellido = $request -> post("apellido");

        $persona -> save();

        return view('crearPersona',[
            "creado" => true
        ]);




    }
}
