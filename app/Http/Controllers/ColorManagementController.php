<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Color;

class ColorManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $color=Color::paginate(10);
        return view('admin.color',['color'=>$color]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.color.color_new');
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
            'image' => 'required|image|dimensions:width=300,height=200'
        ]);
        $destination='public/image/color/';
        
        $name = $request->file('image')->getClientOriginalName();
        $upload=$request->file('image')->move($destination, $name);
        Color::create([
            'name_color' => Input::get('name'),
            'price_color' =>  Input::get('price'),
            'picture_color' => $destination.$name
            ]);
        return redirect()->route('color');
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
        $color=Color::find($id);
        return view('admin.color.color_edit',['color'=>$color]);
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
        $color=Color::find($id);

        if($request->file('image'))
        {
             $this->validate($request,[
            'name' => 'required|max:20',
            'price' => 'required',
            'image' => 'required|image|dimensions:width=300,height=200'
            ]);

            $destination='public/image/color/';
        
            $name = $request->file('image')->getClientOriginalName();
            $upload=$request->file('image')->move($destination, $name);

            $color->name_color=Input::get('name');
            $color->price_color=Input::get('price');
            $color->picture_color=$destination.$name;
        }
        else
        {
           $this->validate($request,[
            'name' => 'required|max:20',
            'price' => 'required',
            
             ]);
            $color->name_color=Input::get('name');
            $color->price_color=Input::get('price');
        }
        
        $color->save();

        return redirect()->route('color');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color=Color::findOrFail($id);
        $color->delete();
        return redirect()->route('color');
    }
}
