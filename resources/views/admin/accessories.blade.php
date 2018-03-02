@extends('admin.dashboard')

@section('content')
<section class="content-header">
      <h1>
        Accessories Management
       
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
          <th>Accessories Picture</th>
          <th>Accessories Name</th>
          <th>Accessories Price</th>
          <th>Action</th>
          
        </tr>
          
        @foreach($accessories as $accessoriess)
          <tr>
          <td>{{$count++}}</td>
          <td>
            <img class="img-responsive img-thumbnail" style="width:100px;height:100px"src="../{{$accessoriess->picture_accessories}}">
                      </td>
          <td >{{$accessoriess->name_accessories}}</td>
          <td ><strong>IDR</strong> {{$accessoriess->price_accessories}}</td>
          <td>
          <a href="accessories/edit/{{$accessoriess->id_accessories}}"><button type="button" class="btn btn-primary btn-xs  ">Edit</button></a>
          <a href="#"><button type="button" data-toggle="modal" data-target="#accessories_modal_{{$accessoriess->id_accessories}}" class="btn btn-danger btn-xs  ">Delete</button></a>
          </td>
        </td>
        @endforeach
        </table>
        </div>
        {{$accessories->links()}}
        <div class="row-fluid">
           <a href="{{route('accessories_new')}}"><button type="button" class="btn btn-info btn-md  ">Add New Accessories</button></a>
        </div>
       
      




    </section>


       @foreach($accessories as $accessoriess)
      <div id="accessories_modal_{{$accessoriess->id_accessories}}" class="modal fade" role="dialog" >
        <div class="modal-dialog modal-sm">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
              <p>Are you sure want to delete this accessories?</p>
            </div>
            <div class="modal-footer">
              <a href="accessories/delete/{{$accessoriess->id_accessories}}"><button type="button" class="btn btn-success" >Yes</button></a>
              <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </div>
          </div>

        </div>
      </div>
    @endforeach

@endsection