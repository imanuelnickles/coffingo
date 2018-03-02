@extends('admin.dashboard')

@section('content')
<section class="content-header">
      <h1>
        Order Detail
       
      </h1>
      
    </section>
    
   
    <section class="content">
    <div class="table-responsive">
      <table class="table">
        <tr>
          
          <th>Item Picture</th>
          <th>Item Name</th>
          <th>Item Price</th>
          
          
        </tr>
          
        
          <tr>
          
          <td>
            <img src="../../{{$transaction->detail_transaction->product->picture_product}}" class="img-responsive img-thumbnail" style="width:200px">
          </td>
          <td >{{$transaction->detail_transaction->product->name_product}}</td>
          <td ><strong>IDR</strong>{{$transaction->detail_transaction->product->price_product}}</td>
          <td>
          <a href="#"><button type="button" class="btn btn-primary btn-xs  ">Edit</button></a>
          <a href="#"><button type="button"  class="btn btn-danger btn-xs  ">Delete</button></a>
          </td>
        </td>
       
        </table>
        </div>
        
        <div class="row-fluid">
           <a href="../payment/confirmation"><button type="button" class="btn btn-info btn-md  ">Back</button></a>
        </div>
       
      




    </section>

       

@endsection