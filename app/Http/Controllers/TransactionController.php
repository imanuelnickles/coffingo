<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

use App\User;
use App\Product;
use App\Coffin;
use App\Accessories;
use App\Pattern;
use App\Color;
use App\Transaction;
use App\Detail_Transaction;
use App\Detail_Custom_Transaction;
use App\Pattern_Custom;
use App\Accessories_Detail_Custom;
use App\Accessories_Custom;
use App\Color_Custom;
use Carbon\Carbon;


class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        date_default_timezone_set('Asia/Jakarta');

    }
    public function allTransaction()
    {
        $payment=User::where('id',Auth::id())
                    ->with(['transaction'=>function($query){
                        return $query->where('status','Pending')
                                    ->where('valid_until','>=',date('Y:m:d'));   
                                    
                    }])->get();  
        $order=User::where('id',Auth::id())
                    ->with(['transaction'=>function($query){
                        return $query->where('status','Waiting for Approve');
                                     
                                    
                    }])->get();  
        $succeed=User::where('id',Auth::id())
                    ->with(['transaction'=>function($query){
                        return $query->where('status','Approved');
                                     
                                    
                    }])->get();  
        $canceled=User::where('id',Auth::id())
                    ->with(['transaction'=>function($query){
                        return $query->where('status','Pending')
                                    ->where('valid_until','<',date('Y:m:d'));
                    }])->get();  
       
        return view('user.transaction',['payment'=>$payment,'order'=>$order,'succeed'=>$succeed,'canceled'=>$canceled]);
    }

    public function checkout(Request $request,$id)
    {
    	$checkout=Product::findOrFail($id);
        $request->session()->put('checkout', $checkout->id_product);
    	return view('user.order',['checkout'=>$checkout]);
    }
    private function getPatternCustom()
    {
        $last=Pattern_Custom::orderBy('pattern_custom_id', 'desc')->first();
       
        return $last->pattern_custom_id;
    }
    private function getColorCustom()
    {
        $last=Color_Custom::orderBy('color_custom_id', 'desc')->first();
       
        return $last->color_custom_id;
    }

    public function customCheckout(Request $request)
    {
    	//$value="Bal bal";
    	//$request->session()->put('keyz', $value);
        //dd(Input::get('accessories'));
        $pattern_custom_flag=0;
        $accessories_custom_flag=0;
        $color_custom_flag=0;

        $this->validate($request, [
            'coffin' => 'required',
            'accessories' => 'required'
           
        ]);

         //Color Custom
        $color_custom=$request->file('color_custom');
        if ($color_custom == null) {

            $this->validate($request, [
                'color' => 'required',
                    
            ]);        

        }else{
            $color_custom_flag=1;
        }

        //Pattern Custom
        $pattern_custom=$request->file('pattern_custom');
        if($pattern_custom == null){

            $this->validate($request, [
                'pattern' => 'required',
                    
            ]);

        }else{
            $pattern_custom_flag=1;
        }

        //Accessories Custom
        /*$accessories_custom=$request->file('accessories_custom');
        if ($accessories_custom != null) {
              $accessories_custom_flag=1;
        

        }*/
       /* $this->validate($request, [
                'accessories' => 'required',
                    
            ]);*/

           

        //dd($pattern_custom);

        //Color Handling
        if ($color_custom_flag == 1) {
            //Handling
            $destination='public/color_custom/'.Auth::user()->id;
            $color_name=$color_custom->getClientOriginalName();
            $color_file=$color_custom->move($destination, $color_name);
            $ex =$color_custom->getClientOriginalExtension();
            Color_Custom::create([
                'color_custom_name' => str_replace(".".$ex, "", $color_name),
                'color_custom_file' => $destination.'/'.$color_name,
                'color_custom_price' => 200000
                ]);
            $color_custom_id=$this->getColorCustom();

            $color_custom_ses=Color_Custom::findOrFail($color_custom_id);

            $color=$color_ses=null;
            //dd($pattern_custom_id);
        }else{
            $c=Input::get('color');   
            $color=Color::findOrFail($c); 
            $color_ses=$color->id_color;
            $color_custom_id=0;
            $color_custom_ses=null;
        }
        
        
        //$o=Input::get('color');
        //$color=Color::findOrFail($o);


        //Pattern Handling
        if ($pattern_custom_flag == 1) {
            //Handling
            $destination='public/pattern_custom/'.Auth::user()->id;
            $pattern_name=$pattern_custom->getClientOriginalName();
            $pattern_file=$pattern_custom->move($destination, $pattern_name);
            $ex =$pattern_custom->getClientOriginalExtension();
            Pattern_Custom::create([
                'pattern_custom_name' => str_replace(".".$ex, "", $pattern_name),
                'pattern_custom_file' => $destination.'/'.$pattern_name,
                'pattern_custom_price' => 0
                ]);
            $pattern_custom_id=$this->getPatternCustom();

            $pattern_custom_ses=Pattern_Custom::findOrFail($pattern_custom_id);

            $pattern=$pattern_ses=null;
            //dd($pattern_custom_id);
        }else{
            $p=Input::get('pattern');   
            $pattern=Pattern::findOrFail($p); 
            $pattern_ses=$pattern->id_pattern;
            $pattern_custom_id=0;
            $pattern_custom_ses=null;
        }

        //Accessories Custom
        /*if($accessories_custom_flag == 1){
            //Handling for custom accessories
            $destination='public/accessories_custom/'.Auth::user()->id;
            $accessories_name=$accessories_custom->getClientOriginalName();
            $accessories_file=$accessories_custom->move($destination, $accessories_name);
            $ex =$accessories_custom->getClientOriginalExtension();
            Accessories_Custom::create([
              'accessories_custom_name'=>str_replace(".".$ex, "", $accessories_name),
              'accessories_custom_file'=> $destination.'/'.$accessories_name,
              'accessories_custom_price' => 0
                ]);
        }*/

        $c=Input::get('coffin');
        $coffin=Coffin::findOrFail($c);
        $a=Input::get('accessories'); 
        $accessories=Accessories::findOrFail($a); 
            
        
        
        

                
        //dd($accessories->count());

        /*Storing Session*/
        $request->session()->put('custom_checkout', [
            'coffin' => $coffin->id_coffin,
            'color' => $color_ses,
            'pattern' => $pattern_ses,
            'accessories' => $accessories,
            'pattern_custom' => $pattern_custom_id,
            'color_custom' => $color_custom_id
            ]);
        
        
        return view('user.custom_order',['coffin'=>$coffin,'accessories'=>$accessories,'pattern'=>$pattern,'color'=>$color,'pattern_custom'=>$pattern_custom_ses,'color_custom'=>$color_custom_ses]);
    }
    private function getTransaction()
    {
        $last=Transaction::orderBy('id_transaction', 'desc')->first();
       
        return $last->id_transaction;
    }
    private function getDetailCustomTransaction()
    {
        $last=Detail_Custom_Transaction::orderBy('id_detail_custom_transaction', 'desc')->first();
       
        return $last->id_detail_custom_transaction;
    }
    public function finalizeCheckout(Request $request)
    {

        $this->validate($request,[
                'name' => 'required|max:255',
                'address' => 'required|min:10',
                'telp' => 'required|regex:/(0)[0-9]{10}/',
        ]);
        
        $date=Transaction::whereDate('created_at',date('Y-m-d'))->count();
        
        

        if ($request->session()->has('checkout')) {
            
        $total = Product::findOrFail($request->session()->get('checkout'));

        Transaction::create([
            'id_users' => Auth::user()->id ,
            'receiver_name' => $request['name'],
            'receiver_telp' => $request['telp'],
            'receiver_address' => $request['address'],
            'total' => $total->price_product,
            'reference_code' =>'CG-'.substr(date("Y"),2).date("m").date('d').'-'.str_pad(($date+1), 3, '0', STR_PAD_LEFT),
            'valid_until' =>date('Y-m-d', strtotime("+2 days"))
        ]);
        
        Detail_Transaction::create([
            'id_transaction' => $this->getTransaction(),
            'id_product' =>  $request->session()->pull('checkout')
            ]);
        return redirect()->route('payment',['id'=>$this->getTransaction()])->with('message','Your transaction sucessfully created.');
        
        }
        else if($request->session()->has('custom_checkout'))
        {

            $pattern_custom_flag=$request->session()->get('custom_checkout.pattern_custom');
            $color_custom_flag=$request->session()->get('custom_checkout.color_custom');

            $coffin=Coffin::find($request->session()->get('custom_checkout.coffin'));

            //$color=Color::findOrFail($request->session()->get('custom_checkout.color'));
            if($color_custom_flag!=0)
            {
                $color_custom=Color_Custom::findOrFail($request->session()->get('custom_checkout.color_custom'));
                $id_color=null;
                $id_color_custom=$request->session()->pull('custom_checkout.color_custom');
                
            }else{
                $color=Color::findOrFail($request->session()->get('custom_checkout.color'));
                
                $id_color=$request->session()->pull('custom_checkout.color');
                $id_color_custom=null;

            }

            if($pattern_custom_flag!=0)
            {
                $pattern_custom=Pattern_Custom::findOrFail($request->session()->get('custom_checkout.pattern_custom'));
                $id_pattern=null;
                $id_pattern_custom=$request->session()->pull('custom_checkout.pattern_custom');
                
            }else{
                $pattern=Pattern::findOrFail($request->session()->get('custom_checkout.pattern'));
                
                $id_pattern=$request->session()->pull('custom_checkout.pattern');
                $id_pattern_custom=null;
            }
            
            $acc=$request->session()->pull('custom_checkout.accessories');
            $acc_price_total=0;
            //$accessories=Accessories::findOrFail($acc->id_accessories);
            for ($i=0; $i < $acc->count(); $i++) { 
                $acc_price_total+=$acc[$i]->price_accessories;
            }
            /*dd($acc);
            dd($acc_price_total);*/
            if($pattern_custom_flag!=0 && $color_custom_flag == 0)
            {
            $total=$coffin->price_coffin + $color->price_color + $pattern_custom->pattern_custom_price + $acc_price_total;
            }else if($pattern_custom_flag==0 && $color_custom_flag != 0){
           
            $total=$coffin->price_coffin + $color_custom->color_custom_price + $pattern->price_pattern + $acc_price_total;
            
            }else if($pattern_custom_flag!=0 && $color_custom_flag != 0){
                $total=$coffin->price_coffin + $color_custom->color_custom_price + $pattern_custom->pattern_custom_price + $acc_price_total;
            }else{
             $total=$coffin->price_coffin + $color->price_color + $pattern->price_pattern + $acc_price_total ;   
            }

        Transaction::create([
            'id_users' => Auth::user()->id ,
            'receiver_name' => $request['name'],
            'receiver_telp' => $request['telp'],
            'receiver_address' => $request['address'],
            'total' => $total,
            'reference_code' =>'CGC-'.substr(date("Y"),2).date("m").date('d').'-'.str_pad(($date+1), 3, '0', STR_PAD_LEFT),
            'valid_until' =>date('Y-m-d', strtotime("+2 days"))
        ]);
        //
        Detail_Custom_Transaction::create([
            'id_transaction' => $this->getTransaction(),
            'id_coffin' =>  $request->session()->pull('custom_checkout.coffin'),
            'id_color' => $id_color,
            'id_pattern' => $id_pattern,
            /*'id_accessories' => ,*/
            'id_pattern_custom' => $id_pattern_custom,
            'id_color_custom' =>$id_color_custom
            ]);
        $id_detail_custom_transaction=$this->getDetailCustomTransaction();
        for ($i=0; $i < $acc->count(); $i++) { 
           Accessories_Detail_Custom::create([
            'id_detail_custom_transaction' => $id_detail_custom_transaction,
            'id_accessories' => $acc[$i]->id_accessories
            ]);
        }
        /*Accessories_Detail_Custom::create([
            'id_detail_custom_transaction' =>
            ]);*/
        
        return redirect()->route('payment',['id'=>$this->getTransaction()])->with('message','Your transaction sucessfully created.');
        }
        
        
    }
    public function payment($id)
    {
        $transaction=Transaction::where('id_transaction',$id)->with('detail_transaction','detail_custom_transaction')->first();
        
        if($transaction->detail_transaction !== null)
        {

            return view('user.item',['transaction' => $transaction]);
        }
        else
        {
            // /dd($transaction->detail_custom_transaction->coffin);
            $id1=$transaction->detail_custom_transaction->id_detail_custom_transaction;

            $accessories_detail_custom=Accessories_Detail_Custom::select('id_accessories')->where('id_detail_custom_transaction',$id1)->get();
            $a=array();
            for ($i=0; $i < $accessories_detail_custom->count() ; $i++) { 
                array_push($a,$accessories_detail_custom[$i]->id_accessories);
            }
            
            /*$acca=$accessories_detail_custom->array_collapse();*/
            $acc=Accessories::findOrFail($a);
                
            
            if($transaction->detail_custom_transaction->id_pattern === null && $transaction->detail_custom_transaction->id_color !== null){
                
               return view('user.item_custom',['transaction' => $transaction,'pattern_custom' => 1,'color_custom'=>0,'accessories'=>$acc]);
            }else if($transaction->detail_custom_transaction->id_pattern !== null && $transaction->detail_custom_transaction->id_color === null){
                
                return view('user.item_custom',['transaction' => $transaction,'pattern_custom' => 0,'color_custom'=>1,'accessories'=>$acc]);
            }else if($transaction->detail_custom_transaction->id_pattern === null && $transaction->detail_custom_transaction->id_color === null){
                
                return view('user.item_custom',['transaction' => $transaction,'pattern_custom' => 1,'color_custom'=>1,'accessories'=>$acc]);
            }
            
            return view('user.item_custom',['transaction' => $transaction,'pattern_custom' => 0,'color_custom'=>0,'accessories'=>$acc]);
        }       
        
        
    }
    public function confirmation(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|image'
        ]);
        
        $destination='public/payment/'.Auth::user()->id;
        
        $name = $request->file('image')->getClientOriginalName();
        $upload=$request->file('image')->move($destination, $name);

        $transaction=Transaction::findOrFail($request->get('transaction_id'));
        $transaction->payment_image=$destination.'/'.$name;
        $transaction->status="Waiting for Approve";
        $transaction->updated_at= Carbon::now('Asia/Jakarta');
        $transaction->save();
        return redirect()->back()->with('message','Proof of Payment Successfully Uploaded');
    }

}
