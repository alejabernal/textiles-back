<?php


namespace App\Http\Controllers;



namespace App\Http\Controllers;

use App\NegativeSold;
use Illuminate\Http\Request;
use App\Http\Controllers; 
use Illuminate\Support\Facades\DB;

class NegativeSoldController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     *Retorna un neg dado un id
     *
     *@param $id
     *
     *@return neg;
     */
    public function show($id)
    {
       try {
         $neg = NegativeSold::find($id);
         
        if($neg){
            return response()->json($neg, 200);    
        }
           
       } catch (Exception $e) {
           
           //return $e->getMessage();
           return respose()->json([], 404);
       
       }
    }

    /**
     *Crea un neg
     *
     *@param $Request
     *
     *@return void;
     */

     public function create(Request $request)
    {
        $nega = new NegativeSold;
           

        if($neg->save()){
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
     *@return NegativeSold<>;
     */

     public function index(){
        try {
           $nega = DB::connection('mongodb')->select('ventas_n');
           
            if($nega){
                return response()->json($nega, 200);
            }
        } catch (Exception $e) {
            return response()->json([], 404);
        }

    }

    /**
     *Crea un neg
     *
     *@param $Request, $id
     *
     *@return void;
     */

    public function update(Request $request, $id){
        try {
            $neg = NegativeSold::find($id);
            if($neg){
                $neg->name=$request->input('name');

                if ($neg->save()) {
                    return response()->json([],201);
                }
                
            }
        } catch (Exception $e) {
            return response()->json([],500);
        }
    }

    /**
     *Crea un neg
     *
     *@param $id
     *
     *@return void;
     */

    public function delete($id){
        try {
            $neg = NegativeSold::find($id);
            if($neg->delete()){
                return response()->json([],201);
            }
        } catch (Exception $e) {
            return response()->json([],404);
        }
    }
}

