@extends('layouts.Site-Layout') @section('title')الرئيسية@stop @section('content')
    
    
    
<!-- start about  -->
<div class="about-us" id="home">
    

<!-- main tournament -->

@if(count($main_all_tournaments) == 0)


<p class="p-3 mb-2 bg-danger text-white text-center mt-3 mb-5">لا يوجد بطولات متاحة حاليًا</p>


<div class="admins">
    <h1 class="alert alert-success messagesub text-center" style="background-color:#212529;color:#fff;"><a class="nav-link btn btn-outline-dark text-white" href="{{route('get.login')}}">منصة البطولات</a></h1>

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

<div class="admins">
    <h3 class="alert alert-success messagesub text-center" style="background-color:#212529;color:#fff;">البطولات المتاحة</h3>
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
                                                
                                                @foreach($main_all_tournaments as $main_all_tournament)
                                                    <tr>
                                                        <td>{{$main_all_tournament->name}}</td>
                                                      
                                                        <td>{{$main_all_tournament->start}}</td>
                                                        <td>{{$main_all_tournament->end}}</td>
                                                        <td> <a href="{{route('site-login', ['id'=>$main_all_tournament->id])}}"><button style=" margin-top: 1rem;" 
                                           class="btn btn-outline-dark"
                                           >سجل</button></a></td>
                                                       
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>

                                        </div>
                                        <!-- end widget content -->

                                        </div>

                                        <!-- end admins -->


                                       <div class="player p-3 mb-5 bg-white rounded">

                <i class="fas fa-user-plus mr-3" style="font-size: 30px;color:#212529;"></i>

                <a href="{{route('player-login')}}"><button
                    class="btn btn-outline-dark w-50" > تسجيل لاعب</button></a>

                  </div>

                             

@endif


<!-- main tournament end -->

 
</div>

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
    </script>
     
@stop
