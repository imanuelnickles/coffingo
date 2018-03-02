@extends('layouts.app')

@section('content')
             
<div class="container">          
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <!-- <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                  <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol> -->

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                  <!-- <div class="item active">
                    <img src="image/download2.jpg"  style="width:100%" alt="Chania" width="460" height="345">
                  </div>

                  <div class="item">
                    <img src="image/download4.jpg"   style="width:100%" alt="Chania"  width="460" height="345" >
                  </div>
                
                  <div class="item">
                    <img src="image/download3.jpg"   style="width:100%" alt="Flower"  width="460" height="345">
                  </div>

                  <div class="item">
                    <img src="image/download5.jpg"    style="width:100%" alt="Flower"  width="460" height="345" >
                  </div> -->
                  <div class="item active">
                      <img src="{{$slider[0]->picture_slider}}"    style="width:100%" alt="Flower"  width="460" height="345" >
                   </div>
                  @for($i = 1; $i < count($slider); $i++)
                    <div class="item ">
                      <img src="{{$slider[$i]->picture_slider}}"    style="width:100%" alt="Flower"  width="460" height="345" >
                    </div>
                  @endfor
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
        <div class="container">
            
                <div class="page-header">
                  <h3>Products</h3>
                </div>
            
            <div class="row">
            @foreach($product as $products)
              <div class="col-xs-6 col-md-3" style="margin-bottom:2%;text-align:center">
                <a href="checkout/{{$products->id_product}}" class="thumbnail">
                  <img class="img-responsive" src="{{$products->picture_product}}" alt="zzz">
                </a>
                <span style="font-size:16px;font-weight:400;">{{$products->name_product}}</span><br>
                <span><strong>IDR</strong> {{$products->price_product}}</span><br>
                <span>
                  <a href="checkout/{{$products->id_product}}">
                    <button type="button" class="btn coffin-btn">Buy</button>
                  </a>
                </span>
              </div>
             @endforeach
            </div>
            <div class="row-fluid">
              <div class="text-center" style="margin-bottom:2%;">
              {{ $product->links() }}   
              </div>
            </div>
        </div>
     
@endsection
