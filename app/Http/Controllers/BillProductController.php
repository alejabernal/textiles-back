<?php

namespace App\Http\Controllers;

use App\BillProduct;
use App\Bill;
use App\Product;
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
        $billProduct->amount=$request->input('amount');
        
        $product = Product::find($request->input('product_id'));
        $product->amount=$product->amount - $request->input('amount');

        try{
            if($billProduct->save() && $product->save()){
               

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

    public function getProduct($id){
        $sale = BillProduct::find($id)->product;
        return response()->json($sale, 200);
    }

    public function getBill($id){
        $sale = BillProduct::find($id)->bill;
        return response()->json($sale, 200);
    }

    public function index2(){
        $sales = BillProduct::all();

        foreach ($sales as $sale) {
            $sale->products = $sale->product;
        }

        return response()->json($sales, 200);
    }

}
