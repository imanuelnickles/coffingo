@extends('admin.dashboard')

@section('content')
<section class="content-header">
      <h1>
        Slider Management
       
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
          $count=($_GET['page']-1)*5+1;
        }
      }
        
        
      
    ?>
   
    <section class="content">
    <div class="table-responsive">
      <table class="table">
        <tr >
          <th>#</td>
          <th>Slider Picture</th>
          <th>Slider Name</th>
          <th>Uploader</th>
          <th>Action</th>
          
        </tr>
          
        @foreach($slider as $sliders)
          <tr>
          <td>{{$count++}}</td>
          <td>
            <img class=" img-thumbnail" style="width:400px;height:120px"src="../{{$sliders->picture_slider}}">
                      </td>
          <td >{{$sliders->name_slider}}</td>
          <td >{{$sliders->user->name}}</td>
          <td>
          <a href="slider/edit/{{$sliders->id_slider}}"><button type="button" class="btn btn-primary btn-xs  ">Edit</button></a>
          <a href="#"><button data-toggle="modal" data-target="#slider_modal_{{$sliders->id_slider}}" type="button" class="btn btn-danger btn-xs  ">Delete</button></a>
          </td>
        </td>
        @endforeach
        </table>
        </div>
        {{$slider->links()}}
        <div class="row-fluid">
           <a href="{{route('slider_new')}}"><button type="button" class="btn btn-info btn-md  ">Add New Slider</button></a>
        </div>
       
      




    </section>

       @foreach($slider as $sliders)
      <div id="slider_modal_{{$sliders->id_slider}}" class="modal fade" role="dialog" >
        <div class="modal-dialog modal-sm">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
              <p>Are you sure want to delete this slider?</p>
            </div>
            <div class="modal-footer">
              <a href="slider/delete/{{$sliders->id_slider}}"><button type="button" class="btn btn-success" >Yes</button></a>
              <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </div>
          </div>

        </div>
      </div>
    @endforeach

@endsection