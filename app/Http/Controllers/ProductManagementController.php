<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Product;

class ProductManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::paginate(10);
        return view('admin.product',['product'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.product_new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:20',
            'price' => 'required',
            'image' => 'required|image|dimensions:width=500,height=500'
        ]);
        $destination='public/image/product/';
        
        $name = $request->file('image')->getClientOriginalName();
        $upload=$request->file('image')->move($destination, $name);

        Product::create([
            'name_product' => Input::get('name'),
            'price_product' =>  Input::get('price'),
            'picture_product' => $destination.$name
            ]);
        return redirect()->route('product');
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
        $product=Product::find($id);
        return view('admin.product.product_edit',['product'=>$product]);
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
        $product=Product::find($id);

        if($request->file('image'))
        {
             $this->validate($request,[
            'name' => 'required|max:20',
            'price' => 'required',
            'image' => 'required|image|dimensions:width=500,height=500'
            ]);

            $destination='image/product/';
        
            $name = $request->file('image')->getClientOriginalName();
            $upload=$request->file('image')->move($destination, $name);

            $product->name_product=Input::get('name');
            $product->price_product=Input::get('price');
            $product->picture_product=$destination.$name;
        }
        else
        {
           $this->validate($request,[
            'name' => 'required|max:20',
            'price' => 'required',
            
             ]);
            $product->name_product=Input::get('name');
            $product->price_product=Input::get('price');
        }
        
        $product->save();

        return redirect()->route('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product');
    }
}
