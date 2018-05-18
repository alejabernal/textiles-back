<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers;




class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     *Retorna un producto dado un id
     *
     *@param $id
     *
     *@return Product;
     */
    public function show($id)

    
    {
        try {
            $product = Product::find($id);
            if($product){

            return response()->json($product, 200);   

          }  
        } catch (Exception $e) {
             return respose()->json([], 404);
        }
         
        
    }

    /**
     *Crea un producto
     *
     *@param $Request
     *
     *@return void;
     */

     public function create(Request $request)
    {
        $product = new Product();
        $product->code=$request->input('code');
        $product->name=$request->input('name');
        $product->amount=$request->input('amount');
        $product->price=$request->input('price');
        $product->category_id=$request->input('category_id');
        $product->description=$request->input('description');
        $product->imagePath=$request->input('imagePath');

        try{
            if($product->save()){
                return response()->json([],201);
            }
        } catch(Exception $e){
            return response()->json([], 500);
        }
    }


   public function index(){
        try {
            $products = Product::all();
            if($products){
                return response()->json($products, 200);
            }
        } catch (Exception $e) {
            return response()->json([], 404);
        }

    }

    /**
     *Crea un product
     *
     *@param $Request, $id
     *
     *@return void;
     */

    public function update(Request $request, $id){
        try {
            $product = Product::find($id);
           //echo $product->categories();
            if($product){
                $product->code=$request->input('code');
                $product->name=$request->input('name');
                $product->amount=$request->input('amount');
                $product->price=$request->input('price');
                $product->category_id=$request->input('category_id');
                $product->description=$request->input('description');
                $product->imagePath=$request->input('imagePath');

                if ($product->save()) {
                    return response()->json([],201);
                }
                
            }
        } catch (Exception $e) {
            return response()->json([],500);
        }
    }

    /**
     *ELimina un product
     *
     *@param $id
     *
     *@return void;
     */

    public function delete($id){
        try {
            $product = Product::find($id);
            if($product->delete()){
                return response()->json([],201);
            }
        } catch (Exception $e) {
            
        }
    }

    /**
     *obtiene un categoria de producto
     *
     *@param $id
     *
     *@return void;
     */

    public function getCategory($id)

    
    {
        try {
            $product = Product::find($id);
            if($product){

            return response()->json($product->category, 200);   

          }  
        } catch (Exception $e) {
             return respose()->json([], 404);
        }
         
        
    }
    


}
