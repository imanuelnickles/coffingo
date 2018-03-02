@extends('admin.dashboard')

@section('content')
<section class="content-header">
      <h1>
        Custom Order Detail
       
      </h1>
</section>
<section class="content">
      
        <div class="table-responsive">
          <table class="table">

            <tr>
              <td>Item Picture</td>
              <td>Item Name</td>
              <td>Item Price</td>
            </tr>
            
            <tr>
              <td>
                <img src="../../{{$transaction->detail_custom_transaction->coffin->picture_coffin}}" class="img-responsive img-thumbnail">
              </td>
              <td>
                {{$transaction->detail_custom_transaction->coffin->name_coffin}}
              </td>
              <td>
                <strong>IDR </strong>{{$transaction->detail_custom_transaction->coffin->price_coffin}}
              </td>
            </tr>

            <tr>
              <td>
                @if($color_custom == 1)
                 <img src="../../{{$transaction->detail_custom_transaction->color_custom->color_custom_file}}" class="img-responsive img-thumbnail" style="width:310px">
                @else
                  <img src="../../{{$transaction->detail_custom_transaction->color->picture_color}}" class="img-responsive img-thumbnail" style="width:310px">
                @endif
              </td>
              <td>
                @if($color_custom == 1)
                  {{$transaction->detail_custom_transaction->color_custom->color_custom_name}}
                  
                @else
                  {{$transaction->detail_custom_transaction->color->name_color}}
                  
                @endif
              </td>
              <td>
                @if($color_custom == 1)
                  
                  <h5><strong>IDR </strong>{{$transaction->detail_custom_transaction->color_custom->color_custom_price}}
                @else
                  
                  <strong>IDR </strong>{{$transaction->detail_custom_transaction->color->price_color}}
                @endif
              </td>
            </tr>

            <tr>
              <td>
                @if($pattern_custom == 1)
                 <img src="../../{{$transaction->detail_custom_transaction->pattern_custom->pattern_custom_file}}" class="img-responsive img-thumbnail" style="width:310px">
                 
                @else
                  <img src="../../{{$transaction->detail_custom_transaction->pattern->picture_pattern}}" class="img-responsive img-thumbnail" style="width:310px">
                  
                @endif
                
              </td>
              <td>
              @if($pattern_custom == 1)
                {{$transaction->detail_custom_transaction->pattern_custom->pattern_custom_name}}
                
              @else
                {{$transaction->detail_custom_transaction->pattern->name_pattern}}
              
              @endif
              </td>
              <td>
                @if($pattern_custom == 1)
                  
                    <form method="POST" action="{{ route('update_pattern_price') }}">
                      {{ csrf_field() }}
                      <input type="hidden" name="custom_pattern_id" value="{{$transaction->detail_custom_transaction->pattern_custom->pattern_custom_id}}">
                       <input type="hidden" name="transaction_id" value="{{$transaction->id_transaction}}"> 
                      <label><strong>IDR</strong></label>
                      <input type="text" name="new_price" value="{{$transaction->detail_custom_transaction->pattern_custom->pattern_custom_price}}">
                      <input type="submit" value="Change" class="btn btn-danger btn-sm">
                    </form> 
                    
                  
                <!-- <strong>IDR </strong>{{$transaction->detail_custom_transaction->pattern_custom->pattern_custom_price}}
                
                  <span>(Ask for price)</span> -->
                
                
              @else
                
                <strong>IDR </strong>{{$transaction->detail_custom_transaction->pattern->price_pattern}}       
                
              @endif
              </td>
            </tr>

            @foreach($accessories as $acc)
            <tr>
              <td>
                 
                <img src="../../{{$acc->picture_accessories}}" class="img-responsive img-thumbnail">
                 
                 
              </td>
              <td>
                {{$acc->name_accessories}}
              </td>
              <td>
                <strong>IDR </strong>{{$acc->price_accessories}}
              </td>
            </tr>
            @endforeach

          </table>
        </div>

                       
        <div class="row-fluid">
           <a href="../payment/confirmation"><button type="button" class="btn btn-info btn-md  ">Back</button></a>
        </div>  



    </section>

       

@endsection