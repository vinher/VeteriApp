<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        //Condicion para verificar el administrador 
        /*Lo que hace es verificar si el nombre coincide lo en usuario predefinido como administrador, si es así lo re-dirige a su panel.*/


        if(Auth::user()->name == 'admin'){
            
            $viewDate = App\Models\Send::all();        
            $viewD = App\Models\Confirm::all();

            return view('admin.adminpanel',compact('viewDate','viewD'));
        }else{
    
            $viewDate = App\Models\Animal::all();
            return view('usuarios.usuario',compact('viewDate'));  

        

        }
      }

        public function delete($id){
        $eliminar = App\Models\Confirm::findorFail($id);
        $eliminar->delete();

        return back()->with('finalizado','ok');

    }


}  
    

