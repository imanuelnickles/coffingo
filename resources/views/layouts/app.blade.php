<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CoffinGo</title>

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--ICONS-->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
 

    <style type="text/css">
        /*Text Area Locking Horizontal Resize*/
        textarea { resize: vertical; } 
    </style>
    <link href="{{ asset('public/css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-static-top coffin-nav">
            <div class="container">
                <div class="navbar-header ">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed coffin-collapse" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand coffin-brand" href="{{ url('/') }}">
                        <!-- {{ config('app.name', 'Laravel') }} -->
                        CoffinGo
                    </a>
                </div>

                <div class="collapse navbar-collapse"  id="app-navbar-collapse" >
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav coffin-right-nav">
                        @if (Auth::check())
                            @if(Auth::user()->role !=1)
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('custom') }}">Customize</a></li>
                            <li><a href="{{ route('transaction') }}">Transaction</a></li>
                            @else
                            <li><a href="{{ route('transaction') }}">Transaction</a></li>
                            @endif
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right coffin-right-nav">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown ">
                                <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('profile') }}">Profile</a>
                                        
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="coffin-content">
         
        @yield('content')
         </div>
        <footer>
    <div class="footer" id="footer">
        <div class="container">
            <div class="footer-row">
                <div class=" col-md-2 col-xs-12">
                    <h3 style="font-size:18px;font-weight:700"> CoffinGo </h3>
                    <span>Jl.Coffin XI RT 000 / RW 000, Palmerah, Kota Administrasi Jakarta Barat</span>
                </div>
                <div class=" col-md-2  col-xs-6">
                    <h3 class="coffin-footer-border"> Learn More </h3>
                    <ul>
                        <li> <a href="#"> FAQ </a> </li>
                        <li> <a href="#"> Terms & Conditions </a> </li>
                        <li> <a href="#"> About Us </a> </li>
                        <li> <a href="#"> Privacy Policy </a> </li>
                    </ul>
                </div>
                </div>
                <div class=" col-md-2  col-xs-6">
                    <h3 class="coffin-footer-border">Partner </h3>
                    <ul>
                        <li> <a href="#"> Sponsorship </a> </li>
                        <li> <a href="#"> Partnership </a> </li>
                        <li> <a href="#"> Creator </a> </li>
                        <li> <a href="#"> Designer </a> </li>        
                    </ul>
                </div>
                <div class="  col-md-2  col-xs-6">
                    <h3 class="coffin-footer-border"> Others </h3>
                    <ul>
                      <li> <a href="#"> CoffinGo Blog </a> </li>
                        <li> <a href="#"> Promo </a> </li>
                        <li> <a href="#"> Contact Us </a> </li>
                        
                        
                    </ul>
                </div>
                <div class=" col-md-3 col-xs-6 ">
                    <h3 class="coffin-footer-border"> Connect </h3>
                      
                    <ul>
                        <li class="coffin-socmed"> 
                            <a href="#">  <i class=" fa fa-facebook fa-2x">   </i> </a> 
                            <a href="#">  <i class="fa fa-twitter fa-2x">   </i> </a> 
                            <a href="#">  <i class="fa fa-instagram fa-2x">   </i> </a> 
                        </li>
                    </ul>
                </div>
            </div>
            <!--/.row--> 
        </div>
        <!--/.container--> 
        
        <center style="margin-top:10px"><font color="gray" size="2" ><p>Copyright &copy; CoffinGo 2017. All right reserved. </p></font></center>
   
    <!--/.footer-->

    </footer>
    </div>

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}"></script>-->
    

</body>
</html>
