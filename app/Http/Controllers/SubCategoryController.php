<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function addSubCategory()
    {
        $categories = Category::orderBy('category_name','ASC')->get();

        return view('subCategory.addSubCategory',compact('categories'));
    }
    public function allSubCategory()
    {
        $subcategories = SubCategory::latest()->get();
        return view('SubCategory.allSubCategory',compact('subcategories'));
    }

    public function storeSubCategory(Request $request){
  
 
        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ','-',$request->subcategory_name)),

            
        ]);
       
        return redirect()->route('all.SubCategory');
    }//end method

    public function editSubCategory($id){
        $categories = Category::orderBy('category_name','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('subCategory.editSubCategory',compact('categories','subcategory'));

    }//end method

    public  function updateSubCategory(Request $request){
        $subcat_id =$request->id;

        SubCategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ','-',$request->category_name)),

            
        ]);
       
       
        return redirect()->route('all.SubCategory');
     
}


public function deleteSubCategory($id){
    SubCategory::findOrFail($id)->delete();

   
    return redirect()->back();

}
public function getSubCategory($category_id){
    $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
        return json_encode($subcat);

}// End Method 
}
