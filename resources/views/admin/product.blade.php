@extends('admin.dashboard')

@section('content')
<section class="content-header">
      <h1>
        Product Management
       
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
          <th>Product Picture</th>
          <th>Product Name</th>
          <th>Product Price</th>
          <th>Action</th>
          
        </tr>
          
        @foreach($product as $products)
          <tr>
          <td>{{$count++}}</td>
          <td>
            <img class="img-responsive img-thumbnail" style="width:100px"src="../{{$products->picture_product}}">
                      </td>
          <td >{{$products->name_product}}</td>
          <td ><strong>IDR</strong> {{$products->price_product}}</td>
          <td>
          <a href="product/edit/{{$products->id_product}}"><button type="button" class="btn btn-primary btn-xs  ">Edit</button></a>
          <a href="#"><button data-toggle="modal" data-target="#product_modal_{{$products->id_product}}" type="button" class="btn btn-danger btn-xs  ">Delete</button></a>
          </td>
        </td>
        @endforeach
        </table>
        </div>
        {{$product->links()}}
        <div class="row-fluid">
           <a href="{{route('product_new')}}"><button type="button" class="btn btn-info btn-md  ">Add New Product</button></a>
        </div>
       
      




    </section>

    @foreach($product as $products)
      <div id="product_modal_{{$products->id_product}}" class="modal fade" role="dialog" >
        <div class="modal-dialog modal-sm">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
              <p>Are you sure want to delete this product?</p>
            </div>
            <div class="modal-footer">
              <a href="product/delete/{{$products->id_product}}"><button type="button" class="btn btn-success" >Yes</button></a>
              <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </div>
          </div>

        </div>
      </div>
    @endforeach

@endsection