@extends('user.checkout')

@section('order')
<div class="row">
                      <div class="col-md-4">
                        <img src="../{{$checkout->picture_product}}" class="img-responsive img-thumbnail">
                      </div>
                      <div class="col-md-4">
                        <div class="page-header">
                      <h3>Order Summary</h3>
                    </div>
                      <blockquote>
                         <div class="row-fluid">
                        <h5>{{$checkout->name_product}}</h5>
                        <h5><strong>IDR </strong>{{$checkout->price_product}}</h5>
                        </div>
                      </blockquote>
                       
                        

                      </div>
</div>
@endsection