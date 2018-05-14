<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers;



class ProviderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     *Retorna un providero dado un id
     *
     *@param $id
     *
     *@return Provider;
     */
    public function show($id)
    {
        try {
            $provider = Provider::find($id);
            if($provider){
            return response()->json($provider, 200);   
          }  
        } catch (Exception $e) {
             return respose()->json([], 404);
        }
         
        
    }

    /**
     *Crea un providero
     *
     *@param $Request
     *
     *@return void;
     */

     public function create(Request $request)
    {
        $provider = new Provider();
        $provider->name=$request->input('name');
        $provider->ciudad=$request->input('ciudad');
        $provider->telefono=$request->input('telefono');
       
        try{
            if($provider->save()){
                return response()->json([],201);
            }
        } catch(Exception $e){
            return response()->json([], 500);
        }
    }


   public function index(){
        try {
            $providers = Provider::all();
            if($providers){
                return response()->json($providers, 200);
            }
        } catch (Exception $e) {
            return response()->json([], 404);
        }

    }

    /**
     *Crea un provider
     *
     *@param $Request, $id
     *
     *@return void;
     */

    public function update(Request $request, $id){
        try {
            $provider = Provider::find($id);
            if($provider){
                $provider->name=$request->input('name');
                $provider->ciudad=$request->input('ciudad');
                $provider->telefono=$request->input('telefono');

                if ($provider->save()) {
                    return response()->json([],201);
                }
                
            }
        } catch (Exception $e) {
            return response()->json([],500);
        }
    }

    /**
     *Crea un provider
     *
     *@param $id
     *
     *@return void;
     */

    public function delete($id){
        try {
            $provider = Provider::find($id);
            if($provider->delete()){
                return response()->json([],201);
            }
        } catch (Exception $e) {
            
        }
    }

}
