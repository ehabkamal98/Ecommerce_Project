<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $products=Product::where('category_id',$id)->paginate(5);
        $name_category=Category::find($id);
        return view('product.index',['products'=>$products],['name_category'=>$name_category]);
    }
    public function userview($cat_id)
    {
        $products=Product::where('category_id',$cat_id)->paginate(3);
        $category=Category::find($cat_id);
        return view('product.user',['products'=>$products],['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product= new Product();
        $product->name=$request->input('name');
        $product->category_id=$request->input('category');
        $product->price=$request->input('price');
        $product->quantity=$request->input('quantity');
        $product->description=$request->input('description');
        $filenamewithextention=$request->file('image')->getClientOriginalName();
        $filename=pathinfo($filenamewithextention,PATHINFO_FILENAME);
        $extention=$request->file('image')->getClientOriginalExtension();
        $file=$filename.'_'.time().'.'.$extention;
        $request->file('image')->move(public_path("images/".$request->input('category')."/"),$file);
        $product->image=$file;
        $product->save();
        return back()->with('message','Product Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::all();
        $edit_product=Product::findOrFail($id);
        return view('product.edit',['edit_product'=>$edit_product],['categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update_product=Product::findOrfail($id);
        $update_product->name=$request->input('name');
        $update_product->category_id=$request->input('category');
        $update_product->price=$request->input('price');
        $update_product->quantity=$request->input('quantity');
        $update_product->description=$request->input('description');
        if($request->file('image')) {
            $filenamewithextention=$request->file('image')->getClientOriginalName();
            $filename=pathinfo($filenamewithextention,PATHINFO_FILENAME);
            $extention=$request->file('image')->getClientOriginalExtension();
            $file=$filename.'_'.time().'.'.$extention;
            $request->file('image')->move(public_path("images/".$request->input('category')."/"),$file);
            $update_product->image=$file;
        }
        $update_product->save();
        $products=Product::all();
        return back()->with('message','Updated Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Product::findOrFail($id);
        $delete->delete();
        return back()->with('message','Delete Success!');
    }

}
