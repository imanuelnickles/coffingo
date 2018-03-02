@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            
               
                    
                      @foreach($user as $users)
                      <div class="col-md-4 col-sm-6">
                          {{ $users->name }}
                         

                        </div>
                        
                      @endforeach
                      
                      
                         
                      
                   

                </div>
            
        </div>
        <div class="row">
        <div class="col-md-10 col-md-offset-1">
          {{ $user->links() }}
          </div>
        </div>
    </div>
</div>
@endsection
