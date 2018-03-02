@extends('layouts.app')

@section('content')

<?php header("Refresh:5; url=upload"); ?>
<script type="text/javascript">
     
            function timeCount(){
                (function myLoop (i) {          
   setTimeout(function () {   
      $("#time").html(i);       //  your code here                
      if (--i) myLoop(i); 
      else {
        setTimeout(function(){$("#time").html(i); },1000);
      }   //  decrement i and call myLoop again if i > 0
   }, 1000)
})(5);        
            
              
   
            }
                            
        
</script>
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    
                    <span id="time"></span>
                    <script type="text/javascript">
                    timeCount();
                        
                    </script>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
