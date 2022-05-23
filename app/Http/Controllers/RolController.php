<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Agregamos Modelo de roles, permisos y facade 

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Models\User;
 

class RolController extends Controller
{

    /*function __construct(){

        this.middleware('permission:ver-rol | crear-rol | editar-rol| borrar-rol',['only'=>['index']]);
        this.middleware('permission:crear-rol',['create'=>['create','store']]);
        this.middleware('permission:editar-rol',['create'=>['edit','update']]);
        this.middleware('permission:borrar-rol',['create'=>['destroy']]);

    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$roles = Role::all();
        return view('roles.index',compact('roles'));
*/      
       /* $usuarios = User::all();
        foreach($usuarios as $usuario);    
            if($usuarios == 'admin'){
                return view("roles.index");
            }else{
                return view("home");
            }
        */
            return view('home');

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permission  = Permission::get();
        return view('roles.crear',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,['name'=>'required', 'permission'=>'required']);
        $roles = Role::create(['name'=>$request->input('name')]);
        $roles->syncPermission($request->input('permission'));

        return redirect()->route('roles.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //


        Role::find($id);
        $permission= Permission::get();
        $rolpermission = DB::table('role_has_permissions')->where('role_has_permissions.role_id',$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('roles.editar',compact('role','permission','rolePermission'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,['name'=>'required', 'permission'=>'required']);
        Role::find($id);
        $role -> name = $request->input('name');
        $role->save();

        $role->save();

        $role ->syncPermission($request->input('permission'));
        return view('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        DB::table('roles')->where('id',$id)->delete();
        return view('index');
    }
}
