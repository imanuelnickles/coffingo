@extends('user.checkout')


@section('order')
<div class="row-fluid" style="padding-bottom:2%">
   <div class="s12 col-md" style="border-bottom: 1px solid #eee;font-size:24px;padding-bottom:1%">Order Summary</div>
</div>
<div class="row">

                      <div class="col-md-3" >
                          
                           <img src="../{{$coffin->picture_coffin}}" class="img-responsive img-thumbnail">
                        
                      </div>
                      
                          
                          
                      <div class="col-md-4" style="padding-top:2%">
                        
                      <blockquote>
                         <div class="row-fluid">
                        <h5>{{$coffin->name_coffin}}</h5>
                        <h5><strong>IDR </strong>{{$coffin->price_coffin}}</h5>
                        </div>
                      </blockquote>
                       
                        

                      </div>
</div>
<div class="row">

                      <div class="col-md-3" >
                          
                           @if($color!=null)
                           <img src="../{{$color->picture_color}}" class="img-responsive img-thumbnail">
                          @else
                           <img src="../{{$color_custom->color_custom_file}}" class="img-responsive img-thumbnail">
                            

                          @endif 
                        
                      
                      </div>
                      
                          
                          
                      <div class="col-md-4" style="padding-top:2%">
                        
                      <blockquote>
                         <div class="row-fluid">
                        @if($color!=null)
                        <h5>{{$color->name_color}}</h5>
                        <h5><strong>IDR </strong>{{$color->price_color}}</h5>
                        @else
                        <h5>{{$color_custom->color_custom_name}}</h5>
                        <h5>
                        <strong>IDR </strong>{{$color_custom->color_custom_price}}
                            
                        </h5>
                        @endif
                        </div>
                      </blockquote>
                       
                        

                      </div>
</div>
<div class="row">

                      <div class="col-md-3" >
                          @if($pattern!=null)
                           <img src="../{{$pattern->picture_pattern}}" class="img-responsive img-thumbnail">
                          @else
                           <img src="../{{$pattern_custom->pattern_custom_file}}" class="img-responsive img-thumbnail">
                            

                          @endif 
                      
                      </div>
                      
                          
                          
                      <div class="col-md-4" style="padding-top:2%">
                        
                      <blockquote>
                         <div class="row-fluid">
                         @if($pattern!=null)
                        <h5>{{$pattern->name_pattern}}</h5>
                        <h5><strong>IDR </strong>{{$pattern->price_pattern}}</h5>
                        @else
                        <h5>{{$pattern_custom->pattern_custom_name}}</h5>
                        <h5>
                        <strong>IDR </strong>{{$pattern_custom->pattern_custom_price}}
                            @if($pattern_custom->pattern_custom_price == 0)
                              <span>(Ask for price)</span>
                            @endif
                        </h5>
                        @endif
                        </div>
                      </blockquote>
                       
                        

                      </div>
</div>
@foreach($accessories as $acc)
<div class="row">
                      
                      <div class="col-md-3" >
                          
                           <img src="../{{$acc->picture_accessories}}" class="img-responsive img-thumbnail">
                          
                      
                      </div>
                      
                          
                          
                      <div class="col-md-4" style="padding-top:2%">
                        
                      <blockquote>
                         <div class="row-fluid">
                         
                        <h5>{{$acc->name_accessories}}</h5>
                        <h5><strong>IDR </strong>{{$acc->price_accessories}}</h5>
                        
                        </div>
                      </blockquote>
                       
                        

                      </div>
                      
</div>
@endforeach
@endsection