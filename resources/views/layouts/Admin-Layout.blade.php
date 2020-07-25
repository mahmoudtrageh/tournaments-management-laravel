<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  @include('layouts.CSS-Layout')



</head>

@include('errors.errors')


<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">



  @if(adminPermissions(1))
  
    <!-- Sidebar - Brand -->
  <a class="text-center d-flex" href="{{route('dashboard-index')}}">
    <div class="sidebar-brand-icon">
      <img src="{{asset('site/img/logo.jpeg')}}" class="img-fluid mb-3" style="width:40%;">
    </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">
                
  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="{{route('dashboard-index')}}">
    <i class="fas fa-home"></i>
      <span>الرئيسية</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('admins')}}"  data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-users-cog"></i>
      <span>المشرفين</span>
    </a>
    
  </li>


  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('tournaments')}}"  data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-trophy"></i>
      <span>البطولات</span>
    </a>
   
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link" href="{{route('players-all')}}">
    <i class="far fa-futbol"></i>
      <span>اللاعبين</span></a>
  </li>
  
    <!-- Nav Item - Tables -->
    <li class="nav-item">
    <a class="nav-link" href="{{route('team-activity')}}">
    <i class="fas fa-users"></i>
      <span>نشاط الفرق</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link" href="{{route('settings')}}">
    <i class="fas fa-cog"></i>
      <span>الاعدادات</span></a>
  </li>
  
  
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

     

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
          </a>
        

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="noticlick nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter">{{count(notification())}}</span>
          </a>
          <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-left shadow animated--grow-in overflow-auto" aria-labelledby="alertsDropdown">
            <h2 class="dropdown-header">
                                الاشعارات
                            </h2>
            @foreach(auth()->guard('admin')->user()->unreadnotifications as $noti)

              <a class="dropdown-item d-flex align-items-center" href="#">


              <div>
                <div class="border noti p-2 px-3 mb-2">
                    <span><b>قام {{$noti->data['name']}} </b></span>
                    <p class="m-1">
                        {{$noti->data['message']}}
                    </p>
                    <span><i class="far fa-clock mr-2"></i><b>{{$noti->data['created_at']}} </b></span>
                </div>

            </a>
            @endforeach

           
            <a class="dropdown-item text-center" href="#">اظهار كل الاشعارات</a>
          </div>
        </li>

   
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">@if (auth()->guard('admin')->user())  {{auth()->guard('admin')->user()->name}} @endif</span>
            <img class="img-profile rounded-circle" src="{{asset('site/img/logo.jpeg')}}">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in" aria-labelledby="userDropdown">
                       <a class="dropdown-item" href="{{route('logout')}}">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              تسجيل الخروج
            </a>
          </div>
        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->

@else 


   <!-- Nav Item - Tables -->
   <li class="nav-item">
    <a class="nav-link" href="{{route('settings')}}">
    <i class="fas fa-cog"></i>
      <span>الاعدادات</span></a>
  </li>
  
  
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

     

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
          </a>
        

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="noticlick nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter">{{count(notification())}}</span>
          </a>
          <!-- Dropdown - Alerts -->
          <div class="dropdown-list dropdown-menu dropdown-menu-left shadow animated--grow-in" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
              الاشعارات
            </h6>
            @foreach(auth()->guard('admin')->user()->unreadnotifications as $noti)

            <a class="dropdown-item d-flex align-items-center" href="#">
              <div class="mr-3">
                <div class="icon-circle bg-primary">
                  <i class="fas fa-file-alt text-white"></i>
                </div>
              </div>
              <div>
                <div class="small text-gray-500">{{$noti->data['created_at']}}</div>
                <span class="font-weight-bold">{{$noti->data['message']}} - <b>{{$noti->data['name']}}</b></span>
              </div>
            </a>
            @endforeach

           
            <a class="dropdown-item text-center small text-gray-500" href="#">اظهار كل الاشعارات</a>
          </div>
        </li>

   
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">@if (auth()->guard('admin')->user())  {{auth()->guard('admin')->user()->name}} @endif</span>
            
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in" aria-labelledby="userDropdown">
                       <a class="dropdown-item" href="{{route('logout')}}">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              تسجيل الخروج
            </a>
          </div>
        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->

@endif

  


@yield('content')


@include('layouts.JS-Layout')



  @yield('js')

<script>
  setTimeout(fade_out, 5000);

function fade_out() {
    $("#checker").fadeOut().empty();
}


$(document).on("click", ".noticlick", function () {
            var token = "{{ csrf_token() }}";

            $.ajax({
                url: "{{ route('read.notifications') }}",
                type: "post",
                dataType: "json",
                data: {_token: token},
                success: function (data) {
                    console.log(data.status);
                    if (data.status !== "ok") {
                        alert("ERROR");
                    }

                },
                error: function () {
                    alert("ERROR");
                }
            })
        })

</script>



</body>

</html>