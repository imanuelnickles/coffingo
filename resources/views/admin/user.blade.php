@extends('admin.dashboard')

@section('content')
<section class="content-header">
      <h1>
        User Management
        <!-- <small>Optional description</small> -->
      </h1>
      
    </section>

   
    <section class="content">
    
    	<div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Telp</th>
        <th>Address</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php

    	$count=0;
    	if(empty($_GET['page']))
    	{
    		$count=1;
    	}
    	else
    	{
    		if($_GET['page']==1)
    		{
    			$count=1;
    		}else{
    			$count=($_GET['page']-1)*5+1;
    		}
    	}
    		
    		
    	
    ?>
    @foreach($user as $users)
      <tr>
        <td>{{ $count++}}</td>
        <td>{{$users->name}}</td>
        <td>{{$users->email}}</td>
         <td>{{$users->telp}}</td>
        <td>{{$users->address}}</td>
        <td><a href="admin/user/edit/{{$users->id}}"><button type="button" class="btn btn-primary btn-xs	">Edit</button></a>
        <a href="#"><button data-toggle="modal" data-target="#user_modal_{{$users->id}}"class="btn btn-danger btn-xs">Delete</button></a></td>
        <td></td>
      </tr>
     


</div>

    @endforeach
      
    </tbody>
  </table>
  </div>
   {{$user->links()}}
     
      <!-- Your Page Content Here -->

    </section>
    

    @foreach($user as $users)
 
<div id="user_modal_{{$users->id}}" class="modal fade" role="dialog" >
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Delete Confirmation</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure want to delete this profile?</p>
      </div>
      <div class="modal-footer">
        <a href="admin/user/delete/{{$users->id}}"><button type="button" class="btn btn-success" >Yes</button></a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>

    @endforeach

@endsection