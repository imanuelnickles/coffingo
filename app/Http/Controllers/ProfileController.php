<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user=User::find(Auth::id());
        $this->validate($request, [
            'name' => 'required|min:3|max:255',
            'address' => 'required|min:10'
            
        ]);
        if(Input::get('password')==null && Input::get('password_confirmation')==null)
        {
            
            
            
            //Update without Password
            $user->name=Input::get('name');
            $user->address=Input::get('address');
            $user->save();
            return redirect()->back()->with('message', 'Profile Successfully Updated !');
        }else{
            $this->validate($request, [
            
            'password' => 'required|min:6|confirmed'
            ]);

             //Update with Password 
            $user->name=Input::get('name');
            $user->address=Input::get('address');
            $user->password=Hash::make(Input::get('password'));
            $user->save();
            return redirect()->back()->with('message', 'Profile Successfully Updated !');
           
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
