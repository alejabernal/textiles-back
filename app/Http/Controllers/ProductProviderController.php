<?php

namespace App\Http\Controllers;

use App\ProductProvider;
use Illuminate\Http\Request;
use App\Http\Controllers;



class ProductProviderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     *Retorna un productProvidero dado un id
     *
     *@param $id
     *
     *@return ProductProvider;
     */
    public function show($id)
    {
        try {
            $productProvider = ProductProvider::find($id);
            if($productProvider){
            return response()->json($productProvider, 200);   
          }  
        } catch (Exception $e) {
             return respose()->json([], 404);
        }
         
        
    }

    /**
     *Crea un productProvidero
     *
     *@param $Request
     *
     *@return void;
     */

     public function create(Request $request)
    {
        $productProvider = new ProductProvider();
        $productProvider->products_id=$request->input('products_id');
        $productProvider->provider_id=$request->input('provider_id');

        try{
            if($productProvider->save()){
                return response()->json([],201);
            }
        } catch(Exception $e){
            return response()->json([], 500);
        }
    }


   public function index(){
        try {
            $productProvidersProviders = ProductProvider::all();
            if($productProvidersProviders){
                return response()->json($productProvidersProviders, 200);
            }
        } catch (Exception $e) {
            return response()->json([], 404);
        }

    }

    /**
     *Crea un productProvider
     *
     *@param $Request, $id
     *
     *@return void;
     */

    public function update(Request $request, $id){
        try {
            $productProvider = ProductProvider::find($id);
            if($productProvider){
                $productProvider->products_id=$request->input('products_id');
                $productProvider->provider_id=$request->input('provider_id');

                if ($productProvider->save()) {
                    return response()->json([],201);
                }
                
            }
        } catch (Exception $e) {
            return response()->json([],500);
        }
    }

    /**
     *Crea un productProvider
     *
     *@param $id
     *
     *@return void;
     */

    public function delete($id){
        try {
            $productProvider = ProductProvider::find($id);
            if($productProvider->delete()){
                return response()->json([],201);
            }
        } catch (Exception $e) {
            
        }
    }

}
