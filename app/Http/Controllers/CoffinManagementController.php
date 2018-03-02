<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Coffin;

class CoffinManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coffin=Coffin::paginate(10);
        return view('admin.coffin',['coffin'=>$coffin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coffin.coffin_new');
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
        $destination='public/image/coffin/';
        
        $name = $request->file('image')->getClientOriginalName();
        $upload=$request->file('image')->move($destination, $name);
        Coffin::create([
            'name_coffin' => Input::get('name'),
            'price_coffin' =>  Input::get('price'),
            'picture_coffin' => $destination.$name
            ]);
        return redirect()->route('coffin');
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
        $coffin=Coffin::find($id);
        return view('admin.coffin.coffin_edit',['coffin'=>$coffin]);
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
        $coffin=Coffin::find($id);

        if($request->file('image'))
        {
             $this->validate($request,[
            'name' => 'required|max:20',
            'price' => 'required',
            'image' => 'required|image|dimensions:width=300,height=200'
            ]);

            $destination='public/image/coffin/';
        
            $name = $request->file('image')->getClientOriginalName();
            $upload=$request->file('image')->move($destination, $name);

            $coffin->name_coffin=Input::get('name');
            $coffin->price_coffin=Input::get('price');
            $coffin->picture_coffin=$destination.$name;
        }
        else
        {
           $this->validate($request,[
            'name' => 'required|max:20',
            'price' => 'required',
            
             ]);
            $coffin->name_coffin=Input::get('name');
            $coffin->price_coffin=Input::get('price');
        }
        
        $coffin->save();

        return redirect()->route('coffin');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coffin=Coffin::findOrFail($id);
        $coffin->delete();
        return redirect()->route('coffin');
    }
}
