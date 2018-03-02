@extends('layouts.app')

@section('content')

           
        

<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Checkout</div>

                <div class="panel-body">
                        @yield('order')
                    <div class="page-header">
                      <h3>Shipment Information</h3>
                    </div>
                    <form class="form-horizontal" id="checkout_form" role="form" method="POST" action="{{ route('checkout_final') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('product')=="" ? Auth::user()->name : old('product') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telp') ? ' has-error' : '' }}">
                            <label for="qty" class="col-md-4 control-label">Telp</label>

                            <div class="col-md-6">
                                <input id="telp" type="tel" class="form-control" name="telp" value="{{ old('telp')=="" ? Auth::user()->telp : old('telp') }}" required> 

                                @if ($errors->has('telp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="qty" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <textarea id="address" type="text" class="form-control" name="address" value="">{{ old('address')=="" ? Auth::user()->address : old('address') }} </textarea>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="button" data-toggle="modal" data-target="#checkout_modal" class="btn coffin-btn">
                                    Submit
                                </button>

                                
                            </div>
                        </div>

                       

                        
                    </form>
                   
                    </div>
                  
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="checkout_modal" class="modal fade" role="dialog" style="margin-top:15%;">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Checkout Confirmation</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure want to checkout your order?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" 
        onclick="event.preventDefault();document.getElementById('checkout_form').submit();">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>
@endsection
