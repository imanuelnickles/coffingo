@extends('admin.dashboard')

@section('content')
<section class="content-header">
      <h1>
        Pattern Management
       
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
          <th>Pattern Picture</th>
          <th>Pattern Name</th>
          <th>Pattern Price</th>
          <th>Action</th>
          
        </tr>
          
        @foreach($pattern as $patterns)
          <tr>
          <td>{{$count++}}</td>
          <td>
            <img class="img-responsive img-thumbnail" style="width:100px;height:100px"src="../{{$patterns->picture_pattern}}">
                      </td>
          <td >{{$patterns->name_pattern}}</td>
          <td ><strong>IDR</strong> {{$patterns->price_pattern}}</td>
          <td>
          <a href="pattern/edit/{{$patterns->id_pattern}}"><button type="button" class="btn btn-primary btn-xs  ">Edit</button></a>
          <a href="#"><button type="button" data-toggle="modal" data-target="#pattern_modal_{{$patterns->id_pattern}}" class="btn btn-danger btn-xs  ">Delete</button></a>
          </td>
        </td>
        @endforeach
        </table>
        </div>
        {{$pattern->links()}}
        <div class="row-fluid">
           <a href="{{route('pattern_new')}}"><button type="button" class="btn btn-info btn-md  ">Add New Pattern</button></a>
        </div>
       
      




    </section>

       @foreach($pattern as $patterns)
      <div id="pattern_modal_{{$patterns->id_pattern}}" class="modal fade" role="dialog" >
        <div class="modal-dialog modal-sm">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
              <p>Are you sure want to delete this pattern?</p>
            </div>
            <div class="modal-footer">
              <a href="pattern/delete/{{$patterns->id_pattern}}"><button type="button" class="btn btn-success" >Yes</button></a>
              <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </div>
          </div>

        </div>
      </div>
    @endforeach

@endsection