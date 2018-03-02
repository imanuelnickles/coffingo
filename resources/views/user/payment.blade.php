@extends('layouts.app')

@section('content')

           
        

<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(session()->has('message'))
                <div class="alert alert-success fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session()->get('message') }}
                </div>
            @endif   

            <div class="panel panel-default">
                <div class="panel-heading">Payment</div>

                <div class="panel-body">
                <div class="row-fluid" style="padding-bottom:2%">
                     <div class="s12 col-md" style="border-bottom: 1px solid #eee;font-size:24px;padding-bottom:1%">Order Detail</div>
                </div>

                @yield('items')


                <div class="row-fluid" style="padding-bottom:2%">
                     <div class="s12 col-md" style="border-bottom: 1px solid #eee;font-size:24px;padding-bottom:1%">Shipment Detail</div>
                </div>
                    <table class="table-condensed">
                    <tr>
                        <td>Receiver Name</td>
                        <td>:</td>
                        <td>{{$transaction->receiver_name}}</td>
                    </tr>
                    <tr>
                        <td>Receiver Telp</td>
                        <td>:</td>
                        <td>{{$transaction->receiver_telp}}</td>
                    </tr>
                    <tr>
                        <td>Receiver Address</td>
                        <td>:</td>
                        <td>{{$transaction->receiver_address}}</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>:</td>
                        <td></strong>IDR <strong>{{$transaction->total}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                            @if($transaction->status === "Pending")
                                <span class="label label-danger">{{$transaction->status}}</span> 
                            @elseif($transaction->status === "Approved")
                                <span class="label label-success">{{$transaction->status}}</span> 
                            @else
                                <span class="label label-warning">{{$transaction->status}}</span> 
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Reference Code</td>
                        <td>:</td>
                        <td><strong>{{$transaction->reference_code}}</strong></td>
                    </tr>
                </table>
                <div class="row-fluid" style="padding-bottom:2%">
                     <div class="s12 col-md" style="border-bottom: 1px solid #eee;font-size:24px;padding-bottom:1%">Payment Information</div>
                </div>
                    <table class="table-condensed">
                        <tr>
                            <th>Bank Name</th>
                            <th>Account Number</th>
                            <th>Account Username</th>
                        </tr>
                        <tr>
                            <td>BCA</td>
                            <td>5120909098</td>
                            <td>Alvin Sitompul</td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <em>Note : Please write the reference code (<strong>{{$transaction->reference_code}}</strong>) in remark.</em>
                            </td>
                        </tr>
                    </table>
                    
                <div class="row-fluid" style="padding-bottom:2%">
                     <div class="s12 col-md" style="border-bottom: 1px solid #eee;font-size:24px;padding-bottom:1%">Payment Confirmation</div>
                </div>

                    @if($transaction->payment_image === NULL || $transaction->payment_image === '' )
                    <form class="form-horizontal" id="payment_form" role="form" enctype="multipart/form-data" method="POST" action="{{ route('payment_confirm') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="transaction_id" value="{{$transaction->id_transaction}}">
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="col-md-4 control-label">Proof of Payment</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control" name="image" >

                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-md-8 col-md-offset-4 ">
                                <button type="button" data-toggle="modal" data-target="#payment_modal" class="btn btn-sm coffin-btn">
                                    Confirm
                                </button>

                                
                            </div>
                        </div>
                        
                    </form>
                   
                    @else

                            <div class="col-md-2">
                                <image class="img-responsive img-thumbnail" src="../{{$transaction->payment_image}}">
                            </div>
                        @if($transaction->status === "Approved")
                            <div  class="col-md-6">Your payment has been approved. Thank you. </div>
                        @elseif($transaction->status === "Waiting for Approve")
                            <div  class="col-md-6">Your payment is being check. Thank you. </div>
                        @endif
                        
                    @endif
                    
                   
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="payment_modal" class="modal fade" role="dialog" style="margin-top:15%;">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Payment Confirmation</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure want to confirm your proof of payment?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" 
        onclick="event.preventDefault();document.getElementById('payment_form').submit();">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>
@endsection
