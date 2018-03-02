<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Pattern;

class PatternManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pattern=Pattern::paginate(10);
        return view('admin.pattern',['pattern'=>$pattern]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pattern.pattern_new');
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
        $destination='public/image/pattern/';
        
        $name = $request->file('image')->getClientOriginalName();
        $upload=$request->file('image')->move($destination, $name);
        Pattern::create([
            'name_pattern' => Input::get('name'),
            'price_pattern' =>  Input::get('price'),
            'picture_pattern' => $destination.$name
            ]);
        return redirect()->route('pattern');
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
        $pattern=Pattern::find($id);
        return view('admin.pattern.pattern_edit',['pattern'=>$pattern]);
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
        $pattern=Pattern::find($id);

        if($request->file('image'))
        {
             $this->validate($request,[
            'name' => 'required|max:20',
            'price' => 'required',
            'image' => 'required|image|dimensions:width=300,height=200'
            ]);

            $destination='public/image/pattern/';
        
            $name = $request->file('image')->getClientOriginalName();
            $upload=$request->file('image')->move($destination, $name);

            $pattern->name_pattern=Input::get('name');
            $pattern->price_pattern=Input::get('price');
            $pattern->picture_pattern=$destination.$name;
        }
        else
        {
           $this->validate($request,[
            'name' => 'required|max:20',
            'price' => 'required',
            
             ]);
            $pattern->name_pattern=Input::get('name');
            $pattern->price_pattern=Input::get('price');
        }
        
        $pattern->save();

        return redirect()->route('pattern');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pattern=Pattern::findOrFail($id);
        $pattern->delete();
        return redirect()->route('pattern');
    }
}
