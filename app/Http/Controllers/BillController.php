<?php


namespace App\Http\Controllers;

use App\Bill;
use Illuminate\Http\Request;
use App\Http\Controllers; 

class BillController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     *Retorna un bill dado un id
     *
     *@param $id
     *
     *@return bill;
     */
    public function show($id)
    {
       try {
         $bill = Bill::find($id);
         
        if($bill){
            return response()->json($bill, 200);    
        }
           
       } catch (Exception $e) {
           
           //return $e->getMessage();
           return respose()->json([], 404);
       
       }
    }

    /**
     *Crea un bill
     *
     *@param $Request
     *
     *@return void;
     */

     public function create(Request $request)
    {
        $bill = new Bill();
        $bill->total=$request->input('total');
        $bill->status=$request->input('status');
        $bill->tmp=$request->input('tmp');
        $bill->custom_id=$request->input('custom_id');
        $bill->custom=$request->input('custom');
        $bill->user_id=$request->input('user_id');

        if($bill->save()){

            return response()->json([],201);
        }else{
            return response()->json([],500);
        }
    }

    public function lastBill(Request $request){
        $bill = Bill::where('tmp', $request -> input('tmp'))->first();
        if($bill){
            return response()->json($bill, 200);
        }
    }

    /**
     *devuelve todas la categorías
     *
     *@param void;
     *
     *@return Bill<>;
     */

     public function index(){
        try {
            $roles = Bill::all();
            if($roles){
                return response()->json($roles, 200);
            }
        } catch (Exception $e) {
            return response()->json([], 404);
        }

    }

    /**
     *Crea un bill
     *
     *@param $Request, $id
     *
     *@return void;
     */

    public function update(Request $request, $id){
        try {
            $bill = Bill::find($id);
            if($bill){
                 $bill->total=$request->input('total');
                 $bill->custom_id=$request->input('custom_id');
                 $bill->custom=$request->input('custom');
                 $bill->user_id=$request->input('user_id');

                if ($bill->save()) {
                    return response()->json([],201);
                }
                
            }
        } catch (Exception $e) {
            return response()->json([],500);
        }
    }

    /**
     *Crea un bill
     *
     *@param $id
     *
     *@return void;
     */

    public function delete($id){
        try {
            $bill = Bill::find($id);
            if($bill->delete()){
                return response()->json([],201);
            }
        } catch (Exception $e) {
            return response()->json([],404);
        }
    }
}
