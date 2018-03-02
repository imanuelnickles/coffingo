<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Transaction;
use App\Detail_Transaction;
use App\Accessories_Detail_Custom;
use App\Accessories;
use App\Pattern_Custom;
use Carbon\Carbon;

class TransactionManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTransactions()
    {
        date_default_timezone_set('Asia/Jakarta');

        $canceled=Transaction::where('status','Pending')->where('valid_until','<',date('Y:m:d'))->get();
        $waiting=Transaction::where('status','Waiting for Approve')->get();
        $approved=Transaction::where('status','Approved')->get();
        return view('admin.all_transaction',['canceled'=>$canceled,'waiting'=>$waiting,'approved'=>$approved]);
    }

    public function index()
    {
        $transaction=Transaction::where('status','Waiting for Approve')->with('user')->paginate(5);
        //dd($transaction);
        return view('admin.payment_confirmation',['transaction'=>$transaction]);
    }
    public function approve($id)
    {
        $transaction=Transaction::find($id);
        $transaction->status="Approved";
        $transaction->updated_at=Carbon::now('Asia/Jakarta');
        $transaction->save();
        return redirect()->back();
    }
    public function decline($id)
    {
        $transaction=Transaction::find($id);
        $transaction->status="Pending";
        $transaction->payment_image=NULL;
        $transaction->save();
        return redirect()->back();
    }
    public function order_detail($id){
    //Handling
    $transaction=Transaction::where('id_transaction',$id)->with('detail_transaction','detail_custom_transaction')->first();
        
        if($transaction->detail_transaction !== null)
        {
            //dd("SINGLE");
            return view('admin.order_detail',['transaction' => $transaction]);
        }
        else
        {
            //dd("CUSTOM");
            //dd($transaction->detail_custom_transaction->coffin);
            //dd($transaction->detail_custom_transaction);
            $id1=$transaction->detail_custom_transaction->id_detail_custom_transaction;

            $accessories_detail_custom=Accessories_Detail_Custom::select('id_accessories')->where('id_detail_custom_transaction',$id1)->get();
            $a=array();
            for ($i=0; $i < $accessories_detail_custom->count() ; $i++) { 
                array_push($a,$accessories_detail_custom[$i]->id_accessories);
            }
            
            /*$acca=$accessories_detail_custom->array_collapse();*/
            $acc=Accessories::findOrFail($a);
                
            
            if($transaction->detail_custom_transaction->id_pattern === null && $transaction->detail_custom_transaction->id_color !== null){
               return view('admin.order_detail_custom',['transaction' => $transaction,'pattern_custom' => 1,'color_custom'=>0,'accessories'=>$acc]);
            }else if($transaction->detail_custom_transaction->id_pattern !== null && $transaction->detail_custom_transaction->id_color === null){
                return view('admin.order_detail_custom',['transaction' => $transaction,'pattern_custom' => 0,'color_custom'=>1,'accessories'=>$acc]);
            }else if($transaction->detail_custom_transaction->id_pattern === null && $transaction->detail_custom_transaction->id_color === null){
                return view('admin.order_detail_custom',['transaction' => $transaction,'pattern_custom' => 1,'color_custom'=>1,'accessories'=>$acc]);
            }
            
            //return view('user.item_custom',['transaction' => $transaction,'pattern_custom' => 0,'color_custom'=>0,'accessories'=>$acc]);
        }       
        







    }

    public function update_pattern_price(Request $request){
        $custom_pattern_id=Input::get('custom_pattern_id');
        $transaction_id=Input::get('transaction_id');
        $t=Transaction::findOrFail($transaction_id);

        

        //Pattern Price
        $new_pattern_price=Input::get('new_price');
        $p=Pattern_Custom::findOrFail($custom_pattern_id);
        $old_pattern_price=$p->pattern_custom_price;

        $p->pattern_custom_price=$new_pattern_price;
        $p->save();

        //Transaction Price
        $t->total=$t->total - $old_pattern_price + $new_pattern_price; 
        $t->save();
        return redirect()->back();
        //dd($p->pattern_custom_price);
        
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
    public function update(Request $request, $id)
    {
        //
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
