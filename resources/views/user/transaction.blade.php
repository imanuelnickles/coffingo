@extends('layouts.app')

@section('content')
<?php

      $count=1;
      $count1=1;
      $count2=1;
      $count3=1
      /*if(empty($_GET['page']))
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
      }*/
        
        
      
?>
<div class="container">
    
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="row-fluid" style="padding-bottom:2%">
               <div class="s12 col-md" style="border-bottom: 1px solid #eee;font-size:18px;padding-bottom:1%">Transaction History</div>
          </div>
          <ul class="nav nav-tabs  nav-justified">
            <li class="active"><a data-toggle="tab" href="#payment">Payment Status</a></li>
            <li><a data-toggle="tab" href="#order">Order Status</a></li>
            <li><a data-toggle="tab" href="#succeed">Succeed Transaction</a></li>
            <li><a data-toggle="tab" href="#canceled">Canceled Transaction</a></li>
          </ul>

          <div class="tab-content">
            <div id="payment" class="tab-pane fade in active">
              <div class="table-responsive">
                <table class="table">
                    <tr>
                      <th>#</th>
                      <th>Reference Code</th>
                      <th>Transaction Date</th>
                      <th>Valid Until</th>
                      <th>Status</th>

                    </tr>
                  @foreach($payment as $payments)
                    @foreach($payments->transaction as $transactions)
                    <tr>
                      <td>{{ $count++ }}</td>
                      <td>{{ $transactions->reference_code }}</td>
                      <td>{{ $transactions->created_at->todatestring() }}</td>
                      <td>{{ $transactions->valid_until }}</td>
                      <td><span class="label label-danger">Pending</span></td>
                      <td><a href="{{route('payment',['id'=> $transactions->id_transaction ])}} "><button class="btn btn-info btn-xs">View Detail</button></a></td>
                    </tr>
                    @endforeach
                  @endforeach
                </table>
              </div>
              
            </div>
            <div id="order" class="tab-pane fade">
               <div class="table-responsive">
                <table class="table">
                    <tr>
                      <th>#</th>
                      <th>Reference Code</th>
                      <th>Transaction Date</th>
                      <th>Payment Date</th>
                      <th>Status</th>

                    </tr>

                  @foreach($order as $orders)
                    @foreach($orders->transaction as $transactions)
                    <tr>
                      <td>{{ $count1++ }}</td>
                      <td>{{ $transactions->reference_code }}</td>
                      <td>{{ $transactions->created_at->todatestring() }}</td>
                      <td>{{ $transactions->updated_at->todatestring() }}</td>
                      <td><span class="label label-warning">{{$transactions->status}}</span></td>
                      <td><a href="{{route('payment',['id'=> $transactions->id_transaction ])}}"><button class="btn btn-info btn-xs">View Detail</button></a></td>
                    </tr>
                    @endforeach
                  @endforeach
                </table>
              </div>
            </div>
            <div id="succeed" class="tab-pane fade">
               <div class="table-responsive">
                <table class="table">
                    <tr>
                      <th>#</th>
                      <th>Reference Code</th>
                      <th>Transaction Date</th>
                      <th>Payment Date</th>
                      <th>Status</th>

                    </tr>
                              
                  
                  @foreach($succeed as $succeeds)
                    @foreach($succeeds->transaction as $transactions)
                    <tr>
                      <td>{{ $count2++}}</td>
                      <td>{{ $transactions->reference_code }}</td>
                      <td>{{ $transactions->created_at->todatestring() }}</td>
                      <td>{{ $transactions->updated_at->todatestring() }}</td>
                      <td><span class="label label-success">{{$transactions->status}}</span></td>
                      <td><a href="{{route('payment',['id'=> $transactions->id_transaction ])}}"><button class="btn btn-info btn-xs">View Detail</button></a></td>
                    </tr>
                    @endforeach
                  @endforeach
                </table>
              </div>
            </div>
            <div id="canceled" class="tab-pane fade">
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
                    @foreach($canceleds->transaction as $transactions)
                    <tr>
                      <td>{{ $count3++}}</td>
                      <td>{{ $transactions->reference_code }}</td>
                      <td>{{ $transactions->created_at->todatestring() }}</td>
                      <td>{{ $transactions->valid_until }}</td>
                      <td><span class="label label-danger">Canceled</span></td>
                      
                    @endforeach
                  @endforeach
                </table>
              </div>
            </div>
          </div>
        
        </div>
                      
                         
                      
                   

               
            
        </div>
        
    </div>
</div>
@endsection
