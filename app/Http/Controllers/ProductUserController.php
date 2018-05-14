<?php

namespace App\Http\Controllers;

use App\ProductUser;
use Illuminate\Http\Request;
use App\Http\Controllers;



class ProductUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     *Retorna un saleo dado un id
     *
     *@param $id
     *
     *@return ProductUser;
     */
    public function show($id)
    {
        try {
            $sale = ProductUser::find($id);
            if($sale){
            return response()->json($sale, 200);   
          }  
        } catch (Exception $e) {
             return respose()->json([], 404);
        }
         
        
    }

    /**
     *Crea un saleo
     *
     *@param $Request
     *
     *@return void;
     */

     public function create(Request $request)
    {
        $sale = new ProductUser();
        $sale->users_id=$request->input('users_id');
        $sale->products_id=$request->input('products_id');
        $sale->quantitySold=$request->input('quantitySold');
        $sale->totalPrice=$request->input('totalPrice');
        $sale->custom=$request->input('custom');
        $sale->custom_id=$request->input('custom_id');

        try{
            if($sale->save()){
                return response()->json([],201);
            }
        } catch(Exception $e){
            return response()->json([], 500);
        }
    }


   public function index(){
        try {
            $sales = ProductUser::all();
            if($sales){
                return response()->json($sales, 200);
            }
        } catch (Exception $e) {
            return response()->json([], 404);
        }

    }

    /**
     *Crea un sale
     *
     *@param $Request, $id
     *
     *@return void;
     */

    public function update(Request $request, $id){
        try {
            $sale = ProductUser::find($id);
            if($sale){
                $sale->name=$request->input('name');

                if ($sale->save()) {
                    return response()->json([],201);
                }
                
            }
        } catch (Exception $e) {
            return response()->json([],500);
        }
    }

    /**
     *Crea un sale
     *
     *@param $id
     *
     *@return void;
     */

    public function delete($id){
        try {
            $sale = ProductUser::find($id);
            if($sale->delete()){
                return response()->json([],201);
            }
        } catch (Exception $e) {
            
        }
    }

}
