@extends('layouts.app')

@section('content')

           
        

<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('upload') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('product') ? ' has-error' : '' }}">
                            <label for="product" class="col-md-4 control-label">Product</label>

                            <div class="col-md-6">
                                <input id="product" type="text" class="form-control" name="product" value="{{ old('product') }}" required autofocus>

                                @if ($errors->has('product'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('qty') ? ' has-error' : '' }}">
                            <label for="qty" class="col-md-4 control-label">Qty</label>

                            <div class="col-md-6">
                                <input id="qty" type="text" class="form-control" value="{{old('qty')}}" name="qty" required>

                                @if ($errors->has('qty'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('qty') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
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
