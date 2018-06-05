<?php


namespace App\Http\Controllers;

use App\RoleUser;
use Illuminate\Http\Request;
use App\Http\Controllers; 

class RoleUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     *Retorna un userRol dado un id
     *
     *@param $id
     *
     *@return userRol;
     */
    public function show($id)
    {
       try {
         $userRol = RoleUser::find($id);
         
        if($userRol){
            return response()->json($userRol, 200);    
        }
           
       } catch (Exception $e) {
           
           //return $e->getMessage();
           return respose()->json([], 404);
       
       }
    }

    /**
     *Crea un userRol
     *
     *@param $Request
     *
     *@return void;
     */

     public function create(Request $request)
    {
        $userRol = new RoleUser();
        $userRol->name=$request->input('name');

        if($userRol->save()){
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
     *@return RoleUser<>;
     */

     public function index(){
        try {
            $usersRoles = RoleUser::all();
            if($usersRoles){
                return response()->json($usersRoles, 200);
            }
        } catch (Exception $e) {
            return response()->json([], 404);
        }

    }

    /**
     *Crea un userRol
     *
     *@param $Request, $id
     *
     *@return void;
     */

    public function update(Request $request, $id){
        try {
            $userRol = RoleUser::find($id);
            if($userRol){
                $userRol->name=$request->input('name');

                if ($userRol->save()) {
                    return response()->json([],201);
                }
                
            }
        } catch (Exception $e) {
            return response()->json([],500);
        }
    }

    /**
     *Crea un userRol
     *
     *@param $id
     *
     *@return void;
     */

    public function delete($id){
        try {
            $userRol = RoleUser::find($id);
            if($userRol->delete()){
                return response()->json([],201);
            }
        } catch (Exception $e) {
            return response()->json([],404);
        }
    }
}
