@extends('admin.dashboard')

@section('content')
<section class="content-header">
      <h1>
        Color Management
       
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
          <th>Color Picture</th>
          <th>Color Name</th>
          <th>Color Price</th>
          <th>Action</th>
          
        </tr>
          
        @foreach($color as $colors)
          <tr>
          <td>{{$count++}}</td>
          <td>
            <img class="img-responsive img-thumbnail" style="width:100px;height:100px"src="../{{$colors->picture_color}}">
                      </td>
          <td >{{$colors->name_color}}</td>
          <td ><strong>IDR</strong> {{$colors->price_color}}</td>
          <td>
          <a href="color/edit/{{$colors->id_color}}"><button type="button" class="btn btn-primary btn-xs  ">Edit</button></a>
          <a href="#"><button type="button" data-toggle="modal" data-target="#color_modal_{{$colors->id_color}}" class="btn btn-danger btn-xs  ">Delete</button></a>
          </td>
        </td>
        @endforeach
        </table>
        </div>
        {{$color->links()}}
        <div class="row-fluid">
           <a href="{{{route('color_new')}}}"><button type="button" class="btn btn-info btn-md  ">Add New Color</button></a>
        </div>
       
      




    </section>

       @foreach($color as $colors)
      <div id="color_modal_{{$colors->id_color}}" class="modal fade" role="dialog" >
        <div class="modal-dialog modal-sm">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
              <p>Are you sure want to delete this color?</p>
            </div>
            <div class="modal-footer">
              <a href="color/delete/{{$colors->id_color}}"><button type="button" class="btn btn-success" >Yes</button></a>
              <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </div>
          </div>

        </div>
      </div>
    @endforeach

@endsection