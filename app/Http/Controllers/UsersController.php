<?php

namespace App\Http\Controllers;

use App\User;
use App\RoleUser;
use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     *Retorna un usero dado un id
     *
     *@param $id
     *
     *@return User;
     */
    public function show($id)
    {
        try {
            //$user = User::find($id)->roles()->orderBy('name')->get();
            $user = User::find($id);
            if($user){
            return response()->json($user, 200);   
          }  
        } catch (Exception $e) {
             return respose()->json([], 404);
        }
         
        
    }

    /**
     *Crea un usero
     *
     *@param $Request
     *
     *@return void;
     */

     public function create(Request $request)
    {
        $user = new User();
        $user->name=$request->input('name');
        $user->username=$request->input('username');
        $user->email=$request->input('email');
        $user->password=Hash::make($request->input('password'));
        $user->api_token = str_random(60);

        try{
            if($user->save()){
                $userAdded = User::find($user);
                
                $roleUser = new RoleUser();

                $roleUser->user_id = $userAdded[0]->id;
                $roleUser->role_id = $request->input('roleId');

                if ($roleUser->save()) {
                    return response()->json($roleUser,201);
                }else{
                    return response()->json([],201);
                }

                
            }else{
                return response()->json([], 500);
            }
        } catch(ModelNottryFoundException $e){
            return response()->json(['error'=>'registro fallido'], 500);
        }
    }


   public function index(Request $request){
       if ($request->isJson()) {

            try {
            $users = User::all();
            if($users){
                return response()->json($users, 200);
            }
        } catch (Exception $e) {
            return response()->json([], 404);
        }
       }else{
            return response()->json(['error'=>'Unauthorized'], 401);
       }

    }

    /**
     *Crea un user
     *
     *@param $Request, $id
     *
     *@return void;
     */

    public function update(Request $request, $id){
        try {
            $user = User::find($id);
            if($user){
                $user->name=$request->input('name');
                $user->username=$request->input('username');
                $user->email=$request->input('email');
                $user->password=$request->input('password');


                if ($user->save()) {
                    return response()->json([],201);
                }
                
            }
        } catch (Exception $e) {
            return response()->json([],500);
        }
    }

    /**
     *Crea un user
     *
     *@param $id
     *
     *@return void;
     */

    public function delete($id){
        try {
            $user = User::find($id);
            if($user->delete()){
                return response()->json([],201);
            }
        } catch (Exception $e) {
            
        }
    }

    public function getToken(Request $request){

        if($request->isJson()){
            try {
                 $username = $request->input("username");
                 $password = $request->input("password");
                 //return response()->json([$data, 404]);
                 $user = User::where('username', $username)->first();


                 if ($user && Hash::check($password, $user->password)) {
                        return response()->json($user, 210);
                    }else{
                        return response()->json(['error'=>'No content'], 404);
                    }   
            } catch (ModelNottryFoundException $e) {
               return response()->json(['error'=>'Unauthorized'], 401);
            }
        }
    }




}
