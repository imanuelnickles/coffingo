@extends('admin.dashboard')

@section('content')

<section class="content-header">
     <h1>
        Edit Coffin
       
      </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-8 ">
            @if(session()->has('message'))
                <div class="alert alert-success fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session()->get('message') }}
                </div>
            @endif
            
               
                
                    <form class="form-horizontal" id="coffin_edit_form" role="form" method="POST" enctype="multipart/form-data" action="{{ route('coffin_update',['id'=>$coffin->id_coffin]) }}">

                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">New Name</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" placeholder="Coffin Name" name="name" value="{{ old('name')==''? $coffin->name_coffin : old('name')}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-2 control-label">New Price</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control" placeholder="Coffin Price" name="price" value="{{old('price')==''? $coffin->price_coffin : old('price')}}"required >
                                
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-md-2 control-label">Current Image</label>

                            <div class="col-md-6">
                                <img src="../../../{{$coffin->picture_coffin}}" class="img-responsive">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-2 control-label">New Image</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control"  name="image" value="{{old('image')}}">
                                <span><em>(*) image width must be 300 px and height 200px </em></span>
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        

                      

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2 ">
                                <button type="reset" class="btn btn-danger">
                                    Reset
                                </button>
                                <button type="button" data-toggle="modal" data-target="#coffin_edit_modal" class="btn btn-primary">
                                    Submit
                                </button>

                                    
                            </div>
                        </div>
                    </form>
                
            
        </div>
    </div>
</section>

 <div id="coffin_edit_modal" class="modal fade" role="dialog" >
        <div class="modal-dialog modal-sm">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Edit Confirmation</h4>
            </div>
            <div class="modal-body">
              <p>Are you sure want to edit this coffin?</p>
            </div>
            <div class="modal-footer">
              <button type="button" onclick="event.preventDefault();document.getElementById('coffin_edit_form').submit();" class="btn btn-success" >Yes</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </div>
          </div>

        </div>
      </div>
@endsection