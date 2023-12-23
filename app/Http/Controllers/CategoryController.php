<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory()
    {
        return view('category.addCategory');
    }
    public function allCategory()
    {
        $categories = Category::latest()->get();
        return view('category.allCategory',compact('categories'));
    }

    public function storeCategory(Request $request){
      
 
        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
            
        ]);
       
       
        return redirect()->route('all.category');
    }//end method

    public function deleteCategory($id){
        $category = Category::findOrfail($id);
       

        Category::findOrfail($id)->delete();
      
        return redirect()->route('all.category');

    }

    
    public function editCategory($id){
        $categories = Category::findOrFail($id);
        return view('category.editCategory',compact('categories'));

    }//end method

    public  function updateCategory(Request $request){
        $cat_id =$request->id;

        Category::findOrFail($cat_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),

            
        ]);
     
       
        return redirect()->route('all.category');
     
}
}
