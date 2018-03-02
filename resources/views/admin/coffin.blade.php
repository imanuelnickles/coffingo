@extends('admin.dashboard')

@section('content')
<section class="content-header">
      <h1>
        Coffin Management
       
      </h1>
      
    </section>
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
          $count=($_GET['page']-1)*10+1;
        }
      }
        
        
      
    ?>
   
    <section class="content">
    <div class="table-responsive">
      <table class="table">
        <tr >
          <th>#</td>
          <th>Coffin Picture</th>
          <th>Coffin Name</th>
          <th>Coffin Price</th>
          <th>Action</th>
          
        </tr>
          
        @foreach($coffin as $coffins)
          <tr>
          <td>{{$count++}}</td>
          <td>
            <img class="img-responsive img-thumbnail" style="width:100px;height:100px"src="../{{$coffins->picture_coffin}}">
                      </td>
          <td >{{$coffins->name_coffin}}</td>
          <td ><strong>IDR</strong> {{$coffins->price_coffin}}</td>
          <td>
          <a href="coffin/edit/{{$coffins->id_coffin}}"><button type="button" class="btn btn-primary btn-xs  ">Edit</button></a>
          <a href="#"><button type="button" data-toggle="modal" data-target="#coffin_modal_{{$coffins->id_coffin}}" class="btn btn-danger btn-xs  ">Delete</button></a>
          </td>
        </td>
        @endforeach
        </table>
        </div>
        {{$coffin->links()}}
        <div class="row-fluid">
           <a href="{{route('coffin_new')}}"><button type="button" class="btn btn-info btn-md  ">Add New Coffin</button></a>
        </div>
       
      




    </section>

       @foreach($coffin as $coffins)
      <div id="coffin_modal_{{$coffins->id_coffin}}" class="modal fade" role="dialog" >
        <div class="modal-dialog modal-sm">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
              <p>Are you sure want to delete this coffin?</p>
            </div>
            <div class="modal-footer">
              <a href="coffin/delete/{{$coffins->id_coffin}}"><button type="button" class="btn btn-success" >Yes</button></a>
              <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </div>
          </div>

        </div>
      </div>
    @endforeach

@endsection