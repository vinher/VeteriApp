<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App;
class AnimalsController extends Controller
{
    //


    public function index(){
        return view('usuarios.index');
    }


    public function guardar(Request $request){
      
        

        $dato = new App\Models\Animal;

        $dato->nombre = $request->nombre;
        $dato->tipo = $request->tipo;
        $dato->edad = $request->edad;
        $dato->sexo = $request->sexo;
        $dato->descripcion = $request->descripcion; 

        $dato->save();
        return back()->with('guardar','ok');
    

        //return $request->all();


    }

    public function delete($id){
        $eliminar = App\Models\Send::findorFail($id);
        $eliminar->delete();

        return back()->with('eliminar','ok');

    }
    public function editar(Request $request, $id){
        $animals = App\Models\Send::find($id);

        $animals->nombre = $request->nombre;
        $animals->tipo = $request->tipo;
        $animals->edad = $request->edad;
        $animals->sexo = $request->sexo;
        $animals->descripcion = $request->descripcion; 

        $animals->save();


        return back()->with('edit','ok');
    }

    public function aceptar(Request $request,$id ){
      
       

        $dato = new App\Models\Confirm;

        $dato->nombre = $request->nombre;
        $dato->tipo = $request->tipo;
        $dato->edad = $request->edad;
        $dato->sexo = $request->sexo;
        $dato->descripcion = $request->descripcion; 

        
    
        $eliminar = App\Models\Send::findorFail($id);
        $eliminar->delete();
        $dato->save();

        return back()->with('confirmar','ok');

    }


    public function enviar(Request $request,$id ){
      
       

        $dato = new App\Models\Send;

        $dato->nombre = $request->nombre;
        $dato->tipo = $request->tipo;
        $dato->edad = $request->edad;
        $dato->sexo = $request->sexo;
        $dato->descripcion = $request->descripcion; 

        
    
        $eliminar = App\Models\Animal::findorFail($id);
        $eliminar->delete();
        $dato->save();

        return back()->with('confirmar','ok');

    }

   

}
