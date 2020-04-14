<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::paginate(5);
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat=new Category();
        $cat->name=$request->input('name');
        $cat->description=$request->input('description');
        $filenamewithextention=$request->file('image')->getClientOriginalName();
        $filename=pathinfo($filenamewithextention,PATHINFO_FILENAME);
        $extention=$request->file('image')->getClientOriginalExtension();
        $file=$filename.'_'.time().'.'.$extention;
        $request->file('image')->move(public_path("images"),$file);
        $cat->image=$file;
        $cat->save();
        return back()->with('message','Category Created');
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
        $edit_category=Category::findOrFail($id);
        return view('category.edit',compact('edit_category'));
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
        $update_category=Category::findOrFail($id);
        $update_category->name=$request->input('name');
        $update_category->description=$request->input('description');
        if($request->file('image')){
                $filenamewithextention=$request->file('image')->getClientOriginalName();
                $filename=pathinfo($filenamewithextention,PATHINFO_FILENAME);
                $extention=$request->file('image')->getClientOriginalExtension();
                $file=$filename.'_'.time().'.'.$extention;
                $request->file('image')->move(public_path("images"),$file);
                $update_category->image=$file;
            }
        $update_category->save();
        $categories=Category::all();
        return redirect()->route('index_category')->with(['categories'=>$categories,'message'=>'Category Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Category::findOrFail($id);
        $delete->delete();
        $delete_products=Product::where('category_id',$id)->get();
        $delete_products->delete();
        return back()->with('message','Delete Success!');
    }
}
