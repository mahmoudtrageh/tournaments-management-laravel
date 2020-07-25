@extends('layouts.Site-Layout') @section('title')الرئيسية@stop @section('content')



<!-- start about  -->
<div class="about-us" id="home">



@if(count($all_seasons) == 0)

<p class="p-3 mb-2 bg-danger text-white text-center mt-3 mb-5">لا يوجد بطولات متاحة حاليًا</p>

<div class="admins">
    <h1 class="alert alert-success messagesub text-center" style="background-color:#212529;color:#fff;"><a class="nav-link btn btn-outline-dark text-white" href="{{route('get.login')}}">رابطة الحواري</a></h1>
        
        <!-- widget content -->
        <div class="widget-body p-0">
            <table id="dt-basic" class="table table-striped table-bordered table-hover" width="100%">
                                                <thead>
                                                <tr>
                                                    <th data-class="expand">الاسم</th>

                                                    <th data-hide="phone">تاريخ البداية</th>
                                                    <th data-hide="phone,tablet">تاريخ النهاية</th>
                                                    <th data-class="expand">تسجيل</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                
                                                   

                                                </tbody>
                                            </table>

                                        </div>
                                        <!-- end widget content -->
                                      </div>

                                    
@else

<!-- start admin -->
<div class="admins">
@foreach($all_seasons as $all_season)
    <h3 class="alert alert-success messagesub text-center" style="background-color:#212529;color:#fff;">رابطة الحواري - {{$all_season->name}}<h3>
        @endforeach
        <!-- widget content -->
        <div class="widget-body p-0">
            <table id="dt-basic" class="table table-striped table-bordered table-hover" width="100%">
                                                <thead>
                                                <tr>
                                                    <th data-class="expand">الاسم</th>

                                                    <th data-hide="phone">تاريخ البداية</th>
                                                    <th data-hide="phone,tablet">تاريخ النهاية</th>
                                                    <th data-class="expand">تسجيل</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                
                                                @foreach($all_tournaments as $all_tournament)
                                                    <tr>
                                                        <td>{{$all_tournament->name}}</td>
                                                      
                                                        <td>{{$all_tournament->start}}</td>
                                                        <td>{{$all_tournament->end}}</td>
                                                        
                                                        @if(auth()->guard('admin')->user())
                                                        
                                                        
                                                        <td> <a class="register" rid="{{$all_tournament->id}}" href="#"><button style=" margin-top: 1rem;" 
                                           class="btn btn-outline-dark"
                                           >سجل</button></a></td>
                                           
                                                       @else 
                                                       
                                                        <td> <a href="{{route('site-login', ['id'=>$all_tournament->id])}}"><button style=" margin-top: 1rem;" 
                                           class="btn btn-outline-dark"
                                           >سجل</button></a></td>
                                           
                                                       @endif
                                                       
                                                       
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>

                                        </div>
                                        <!-- end widget content -->
                                       </div>
 
                                        <!-- end admins -->
                                        
                                                           @if(auth()->guard('admin')->user())
                                            
                                              @foreach(auth()->guard('admin')->user()->roles as $rol)

                  @if($rol->id == 2)
                  
                                             <div class="row">
                                                 
                                                 </div>
                                                 
                                                 
                                                 @else 
                                                 
                                        <div class="row">
                                       
                                        <div class="player w-50 d-inline-block mb-2 p-3 bg-white rounded">
 <i class="fas fa-user-plus mr-3" style="font-size: 30px;color:#212529;"></i>
                <a href="{{route('site-login-second')}}"><button
                    class="btn btn-outline-dark" >تسجيل فريق</button></a>

                  </div>
                                        

                <div class="player w-50 p-3 mb-5 d-inline-block bg-white rounded">

                <i class="fas fa-user-plus mr-3" style="font-size: 30px;color:#212529;"></i>

                <a href="{{route('player-login')}}"><button
                    class="btn btn-outline-dark " > تسجيل لاعب</button></a>

                  </div>
</div>

@endif

@endforeach








@else 

  <div class="row">
                                       
                                        <div class="player w-50 d-inline-block mb-2 p-3 bg-white rounded">
 <i class="fas fa-user-plus mr-3" style="font-size: 30px;color:#212529;"></i>
                <a href="{{route('site-login-second')}}"><button
                    class="btn btn-outline-dark" >تسجيل فريق</button></a>

                  </div>
                                        

                <div class="player w-50 p-3 mb-5 d-inline-block bg-white rounded">

                <i class="fas fa-user-plus mr-3" style="font-size: 30px;color:#212529;"></i>

                <a href="{{route('player-login')}}"><button
                    class="btn btn-outline-dark " > تسجيل لاعب</button></a>

                  </div>
</div>


@endif
                                        
@endif

</div>


@stop

 @section('js')


    <script>

setTimeout(fade_out, 5000);

    function fade_out() {
        $("#checker").fadeOut().empty();
    }

            </script>




<script>

        $(document).on("click", ".expire", function () {

            var id = $(this).attr("uid");
            var token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ route('expire-update-status-index') }}",
                type: "post",
                dataType: "json",
                data: {id: id, _token: token},
                success: function (data) {
                    if (data.status == "ok") {
                            $('#success_send').html('تم إرسال الفريق بنجاح' );
                    }

                    if (data.status !== "ok") {
                        alert("ERROR");
                    }

                },
                error: function () {
                    alert("ERROR");
                }
            })
        })
        
    
    $(document).on("click", ".register", function () {
            var id = $(this).attr("rid");
            var token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{route('team-register-live')}}",
                type: "post",
                dataType: "json",
                data: {id: id, _token: token},
                success: function (data) {
                   if (data.status == "ok") {
                       alert("تمت عملية تسجيل الفريق");
                        
                       
                   } else {
                        alert("هذا الفريق مسجل مسبقًا في تلك البطولة");
                    }

                },
                error: function () {
                    alert("خطأ");
                }
            })
        })
    
        
    </script>
     
@stop
