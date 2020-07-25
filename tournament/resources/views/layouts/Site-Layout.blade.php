<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  @include('layouts.CSS-Layout')

 <style>
       
        /* start footer section */

button {
    background-color:#2e59d9 !important;
    max-width:200px;
    color:#fff !important;
}

.footer {
background-color: #262626;
  clear: both;
    position: relative;
}

 
 .footer p {
  display: inline-block;
       padding: 0 70px 0 0;
       color:#fff;
}

.logo {
        margin: 55px auto;
}

.logo img {
    width:150px !important;
}

.profile-img {
    width:30px !important;
    height:30px;
}

@media (max-width: 1024px) { 
    
    .logo h2 {
        font-size:26px;
    }
}

@media (max-width: 768px) { 
    
    .logo h2 {
        text-align:center;
        font-size:22px;
    }
}


@media (max-width: 560px) { 
    
    .logo h2 {
        font-size:20px;
    }
}

nav {
    background-color:#262626;
    padding:10px;
}

nav ul {
    padding:0;
    margin:0;
}

nav li {
    list-style:none;
    display:inline-block;
    padding-left:10px;
}

nav li a {
    color:#fff;
}

nav li a:hover {
    color:#fff;
}

body {
    overflow-x:hidden;
}

/* end footer section */
    </style>

</head>

@include('errors.errors')


    <body>


    <!-- header -->
    
        <div class="logo">
        <div class="row mx-0">
            <div class="col-sm-6 text-center">
                <img src="{{asset('site/img/logo.jpg')}}" alt="" width="150" height="150" class="img-fluid p-2">
            </div>
            <div class="col-sm-6 align-self-center">
                <h2>منصة الشرقية لكرة القدم</h2>
            </div>
        </div>
        </div>
        
        <nav class="mb-5">
            <div class="container">
                <ul>
                    
                    @if(auth()->guard('admin')->user())
                    
                       @foreach(auth()->guard('admin')->user()->roles as $rol)

                  @if($rol->id == 2)
                  

                  <div class="row">
                      <div class="col-md-6 align-self-center">
                          <li><a href="http://sharqia.football">الرئيسية</a></li>
                      </div>
                

              
      <div class="col-md-6 text-left">
                      <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->guard('admin')->user()->name}}</span>
                            <img class="img-profile rounded-circle border p-1 profile-img" src="{{asset('site/img/logo.jpg')}}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in" aria-labelledby="userDropdown">

                            <a class="dropdown-item" href="{{route('teams', ['id'=>4])}}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> لوحة التحكم
                            </a>
                            <a class="dropdown-item" href="{{route('logout-site')}}">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> تسجيل الخروج
                            </a>
                        </div>
                    </li>
                    
                   

        
      
                   @else 
                  
                
                  
                       <li><a href="http://sharqia.football">الرئيسية</a></li>
                <li><a href="{{route('get.login')}}">دخول</a></li>
                
                  @endif
                  @endforeach
                  
                 
                  
                  @else 
                  
                  <li><a href="http://sharqia.football">الرئيسية</a></li>
                <li><a href="{{route('get.login')}}">دخول</a></li>
                  
                  @endif
                   </div>
                                      </div>
                
                </ul>
            </div>
        </nav>

        </div>
        
        <!-- header -->


@yield('content')

 <!-- start footer section -->
                    <section class="footer border-top text-center mt-5">
                        <!-- start footer padding -->
                        <div class="px-2">
                            <div class="footer-content pt-3 pb-3">
                                <p class="mb-0">© <script>document.write(new Date().getFullYear());</script> جميع الحقوق محفوظة <a href="{{route('site-index')}}">منصة الشرقية لكرة القدم</a></p>
                               
                            </div>
                        </div>
                        <!-- end footer padding -->
                    </section>
                    <!-- end footer section -->

@include('layouts.JS-Layout')


  @yield('js')


</body>

</html>