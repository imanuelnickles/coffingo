@extends('user.payment')

@section('items')
<div class="row">
                      <div class="col-md-4">
                        <img src="../{{$transaction->detail_transaction->product->picture_product}}" class="img-responsive img-thumbnail">
                      </div>
                      <div class="col-md-4">
                        <blockquote>
                         <div class="row-fluid">
                        <h5>{{$transaction->detail_transaction->product->name_product}}</h5>
                        <h5><strong>IDR </strong>{{$transaction->detail_transaction->product->price_product}}</h5>
                        </div>
                      </blockquote>
                      
                    </div>
                      
                       
                        

                      </div>

@endsection