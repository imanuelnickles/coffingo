@extends('admin.dashboard')

@section('content')

<section class="content-header">
     <h1>
        Edit User
       
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
            
               
                
                    <form class="form-horizontal" id="user_edit_form" role="form" method="POST" enctype="multipart/form-data" action="{{ route('user_update',['id'=>$user->id]) }}">

                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" placeholder="User Name" name="name" value="{{ old('name')==''? $user->name : old('name')}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-2 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" placeholder="User Email" name="email" value="{{old('email')==''? $user->email : old('email')}}"required >
                                
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('telp') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-2 control-label">Telp</label>

                            <div class="col-md-6">
                                <input id="telp" type="tel" class="form-control" placeholder="User Telp" name="telp" value="{{old('telp')==''? $user->telp : old('telp')}}"required >
                                
                                @if ($errors->has('telp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-2 control-label">Address</label>

                            <div class="col-md-6">
                                <textarea id="address" syle="" type="text" class="form-control" name="address" value="">{{ old('address')==''? $user->address : old('address') }} </textarea>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        

                      

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2 ">
                                <button type="reset" class="btn btn-danger">
                                    Reset
                                </button>
                                <button type="button" data-toggle="modal" data-target="#user_edit_modal" class="btn btn-primary">
                                    Submit
                                </button>

                                    
                            </div>
                        </div>
                    </form>
                
            
        </div>
    </div>
</section>
<!-- Modal -->
<div id="user_edit_modal" class="modal fade" role="dialog" >
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Edit Confirmation</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure want to edit this profile?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" 
        onclick="event.preventDefault();document.getElementById('user_edit_form').submit();">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>
@endsection