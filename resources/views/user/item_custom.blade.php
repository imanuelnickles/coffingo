@extends('user.payment')


@section('items')
 <div class="row">

                      <div class="col-md-3" >
                          
                           <img src="../{{$transaction->detail_custom_transaction->coffin->picture_coffin}}" class="img-responsive img-thumbnail">
                        
                      
                      </div>
                      
                          
                          
                      <div class="col-md-4" style="padding-top:2%">
                        
                      <blockquote>
                         <div class="row-fluid">
                        <h5>{{$transaction->detail_custom_transaction->coffin->name_coffin}}</h5>
                        <h5><strong>IDR </strong>{{$transaction->detail_custom_transaction->coffin->price_coffin}}</h5>
                        </div>
                      </blockquote>
                       
                        

                      </div>
                    </div>

                    <div class="row">

                      <div class="col-md-3" >
                           @if($color_custom == 1)
                           <img src="../{{$transaction->detail_custom_transaction->color_custom->color_custom_file}}" class="img-responsive img-thumbnail">
                          @else
                            <img src="../{{$transaction->detail_custom_transaction->color->picture_color}}" class="img-responsive img-thumbnail">
                          @endif
                      
                      </div>
                      
                          
                          
                      <div class="col-md-4" style="padding-top:2%">
                        
                      <blockquote>
                         <div class="row-fluid">
                        @if($color_custom == 1)
                            <h5>{{$transaction->detail_custom_transaction->color_custom->color_custom_name}}</h5>
                            <h5><strong>IDR </strong>{{$transaction->detail_custom_transaction->color_custom->color_custom_price}}</h5>
                          @else
                            <h5>{{$transaction->detail_custom_transaction->color->name_color}}</h5>
                            <h5><strong>IDR </strong>{{$transaction->detail_custom_transaction->color->price_color}}</h5>
                          @endif
                        </div>
                      </blockquote>
                       
                        

                      </div>
                    </div>

                     <div class="row">

                      <div class="col-md-3" >
                          @if($pattern_custom == 1)
                           <img src="../{{$transaction->detail_custom_transaction->pattern_custom->pattern_custom_file}}" class="img-responsive img-thumbnail">
                           
                          @else
                            <img src="../{{$transaction->detail_custom_transaction->pattern->picture_pattern}}" class="img-responsive img-thumbnail">
                            
                          @endif
                      
                      </div>
                      
                          
                          
                      <div class="col-md-4" style="padding-top:2%">
                        
                      <blockquote>
                         <div class="row-fluid">
                          @if($pattern_custom == 1)
                            <h5>{{$transaction->detail_custom_transaction->pattern_custom->pattern_custom_name}}</h5>
                            <h5>
                            <strong>IDR </strong>{{$transaction->detail_custom_transaction->pattern_custom->pattern_custom_price}}
                            @if($transaction->detail_custom_transaction->pattern_custom->pattern_custom_price === 0)
                              <span>(Ask for price)</span>
                            @endif
                            </h5>
                          @else
                            <h5>{{$transaction->detail_custom_transaction->pattern->name_pattern}}</h5>
                            <h5>
                            <strong>IDR </strong>{{$transaction->detail_custom_transaction->pattern->price_pattern}}       
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