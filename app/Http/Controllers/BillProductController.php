<?php

namespace App\Http\Controllers;

use App\BillProduct;
use Illuminate\Http\Request;
use App\Http\Controllers;



class BillProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     *Retorna un billProducto dado un id
     *
     *@param $id
     *
     *@return BillProduct;
     */
    public function show($id)
    {
        try {
            $billProduct = BillProduct::find($id);
            if($billProduct){
            return response()->json($billProduct, 200);   
          }  
        } catch (Exception $e) {
             return respose()->json([], 404);
        }
         
        
    }

    /**
     *Crea un billProducto
     *
     *@param $Request
     *
     *@return void;
     */

     public function create(Request $request)
    {
        $billProduct = new BillProduct();
        $billProduct->bill_id=$request->input('bill_id');
        $billProduct->product_id=$request->input('product_id');
        $billProduct->total=$request->input('total');
        $billProduct->status=$request->input('status');
       
        try{
            if($billProduct->save()){
                return response()->json([],201);
            }
        } catch(Exception $e){
            return response()->json([], 500);
        }
    }


   public function index(){
        try {
            $billProducts = BillProduct::all();
            if($billProducts){
                return response()->json($billProducts, 200);
            }
        } catch (Exception $e) {
            return response()->json([], 404);
        }

    }

    /**
     *Crea un billProduct
     *
     *@param $Request, $id
     *
     *@return void;
     */

    public function update(Request $request, $id){
        try {
            $billProduct = BillProduct::find($id);
            if($billProduct){
               $billProduct->bill_id=$request->input('bill_id');
               $billProduct->product_id=$request->input('product_id');
               $billProduct->total=$request->input('total');
               $billProduct->status=$request->input('status');

                if ($billProduct->save()) {
                    return response()->json([],201);
                }
                
            }
        } catch (Exception $e) {
            return response()->json([],500);
        }
    }

    /**
     *Crea un billProduct
     *
     *@param $id
     *
     *@return void;
     */

    public function delete($id){
        try {
            $billProduct = BillProduct::find($id);
            if($billProduct->delete()){
                return response()->json([],201);
            }
        } catch (Exception $e) {
            
        }
    }

}
