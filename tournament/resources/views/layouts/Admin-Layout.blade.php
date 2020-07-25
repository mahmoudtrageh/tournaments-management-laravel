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
    
    <style>
        .modal-header .close {
            margin:0;
            background-color: #fcb040;
            padding: 5px;
        }
        
        .modal-content {
            height:600px;
            overflow-y:scroll;
        }
    </style>

</head>

@include('errors.errors')

<body>

    <!-- start Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="mainmenu navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  @foreach(auth()->guard('admin')->user()->roles as $rol)
  @if($rol->id == 1)

    <!-- Sidebar - Brand -->
  <a class="text-center d-flex" href="{{route('dashboard-index')}}">
    <div class="sidebar-brand-icon">
      <img src="{{asset('site/img/logo.jpg')}}" class="img-fluid mb-3" style="width:40%;">
      <h3 class="text-white pt-3 pb-3">منصة الشرقية لكرة القدم</h3>
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
    <a class="nav-link collapsed" href="{{route('seasons')}}"  data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-fire"></i>
      <span>المواسم</span>
    </a>
   
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('all-tournaments')}}"  data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-trophy"></i>
      <span>البطولات</span>
    </a>
   
  </li>

    <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('all-teams')}}"  data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-users"></i>
      <span>الفرق</span>
    </a>
   
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link" href="{{route('players-all')}}">
    <i class="far fa-futbol"></i>
      <span>اللاعبين</span></a>
  </li>


  <!-- Nav Item - Tables -->
  <!-- <li class="nav-item">
    <a class="nav-link" href="{{route('punishments')}}">
    <i class="fas fa-cog"></i>
      <span>العقوبات</span></a>
  </li> -->

<!-- Nav Item - Tables -->
  <!-- <li class="nav-item">
    <a class="nav-link" href="{{route('news')}}">
    <i class="fas fa-cog"></i>
      <span>الأخبار</span></a>
  </li> -->

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link" href="{{route('settings')}}">
    <i class="fas fa-cog"></i>
      <span>الاعدادات</span></a>
  </li>
  

   <!-- dropdown menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-users-cog"></i>
                    <span class="pr-1">التصميم</span>
                    <i class="fas fa-caret-left"></i>
                </a>
                <ul class="submenu">
                    <li><a href="">أيقونات</a></li>
                    <li><a href="">ألوان</a></li>
                </ul>
            </li> -->
            <!-- dropdown menu -->
  
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->



<!-- Content Wrapper -->
<div id="content-wrapper" class="">

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

                    <!-- Notifications -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="noticlick nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">20</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-left shadow animated--grow-in overflow-auto" aria-labelledby="alertsDropdown">
                            <h2 class="dropdown-header">
                                الاشعارات
                            </h2>

                            <a class="dropdown-item d-flex align-items-center" href="#">

                                <div>
                                    <div class="border noti p-2 px-3 mb-2">
                                        <span><b>قام محمود طه </b></span>
                                        <p class="m-1">
                                            هذا مثال علي نص إشعار جديد ومميز حدث بعد
                                        </p>
                                        <span><i class="far fa-clock mr-2"></i><b>15/2020 </b></span>
                                    </div>

                                    <div class="border noti p-2 px-3 mb-2">
                                        <span><b>قام محمود طه </b></span>
                                        <p class="m-1">
                                            هذا مثال علي نص إشعار جديد ومميز حدث بعد
                                        </p>
                                        <span><i class="far fa-clock mr-2"></i><b>15/2020 </b></span>
                                    </div>

                                    <div class="border noti p-2 px-3 mb-2">
                                        <span><b>قام محمود طه </b></span>
                                        <p class="m-1">
                                            هذا مثال علي نص إشعار جديد ومميز حدث بعد
                                        </p>
                                        <span><i class="far fa-clock mr-2"></i><b>15/2020 </b></span>
                                    </div>

                                    <div class="border noti p-2 px-3 mb-2">
                                        <span><b>قام محمود طه </b></span>
                                        <p class="m-1">
                                            هذا مثال علي نص إشعار جديد ومميز حدث بعد
                                        </p>
                                        <span><i class="far fa-clock mr-2"></i><b>15/2020 </b></span>
                                    </div>

                                </div>
                            </a>

                            <a class="dropdown-item text-center" href="#">اظهار كل الاشعارات</a>
                        </div>
                    </li>

                    <!-- end notifications -->

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->guard('admin')->user()->name}}</span>
                            <img class="img-profile rounded-circle border p-1" src="{{asset('site/img/logo.jpg')}}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in" aria-labelledby="userDropdown">

                            <a class="dropdown-item" href="{{route('settings')}}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> الحساب
                            </a>
                            <a class="dropdown-item" href="{{route('logout')}}">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> تسجيل الخروج
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar Navbar -->
  @elseif($rol->id == 3 && !in_array(1, auth()->guard('admin')->user()->roles->pluck('id')->toArray()))

@foreach(auth()->guard('admin')->user()->tournaments as $tour)

    <!-- Sidebar - Brand -->
  <a class="text-center d-flex">
    <div class="sidebar-brand-icon">
      <img src="{{asset('public/images/img/'. $tour->logo)}}" class="img-fluid mb-3" style="width:40%;">
      <p class="text-white pt-3 pb-3">{{$tour->name}}</p>
    </div>
  </a>

 <div class="container">
  <button href="javascript:void(0);" class="btn btn-outline-dark mt-4 mb-4 w-100" data-toggle="modal" data-target="#myModal2-img"> تغيير الصورة</button>
                 </div>                          
                                           
<!-- Modal  to Edit supervisor-->
        <div class="modal fade" id="myModal2-img" tabindex="-1"
             role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="exampleModalLabel"
                            style="font-weight:bold">تعديل</h5>
                        <button type="button" class="close"
                                data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                                                     
                                  <form action="{{route('change-image-tournament',['tournament_id'=>$tour->id])}}" method="post" enctype="multipart/form-data" novalidate>
                                                            @csrf


                            <div class="form-group">
                                                            <label for="exampleInputEmail1">لوجو البطولة</label>
                                                        <div class="wrap-custom-file inline-block mb-10">
                                                            <input type="file" class="form-control" name="logo"/>
                                                           
                                                        </div>
                                                        </div>
                                                        

                                                               
                              
                                    <div class="modal-footer" style="margin-top:1rem;">
                                                                <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">إلغاء
                                                                </button>
                                                                <button type="submit"
                                                                        class="btn btn-outline-dark">حفظ
                                                                </button>
                                                            </div>
                                                        </form>
                                                    
                                                    </div>
                                            
                                        </div>
                                        </div>        

                                        </div>


  @endforeach

  
  <!-- Divider -->
  <hr class="sidebar-divider my-0">

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
<div id="content-wrapper" class="">

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

@elseif($rol->id == 2 && !in_array(1, auth()->guard('admin')->user()->roles->pluck('id')->toArray()))



@foreach(auth()->guard('admin')->user()->teams as $tea)

    <!-- Sidebar - Brand -->
  <a class="text-center d-flex" href="{{route('dashboard-index')}}">
    <div class="sidebar-brand-icon">
      <img src="{{asset('public/images/img/'. $tea->logo)}}" class="w-100 mb-3" width="300" height="200">
      <p class="text-white pt-3 pb-3">{{$tea->name}}</p>
    </div>
  </a>
  
  <div class="container">
  <button href="javascript:void(0);" class="btn btn-outline-dark mt-4 mb-4 w-100" data-toggle="modal" data-target="#myModal-img"> تغيير الصورة</button>
                 </div>                          
                                           
<!-- Modal  to Edit supervisor-->
        <div class="modal fade" id="myModal-img" tabindex="-1"
             role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="exampleModalLabel"
                            style="font-weight:bold">تعديل</h5>
                        <button type="button" class="close"
                                data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                                                     
                                  <form action="{{route('change-image',['team_id'=>$tea->id])}}" method="post" enctype="multipart/form-data" novalidate>
                                                            @csrf


                            <div class="form-group">
                                                            <label for="exampleInputEmail1">لوجو الفريق</label>
                                                        <div class="wrap-custom-file inline-block mb-10">
                                                            <input type="file" class="form-control" name="logo"/>
                                                           
                                                        </div>
                                                        </div>
                                                        

                                                               
                              
                                    <div class="modal-footer" style="margin-top:1rem;">
                                                                <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">إلغاء
                                                                </button>
                                                                <button type="submit"
                                                                        class="btn btn-outline-dark">حفظ
                                                                </button>
                                                            </div>
                                                        </form>
                                                    
                                                    </div>
                                            
                                        </div>
                                        </div>        

                                        </div>
                                     
  
  

  @endforeach

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

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
<div id="content-wrapper" class="">

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

@endforeach



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


            // datatable 
        $(document).ready(function() {
            $('#files_list').DataTable({
                "aLengthMenu": [
                    [5, 10, 25, -1],
                    [5, 10, 25, "All"]
                ],
                "iDisplayLength": 10,

                "language": {
                    "sProcessing": "جارٍ التحميل...",
                    "sLengthMenu": "أظهر _MENU_ ",
                    "sZeroRecords": "لم يعثر على أية سجلات",
                    "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                    "sInfoPostFix": "",
                    "sSearch": "بحث:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "الأول",
                        "sPrevious": "السابق",
                        "sNext": "التالي",
                        "sLast": "الأخير"
                    }
                }
            });
        });

        // datatable

</script>



</body>

</html>