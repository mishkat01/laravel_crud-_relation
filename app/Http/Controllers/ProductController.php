<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\Product;
use Image;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function addProduct()
    {
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        return view('product.addProduct',compact('subcategories','categories'));
    }
    public function allProduct()
    {
        $products  = Product::latest()->get();
        return view('product.allProducts',compact('products'));
    }

    public function StoreProduct(Request $request)   {
        $image = $request->file('product_thambnail');
        $name_genarate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('uploads/product/'.$name_genarate);
        $save_url = 'uploads/product/'.$name_genarate;
         
         $product_id= Product::insertGetId([
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
           
            'short_descp' => $request->short_descp,
            'old_price' => $request->selling_price,
            'new_price' => $request->discount_price,
            
            'product_thambnail' => $save_url,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
           
            'created_at' => Carbon::now(),
            

        ]);
       
       
        return redirect()->route('all.Product');
    }//end method
}
