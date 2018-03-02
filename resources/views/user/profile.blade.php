@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(session()->has('message'))
                <div class="alert alert-success fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>
                <div class="panel-body">
                    <form class="form-horizontal" id="profile_form" role="form" method="POST" action="{{ route('update_profile') }}">

                        {{ csrf_field() }}
                        <div class="row-fluid" style="padding-bottom:2%">
						   <div class="s12 col-md" style="border-bottom: 1px solid #eee;font-size:18px;padding-bottom:1%">Profile Data</div>
						</div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" name="name" value="{{ old('name')==''? Auth::user()->name : old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{Auth::user()->email}}"required disabled="">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <textarea id="address" type="text" class="form-control" name="address" value="">{{old('address')==''? Auth::user()->address : old('address') }} </textarea>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row-fluid" style="padding-bottom:2%">
						   <div class="s12 col-md" style="border-bottom: 1px solid #eee;font-size:18px;padding-bottom:1%">Change Password</div>
						</div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2 text-center">
                                <button type="reset" class="btn coffin-btn-1">
                                    Reset
                                </button>
                                <button type="button" data-toggle="modal" data-target="#profile_modal" class="btn coffin-btn">
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

<!-- Modal -->
<div id="profile_modal" class="modal fade" role="dialog" style="margin-top:15%;">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Update Confirmation</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure want to update your profile?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" 
        onclick="event.preventDefault();document.getElementById('profile_form').submit();">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>
@endsection