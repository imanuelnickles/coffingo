@extends('admin.dashboard')

@section('content')
<section class="content-header">
      <h1>
        All Transaction
        <!-- <small>Optional description</small> -->
      </h1>
      
    </section>

   
    <section class="content">
    
    	
    <?php

    	$count=$count1=$count2=1;
    	/*if(empty($_GET['page']))
    	{
    		$count=$count1=$count2=1;
    	}
    	else
    	{
    		if($_GET['page']==1)
    		{
    			$count=$count1=$count2=1;
    		}else{
    			$count=$count1=$count2=($_GET['page']-1)*5+1;
    		}
    	}*/
    		
    		
    	
    ?>
    

          
   
  
  <ul class="nav nav-tabs  nav-justified">
            <li class="active"><a data-toggle="tab" href="#canceled">Canceled</a></li>
            <li><a data-toggle="tab" href="#waiting">Waiting for Approve</a></li>
            <li><a data-toggle="tab" href="#approved">Approved</a></li>
          </ul>
<div class="tab-content">
            <div id="canceled" class="tab-pane fade in active">
              <div class="table-responsive">
                <table class="table">
                    <tr>
                      <th>#</th>
                      <th>Reference Code</th>
                      <th>Transaction Date</th>
                      <th>Valid Until</th>
                      <th>Status</th>

                    </tr>
                  
                    @foreach($canceled as $canceleds)
                    <tr>
                      <td>{{ $count++ }}</td>
                      <td>{{ $canceleds->reference_code }}</td>
                      <td>{{ $canceleds->created_at->todatestring() }}</td>
                      <td>{{ $canceleds->valid_until }}</td>
                      <td><span class="label label-danger">Canceled</span></td>
                      <td>
                        <a href="{{route('order_detail',['id'=>$canceleds->id_transaction])}}"><button type="button"  class="btn btn-success btn-xs  ">Order Detail</button></a>
                      </td>
                      
                    </tr>
                    @endforeach
                 
                </table>
              
              </div>
              
            </div>
            <div id="waiting" class="tab-pane fade">
               <div class="table-responsive">
                <table class="table">
                    <tr>
                      <th>#</th>
                      <th>Reference Code</th>
                      <th>Transaction Date</th>
                      <th>Payment Date</th>
                      <th>Status</th>

                    </tr>

                 
                    @foreach($waiting as $waitings)
                    <tr>
                      <td>{{ $count1++ }}</td>
                      <td>{{ $waitings->reference_code }}</td>
                      <td>{{ $waitings->created_at->todatestring() }}</td>
                      <td>{{ $waitings->updated_at->todatestring() }}</td>
                      <td><span class="label label-warning">{{$waitings->status}}ssss</span></td>
                      <td>
                        <a href="{{route('order_detail',['id'=>$waitings->id_transaction])}}"><button type="button"  class="btn btn-success btn-xs  ">Order Detail</button></a>
                      </td>
                    </tr>
                    @endforeach
                 
                </table>


              </div>
            </div>
            <div id="approved" class="tab-pane fade">
               <div class="table-responsive">
                <table class="table">
                    <tr>
                      <th>#</th>
                      <th>Reference Code</th>
                      <th>Transaction Date</th>
                      <th>Approval Date</th>
                      <th>Status</th>

                    </tr>
                              
                  
                  
                    @foreach($approved as $approveds)
                    <tr>
                      <td>{{ $count2++}}</td>
                      <td>{{ $approveds->reference_code }}</td>
                      <td>{{ $approveds->created_at->todatestring() }}</td>
                      <td>{{ $approveds->updated_at->todatestring() }}</td>
                      <td><span class="label label-success">{{$approveds->status}}</span></td>
                      <td>
                        <a href="{{route('order_detail',['id'=>$approveds->id_transaction])}}"><button type="button"  class="btn btn-success btn-xs  ">Order Detail</button></a>
                      </td>
                    </tr>
                    @endforeach
                 
                </table>
              </div>
            </div>
          </div>

     
      <!-- Your Page Content Here -->

    </section>
@endsection