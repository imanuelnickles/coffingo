<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Accessories;

class AccessoriesManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accessories=Accessories::paginate(10);
        return view('admin.accessories',['accessories'=> $accessories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.accessories.accessories_new');
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
        $destination='public/image/accessories/';
        
        $name = $request->file('image')->getClientOriginalName();
        $upload=$request->file('image')->move($destination, $name);
        Accessories::create([
            'name_accessories' => Input::get('name'),
            'price_accessories' =>  Input::get('price'),
            'picture_accessories' => $destination.$name
            ]);
        return redirect()->route('accessories');
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
        $accessories=Accessories::find($id);
        return view('admin.accessories.accessories_edit',['accessories'=>$accessories]);
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
        $accessories=Accessories::find($id);

        if($request->file('image'))
        {
             $this->validate($request,[
            'name' => 'required|max:20',
            'price' => 'required',
            'image' => 'required|image|dimensions:width=300,height=200'
            ]);

            $destination='public/image/accessories/';
        
            $name = $request->file('image')->getClientOriginalName();
            $upload=$request->file('image')->move($destination, $name);

            $accessories->name_accessories=Input::get('name');
            $accessories->price_accessories=Input::get('price');
            $accessories->picture_accessories=$destination.$name;
        }
        else
        {
           $this->validate($request,[
            'name' => 'required|max:20',
            'price' => 'required',
            
             ]);
            $accessories->name_accessories=Input::get('name');
            $accessories->price_accessories=Input::get('price');
        }
        
        $accessories->save();

        return redirect()->route('accessories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accessories=Accessories::findOrFail($id);
        $accessories->delete();
        return redirect()->route('accessories');
    }
}
