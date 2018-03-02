@extends('admin.dashboard')

@section('content')
<section class="content-header">
      <h1>
        Payment Confirmation
        <!-- <small>Optional description</small> -->
      </h1>
      
    </section>

   
    <section class="content">
    
    	<div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Reference Code</th>
        <th>Customer Name</th>
        <th>Payment Date</th>
        <th>Total</th>
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>
    <?php

    	$count=0;
    	if(empty($_GET['page']))
    	{
    		$count=1;
    	}
    	else
    	{
    		if($_GET['page']==1)
    		{
    			$count=1;
    		}else{
    			$count=($_GET['page']-1)*5+1;
    		}
    	}
    		
    		
    	
    ?>
    @foreach($transaction as $transactions)
      <tr>
        <td>{{ $count++}}</td>
        <td>{{$transactions->reference_code}}</td>
        <td>{{$transactions->user->name}}</td>
        <td>{{$transactions->updated_at->todatestring()}}</td>
        <td><strong>IDR</strong> {{$transactions->total}}</td>
        <td>
        <a href="../../{{$transactions->payment_image}}"><button type="button" class="btn btn-default btn-xs  "><span class="glyphicon glyphicon-eye-open"></span> Payment Image</button>
        <a href="#"><button type="button" data-toggle="modal" data-target="#payment_approve_{{$transactions->id_transaction}}"class="btn btn-primary btn-xs  ">Approve</button></a>
        <a href="#"><button type="button" data-toggle="modal" data-target="#payment_decline_{{$transactions->id_transaction}}" class="btn btn-danger btn-xs  ">Decline</button></a>
        <a href="{{route('order_detail',['id'=>$transactions->id_transaction])}}"><button type="button"  class="btn btn-success btn-xs  ">Order Detail</button></a>
        </td>
        
      </tr>
     
    @endforeach
      
    </tbody>
  </table>
  </div>
   {{$transaction->links()}}
     
      <!-- Your Page Content Here -->

    </section>

    @foreach($transaction as $transactions)
        <div id="payment_approve_{{$transactions->id_transaction}}" class="modal fade" role="dialog" >
          <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                
                <h4 class="modal-title">Delete Confirmation</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure want to approve this payment?</p>
              </div>
              <div class="modal-footer">
                <a href="{{route('approve_payment',['id'=>$transactions->id_transaction])}}"><button type="button" class="btn btn-success" >Yes</button></a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
              </div>
            </div>

          </div>
        </div>

        <div id="payment_decline_{{$transactions->id_transaction}}" class="modal fade" role="dialog" >
          <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                
                <h4 class="modal-title">Decline Confirmation</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure want to decline this payment?</p>
              </div>
              <div class="modal-footer">
                <a href="{{route('decline_payment',['id'=>$transactions->id_transaction])}}"><button type="button" class="btn btn-success" >Yes</button></a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
              </div>
            </div>

          </div>
        </div>
    @endforeach
@endsection