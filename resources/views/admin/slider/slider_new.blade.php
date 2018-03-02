@extends('admin.dashboard')

@section('content')

<section class="content-header">
     <h1>
        Add New Slider
       
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
            
               
                
                    <form class="form-horizontal" id="slider_new_form" role="form" method="POST" enctype="multipart/form-data" action="{{ route('slider_store') }}">

                        {{ csrf_field() }}
                        <!-- <div class="row-fluid" style="padding-bottom:2%">
						   <div class="s12 col-md" style="border-bottom: 1px solid #eee;font-size:18px;padding-bottom:1%">Profile Data</div>
						</div> -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" placeholder="Slider Name" name="name" value="{{ old('name')}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-2 control-label">Image</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control"  name="image" value="{{old('image')}}"required >
                                <span><em>(*) image width must be 1140 px and height 350px</em></span>
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
                                <button type="button" data-toggle="modal" data-target="#slider_new_modal" class="btn btn-primary">
                                    Submit
                                </button>

                                    
                            </div>
                        </div>
                    </form>
                
            
        </div>
    </div>
</section>

 <div id="slider_new_modal" class="modal fade" role="dialog" >
        <div class="modal-dialog modal-sm">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Submit Confirmation</h4>
            </div>
            <div class="modal-body">
              <p>Are you sure want to add this slider?</p>
            </div>
            <div class="modal-footer">
              <button type="button" onclick="event.preventDefault();document.getElementById('slider_new_form').submit();" class="btn btn-success" >Yes</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </div>
          </div>

        </div>
      </div>
@endsection