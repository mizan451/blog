<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function add_category(Request $request){
        $this->validate($request, ['cat_name' => 'required|Min:2|Max:50']);
        $category = New category();
        $category->cat_name = $request->cat_name;
        $category->save();
        return ['message'=> 'ok'];
    }

    public function all_category(){
        $categories = category::all();
        return response()->json([
             'categories' => $categories
        ], 200);
    }

    public function delete_category($id){
        $category = category::find($id);
        $category->delete();
    }

    public function edit_category($id){
        $category = category::find($id);
        return response()->json([
            'category' => $category
       ], 200);
    }

    public function update_category(Request $request, $id){
                          $category = category::find($id);
                          $category->cat_name = $request->cat_name;
                          $category->save();
                     }
}
