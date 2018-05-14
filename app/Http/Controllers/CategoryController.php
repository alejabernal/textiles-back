<?php


namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers; 
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     *Retorna un category dado un id
     *
     *@param $id
     *
     *@return category;
     */
    public function show($id)
    {
       try {
         
         $category = Category::find($id);
         
        if($category){
            return response()->json($category, 200);    
        }
           
       } catch (Exception $e) {
           
           //return $e->getMessage();
           return respose()->json([], 404);
       
       }
    }

    /**
     *Crea un category
     *
     *@param $Request
     *
     *@return void;
     */

     public function create(Request $request)
    {
        $category = new Category();
        $category->name=$request->input('name');

        if($category->save()){
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
     *@return Category<>;
     */

     public function index(){
        try {
            $categories = Category::all();
            //$categories = DB::table('categories')->paginate(3);
            if($categories){
                return response()->json($categories, 200);
            }
        } catch (Exception $e) {
            return response()->json([], 404);
        }

    }

    /**
     *Crea un category
     *
     *@param $Request, $id
     *
     *@return void;
     */

    public function update(Request $request, $id){
        try {
            $category = Category::find($id);
            if($category){
                $category->name=$request->input('name');

                if ($category->save()) {
                    return response()->json([],201);
                }
                
            }
        } catch (Exception $e) {
            return response()->json([],500);
        }
    }

    /**
     *Crea un category
     *
     *@param $id
     *
     *@return void;
     */

    public function delete($id){
        try {
            $category = Category::find($id);
            if($category->delete()){
                return response()->json([],201);
            }
        } catch (Exception $e) {
            return response()->json([],404);
        }
    }
}
