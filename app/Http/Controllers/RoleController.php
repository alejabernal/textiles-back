<?php


namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers; 

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     *Retorna un rol dado un id
     *
     *@param $id
     *
     *@return rol;
     */
    public function show($id)
    {
       try {
         $rol = Role::find($id);
         
        if($rol){
            return response()->json($rol, 200);    
        }
           
       } catch (Exception $e) {
           
           //return $e->getMessage();
           return respose()->json([], 404);
       
       }
    }

    /**
     *Crea un rol
     *
     *@param $Request
     *
     *@return void;
     */

     public function create(Request $request)
    {
        $rol = new Role();
        $rol->name=$request->input('name');

        if($rol->save()){
            return response()->json([],201);
        }else{
            return response()->json([],500);
        }
    }

    /**
     *devuelve todas la categorías
     *
     *@param void;
     *
     *@return Role<>;
     */

     public function index(){
        try {
            $roles = Role::all();
            if($roles){
                return response()->json($roles, 200);
            }
        } catch (Exception $e) {
            return response()->json([], 404);
        }

    }

    /**
     *Crea un rol
     *
     *@param $Request, $id
     *
     *@return void;
     */

    public function update(Request $request, $id){
        try {
            $rol = Role::find($id);
            if($rol){
                $rol->name=$request->input('name');

                if ($rol->save()) {
                    return response()->json([],201);
                }
                
            }
        } catch (Exception $e) {
            return response()->json([],500);
        }
    }

    /**
     *Crea un rol
     *
     *@param $id
     *
     *@return void;
     */

    public function delete($id){
        try {
            $rol = Role::find($id);
            if($rol->delete()){
                return response()->json([],201);
            }
        } catch (Exception $e) {
            return response()->json([],404);
        }
    }
}
