@extends('layouts.app')

@section('content')

           
        

<div class="container">

    <div class="row">
        <div class="col-md-12  ">
            <div class="panel panel-default">
                <div class="panel-heading">Custom Coffin</div>

                <div class="panel-body">
                    <form class="" role="form" enctype="multipart/form-data" method="POST" action="{{ route('custom_process') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <label for="coffin" class="col-md-1 control-label">Coffin</label>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-10">
                                
                                @foreach($coffin as $coffins)
                                <div class="col-md-2 col-xs-6">
                                   <!--  <input id="coffin" type="text" class="form-control" name="coffin" value="{{ old('coffin') }}" required autofocus> -->
                                    <label>
                                      <input type="radio" name="coffin" value="{{$coffins->id_coffin}}" {{ old('coffin')=="$coffins->id_coffin" ? 'checked='.'"'.'checked'.'"' : '' }} />
                                      <img src="{{$coffins->picture_coffin}}" class="img-responsive">
                                    </label>
                                
                                </div>
                                @endforeach
                            </div>
                            
                            
                        </div>

                        <div class="row-fluid {{ $errors->has('coffin') ? ' has-error' : '' }}">
                           
                            @if ($errors->has('coffin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('coffin') }}</strong>
                                    </span>
                             @endif
                        </div>
                         

                        <div class="row">
                            <label for="coffin" class="col-md-1 control-label">Color</label>
                        </div>
                        <div class="row ">
                            <div class="col-md-10">                                
                            
                                @foreach($color as $colors)
                                <div class="col-md-2 col-xs-6">
                                   <!--  <input id="coffin" type="text" class="form-control" name="coffin" value="{{ old('coffin') }}" required autofocus> -->
                                    <label>
                                      <input type="radio" name="color" value="{{$colors->id_color}}" {{ old('color')=="$colors->id_color" ? 'checked='.'"'.'checked'.'"' : '' }}/>
                                      <img src="{{$colors->picture_color}}" class="img-responsive">
                                    </label>
                                   
                                </div>
                                @endforeach
                                
                            </div>
                            <div class="col-md-2">
                                    <label class="control-label">Custom Color</label>
                                    <input type="file" name="color_custom" class="form-control">    
                            </div>
                            
                        </div>
                        <div class="row-fluid {{ $errors->has('color') ? ' has-error' : '' }}">
                        @if ($errors->has('color'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                        @endif
                        </div>

                        <div class="row">
                            <label for="coffin" class="col-md-1 control-label">Pattern</label>
                        </div>
                        <div class="row ">
                            <div class="col-md-10">
                                @foreach($pattern as $patterns)
                                <div class="col-md-2 col-xs-6">
                                   <!--  <input id="coffin" type="text" class="form-control" name="coffin" value="{{ old('coffin') }}" required autofocus> -->
                                    <label>
                                      <input type="radio" name="pattern" value="{{$patterns->id_pattern}}" {{ old('pattern')=="$patterns->id_pattern" ? 'checked='.'"'.'checked'.'"' : '' }}/>
                                      <img src="{{$patterns->picture_pattern}}" class="img-responsive">
                                    </label>
                                   
                                </div>
                                @endforeach
                            </div>
                            <div class="col-md-2">
                                <label class="control-label">Custom Pattern</label>
                                <input type="file" name="pattern_custom" class="form-control">    
                            </div>
                            
                            
                        </div>
                        <div class="row-fluid {{ $errors->has('pattern') ? ' has-error' : '' }}">
                            @if ($errors->has('pattern'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pattern') }}</strong>
                                    </span>
                        @endif
                        </div>
                        

                        <div class="row">
                            <label for="coffin" class="col-md-1 control-label">Accessories</label>
                        </div>

                        <div class="row ">
                            <div class="col-md-10">
                                 @foreach($accessories as $acc)
                                <div class="col-md-2 col-xs-6">
                               <!--  <input id="coffin" type="text" class="form-control" name="coffin" value="{{ old('coffin') }}" required autofocus> -->
                                <label>
                                  <input type="checkbox" name="accessories[]" value="{{$acc->id_accessories}}" {{ old('accessories')=="$acc->id_accessories" ? 'checked='.'"'.'checked'.'"' : '' }}/>
                                  <img src="{{$acc->picture_accessories}}" class="img-responsive">
                                </label>
                               
                            </div>
                            @endforeach     
                            </div>
                           
                           <!--  <div class="col-md-2">
                                <label class="control-label">Custom Accessories</label>
                                <input type="file"  name="accessories_custom" class="form-control">    
                            </div> -->
                            
                        </div>
                        <div class="row-fluid {{ $errors->has('accessories') ? ' has-error' : '' }}">
                            @if ($errors->has('accessories'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('accessories') }}</strong>
                                    </span>
                        @endif
                        </div>
                        
                       

                        <div class="row">
                            <div class="text-center">
                                <button type="reset" class="btn coffin-btn-1 ">
                                    Reset
                                </button>
                                <button type="submit" class="btn coffin-btn">
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
@endsection
