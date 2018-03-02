<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Slider;

class SliderManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider=Slider::with('user')->paginate(5);
        return view('admin.slider',['slider'=>$slider]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.slider_new');
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
           
            'image' => 'required|image|dimensions:width=1140,height=350'
        ]);
        $destination='public/image/slider/';
        
        $name = $request->file('image')->getClientOriginalName();
        $upload=$request->file('image')->move($destination, $name);
        Slider::create([
            'id_users' => Auth::id(),
            'name_slider' => Input::get('name'),            
            'picture_slider' => $destination.$name
            ]);
        return redirect()->route('slider');
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
        $slider=Slider::find($id);
        return view('admin.slider.slider_edit',['slider'=>$slider]);
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
        $slider=Slider::find($id);

        if($request->file('image'))
        {
            $this->validate($request,[
            'name' => 'required|max:20',
            'image' => 'required|image|dimensions:width=1140,height=350'
            ]);

            $destination='public/image/slider/';
        
            $name = $request->file('image')->getClientOriginalName();
            $upload=$request->file('image')->move($destination, $name);

            $slider->name_slider=Input::get('name');
            $slider->picture_slider=$destination.$name;
        }
        else
        {
            $this->validate($request,[
            'name' => 'required|max:20',
            
            ]);
            $slider->name_slider=Input::get('name');
        }
        
      
        $slider->save();

        return redirect()->route('slider');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $slider=Slider::findOrFail($id);
        $slider->delete();
        return redirect()->route('slider');
    }

}
