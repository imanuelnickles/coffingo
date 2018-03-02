<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

use App\Product;
use App\Slider;

class HomeController extends Controller
{


    public function index()
    {
        $product=Product::paginate(12);
        $slider=Slider::all();
        
        if(Auth::check()){ 
        //Role Checking
            if(Auth::user()->role != 2)
            {
                return redirect()->route('dashboard');
            }
            else
            {
                return view('home',['product'=>$product,'slider'=> $slider]);
            }
        }
        else
        {
            return view('home',['product'=>$product,'slider'=> $slider]);
        }
            
    }
}
