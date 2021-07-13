<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class SpaController extends Controller
{
    
	public function index(Request $request){

		$request->validate([
            'name'=>'required|min:5|unique:categories,name'
        ]);

        $category = Category::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name)
        ]);

        return response()->json(['success'=> true, 'message'=>200]);
	}


	public function demo(){
		return view('demo');
	}

    public function getData(){
        $categories = Category::latest()->get();
        return response()->json($categories, 200);
    }

    public function edit($id){
        $category = Category::find($id);
        return response()->json($category, 200);
    }

    public function editPost(Request $request){
        $find = Category::find($request->id);
        $find->name = $request->name;
        $find->slug = Str::slug($request->name);
        $find->save();

        return response()->json(['success'=>true, 'message'=>200]);
    }

    public function delete(Request $request){
        $category = Category::find($request->id);
        $category->delete();

        return response()->json('success', 200);
    }

    public function addProduct(Request $request){

        $request->validate([
            'name'=>'required|unique:products,name|max:255',
            'price'=>'required|integer|gt:0',
            'image'=>'nullable|image|mimes:jpeg,jpg,png|max:10000',
            'description'=>'required',
        ]);

        $newProduct = new Product();
        $newProduct->name = $request->name;
        $newProduct->slug = Str::slug($request->name);
        $newProduct->price = $request->price;
        
          if($request->image){
                $imageName = time().'_'. uniqid() .'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('/products'), $imageName);
                $newProduct->image = '/products/' . $imageName;
            }

        $newProduct->description = $request->description;
        $newProduct->save();

        return response()->json(['success'=>true, 'message'=>'Product added succeessfully']);
    }

    public function getProduct(){
        $products = Product::latest()->get();
        return response()->json($products);
    }

    public function getSingleProduct($id){
        $product = Product::find($id);
        return response()->json($product);
    }

    public function productUpdate(Request $request){

        $findProduct = Product::find($request->id);
        $findProduct->name = $request->name;
        $findProduct->slug = Str::slug($request->name);
        $findProduct->price = $request->price;
        $findProduct->description = $request->description;

        if($request->image){
            $imageName = time().'_'. uniqid() .'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/products'), $imageName);
            $findProduct->image = '/products/' . $imageName;
        }

        $findProduct->save();

        return response()->json(['image'=>$findProduct->image, 'message'=>'Product updated successfully']);
    }

    public function deleteProduct($id){
        $findProduct = Product::find($id);
        $findProduct->delete();
        return response()->json('success');
    }





}
