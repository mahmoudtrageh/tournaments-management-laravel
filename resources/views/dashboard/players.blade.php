@extends('layouts.Admin-Layout')

@section('title')

    اللاعبين
@stop

<style>
    .admins button {
        float: left;
margin: 13px 0;
padding: 7px 17px;
    }
</style>


@section('content')
    <div class="sa-content-wrapper">

        <div class="sa-content">
        
                    <!-- widget grid -->
                    <section id="widget-grid" class="">
                        <!-- row -->
                        <div class="row">
                            <!-- NEW WIDGET START -->
                            <article class="col-12">
                                <!-- Widget ID (each widget will need unique ID)-->
                                <div class="jarviswidget jarviswidget-color-darken no-padding" id="wid-id-3"
                                     data-widget-editbutton="false">
                                   
                                    <!-- widget div-->
                                    <div style="text-align: center;">
                                        <!-- Modal  to add supervisor-->
                                        <div class="modal fade" id="myModal-1" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"
                                                            style="font-weight:bold">إضافة لاعب</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align:left;">
                                                        <form action="{{route('add-player')}}" method="post" enctype="multipart/form-data">
                                                            @csrf

                                                                <div class="form-group check-team">
                                                                <input name="code" type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="أدخل رمز الفريق"
                                                                       >

                                                                                                                                    </div>



                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="اسم اللاعب"
                                                                       name="name" value="{{old('name')}}">
                                                            </div>


                                                            <div class="form-group">
                                                                <input type="date" class="form-control"
                                                                       id="exampleInputText1" placeholder="تاريخ الميلاد"
                                                                       name="birth" value="{{old('birth')}}">
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="رقم الهوية الوطنية"
                                                                       name="national_id" value="{{old('national_id')}}">
                                                            </div>

                                                            

                                                             <div class="form-group">
                                                            <label for="exampleInputEmail1">صورة شخصية</label>
                                                        <div class="wrap-custom-file inline-block mb-10">
                                                            <input type="file" class="form-control" name="img"/>
                                                           
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group">
                                                                <label for="exampleInputEmail1">صورة من اي مستند يثبت تاريخ الميلاد </label>
                                                                <input type="file" class="form-control"
                                                                       id="exampleInputText1" placeholder="صورة من اي مستند يثبت تاريخ الميلاد "
                                                                       name="file1">
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
                                        <div class="container">
                                        <div class="admins" style="margin: 45px 45px 0 0;">
                                            
                                            
                                              <!-- filters-->
                                           <form method="get" action="{{route('player.filter')}}">
                                                <section class="mt-1">
                                                    <div class="row">
                                                           
                                                                    <div class="form-group col-xl-3">
                                                                        <select name="team"
                                                                                class="team form-control">

                                                                            <option disabled selected>اختر
                                                                                الفريق
                                                                            </option>

                                                                            @foreach($teams as $team)

                                                                                <option
                                                                                        value="{{$team->id}}">{{$team->name}}
                                                                                </option>

                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group col-xl-3">
                                                                    <select name="tournament"
                                                                                class="tournament form-control">

                                                                            <option disabled selected>اختر
                                                                                البطولة
                                                                            </option>

                                                                            @foreach($tournaments as $tournament)

                                                                                <option
                                                                                        value="{{$tournament->id}}">{{$tournament->name}}
                                                                                </option>

                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    
                                                                    
                                                                     <div class="form-group col-xl-3">
                                                                    <select name="group"
                                                                                class="group form-control">

                                                                            <option disabled selected>اختر
                                                                                المجموعة
                                                                            </option>

                                                                            @foreach($groups as $group)

                                                                                <option
                                                                                        value="{{$group->id}}">{{$group->name}}
                                                                                </option>

                                                                            @endforeach
                                                                        </select>
                                                                    </div>


                                                                  

                                                                    <div class="form-group">
                                                                        <button type="submit"
                                                                                class="btn btn-outline-dark btn-min-width mr-1 mb-1 mt-0">
                                                                            <i class="la la-search"></i> بحث
                                                                        </button>
                                                                    </div>
                                                                    
                                                                      <div class="form-group col-xl-2" style="margin-top:15px;">

                                                                    
                                                                       <a class="mt-5 mx-auto" href="{{ URL::previous() }}"><i class="fas fa-sync-alt"></i></a>
                                                                       </div>
                                                                    </div>

                                                                   

                                                                  
                                                </section>
                                            </form>
                                            <!-- #filters-->
                                            
                                        


                                        @if(!in_array(2, auth()->guard('admin')->user()->roles->pluck('id')->toArray()))

                                        <button style=" margin-top: 1rem;" href="javascript:void(0);"
                                           class="btn btn-outline-dark" data-toggle="modal"
                                           data-target="#myModal-1"> إضافة</button>

                                           @endif
                                        <!-- widget content -->
                                        <div class="widget-body p-0" style="overflow-x:auto;width:100%;">
                                            <table id="dt-basic"
                                                   class="table table-striped table-bordered table-hover"
                                                   width="100%">
                                                <thead>
                                                <tr>

                                                @if(in_array(2, auth()->guard('admin')->user()->roles->pluck('id')->toArray()))

                                                    <th data-class="expand">اسم اللاعب</th>
                                                    <th data-hide="phone">المجموعة</th>
                                                    <th data-hide="phone">تاريخ الميلاد</th>
                                                    <th data-hide="phone,tablet">الاعدادات</th>
@else 

                                                    <th data-class="expand">اسم اللاعب</th>
                                                    <th data-class="expand">البطولة</th>
                                                    <th data-class="expand">الفريق</th>
                                                    <th data-hide="phone">المجموعة</th>
                                                    <th data-hide="phone">رقم الهوية</th>
                                                    <th data-hide="phone">تاريخ الميلاد</th>
                                                    <th data-class="expand">الصورة</th>
                                                    <th data-class="expand">ملف</th>
                                                    <!--<th data-class="expand">الحالة</th>-->

                                                    <th data-hide="phone,tablet">الاعدادات</th>
@endif
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    

                                                @if(in_array(2, auth()->guard('admin')->user()->roles->pluck('id')->toArray()))
                                                
                                                
                                                 @foreach(auth()->guard('admin')->user()->teams as $team)
                                            <p id="success_send"></p>

                                            @if($team->code_expired == 1)
                                            <p class="alert alert-danger">لا يمكن التسجيل في هذا الفريق الآن</p>
                                            @endif
                                            @endforeach
                                            
                                    
                                                @foreach($specific_players as $specific_player)
                                                    <tr>
                                                        <td>{{$specific_player->name}}</td>
                                                       
                                                        <td>{{$specific_player->groups->name}}</td>



                                                        <td>{{$specific_player->birth}}</td>

                                                    
                                        
                                                        <td>
                                                            <button class="btn btn-outline-dark" data-toggle="modal"
                                                                    data-target="#myModal-s-2{{$specific_player->id}}"
                                                                    style="margin-bottom:10px;"><i
                                                                        class="fa fa-edit"></i></button>
                                                            <button class="btn btn-danger" data-toggle="modal"
                                                                    data-target="#myModal-s-3{{$specific_player->id}}"
                                                                    style="margin-bottom:10px;"><i
                                                                        class="fa fa-trash"></i></button>
                                                        </td>
                                                    </tr>

                                                @endforeach
                                                
                                                @foreach(auth()->guard('admin')->user()->teams as $team)
                                                <button data-toggle="modal"
                                                                    data-target="#myModal-send" class="btn btn-outline-dark">إرسال</button>
                                                 
                                                
                                                 
                                                 
                                                 <!-- Modal to delet supervisor -->
<div class="modal fade" id="myModal-send" tabindex="-1"
     role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="exampleModalLabel"
                    style="font-weight:bold">إرسال</h5>
                <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"
                 style="text-align:right;">
              <strong> سيتم تعطيل التسجيل لأي لاعب أخر بمجرد الإرسال </strong>
            </div>

      
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-default"
                            data-dismiss="modal">إلغاء
                    </button>
                    <button uid="{{$team->id}}" type="submit"
                            class="expire btn btn-outline-dark" class="close"
                        data-dismiss="modal" aria-label="Close">إرسال
                    </button>
                </div>
        </div>
    </div>
</div>
                                                 
                                                 
                                                @endforeach
                                                <span>عدد اللاعبين : <span>{{count($specific_players)}}</span></span>

                                                @else 

                                                
                                                @foreach($players as $player)
                                                    <tr>
                                                        <td>{{$player->name}}</td>
                                                        
                                                        @foreach($tournaments as $tournament)

                                                        @endforeach

                                                        <td>{{$player->tournaments->name}}</td>


                                                        <td>{{$player->teams->name}}</td>



                                                        <td>{{$player->groups->name}}</td>


                                                        <td>{{$player->national_id}}</td>

                                                        <td>{{$player->birth}}</td>

                                                        <td><img data-toggle="modal" data-target=".bd-example-modal-lg" style="cursor:pointer;" height="70" width="100" src="{{asset('public/images/img/'.$player->img)}}"></td>
                                                        
                                                        
                                                        <!-- Large modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <img data-toggle="modal" data-target=".bd-example-modal-lg" class="img-fluid" src="{{asset('public/images/img/'.$player->img)}}">
    </div>
  </div>
</div>
                                                        
                                                        

                                                        <td><a href="{{asset('public/files/'.$player->file1)}}">{{$player->file1}}</a></td>
            
                                                       
                                                        <!--<td style="border:1px solid #ccc;">-->
                                                        
                                                        <!--    <select class="form-control stutus" uid="{{$player->id}}">-->
                                                        <!--        <option @if($player->status) selected-->
                                                        <!--                @endif value="0">-->
                                                        <!--            مسجل-->
                                                        <!--        </option>-->
                                                        <!--        <option @if(!$player->status) selected-->
                                                        <!--                @endif value="1">-->
                                                        <!--             محذوف-->
                                                        <!--        </option>-->

                                                        <!--        <option @if(!$player->status) selected-->
                                                        <!--                @endif value="2">-->
                                                        <!--             مقبول-->
                                                        <!--        </option>-->
                                                        <!--    </select>-->
                                                        <!--</td>-->
                                        
                                                        <td>
                                                            <button class="btn btn-outline-dark" data-toggle="modal"
                                                                    data-target="#myModal-2{{$player->id}}"
                                                                    style="margin-bottom:10px;"><i
                                                                        class="fa fa-edit"></i></button>
                                                            <button class="btn btn-danger" data-toggle="modal"
                                                                    data-target="#myModal-3{{$player->id}}"
                                                                    style="margin-bottom:10px;"><i
                                                                        class="fa fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                    </tbody>

                                            </table>
                                            
                                            

                                           
                                        </div>
                                        
                                        @endif
                                        <!-- end widget content -->

                                        </div>

                                      
                                    <!-- end widget div -->

                                </div>
                                <!-- end widget -->

                            </article>
                            <!-- WIDGET END -->

                        </div>

                        <!-- end row -->

                        <!-- end row -->

                    </section>
                    <!-- end widget grid -->

                </div>
            </div>
        </div>
    </div>
  
    @if(in_array(2, auth()->guard('admin')->user()->roles->pluck('id')->toArray()))
                                    
       @foreach($specific_players as $specific_player)

       <!-- Modal  to Edit supervisor-->
<div class="modal fade" id="myModal-s-2{{$specific_player->id}}" tabindex="-1"
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
            <div class="modal-body"
                 style="text-align:left;">
                <form action="{{route('edit-specific-player',['player_id'=>$specific_player->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                 
              
    <div class="form-group check-team-edit">

    <label>الرمز:  
    
    @if(empty($specific_player->teams->code))
    
    <span>هذا الفريق غير مفعل</span>
    
    @else 
    
    {{$specific_player->teams->code}}
    
    @endif
    
    </label>
                                                        <input type="text" class="form-control"
                                                               id="exampleInputText1" name="code"
                                                               >
                                                             
                                                            </div>



                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">اسم اللاعب</label>
                                                        <input type="text" class="form-control"
                                                               id="exampleInputText1"
                                                               name="name" value="{{$specific_player->name}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">رقم الهوية الوطنية</label>
                                                        <input type="text" class="form-control"
                                                               id="exampleInputText1"
                                                               name="national_id" value="{{$specific_player->national_id}}">
                                                    </div>

                                                    <div class="form-group check-group-edit">
                                                        <label for="exampleInputEmail1">تاريخ الميلاد</label>
                                                        <input type="date" class="form-control"
                                                               id="exampleInputText1"
                                                               name="birth" value="{{$specific_player->birth}}">
                                                    

                                                    
                                                            </div>

                                                         

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">صورة من اي مستند يثبت تاريخ الميلاد </label>
                                                        <input type="file" class="form-control"
                                                               id="exampleInputText1" value="{{$specific_player->file1}}"
                                                               name="file1">

                                                    </div>

                                                   


                                                    <div class="form-group">
                                                                                                                <label for="exampleInputEmail1">صورة شخصية</label>
                    <div class="wrap-custom-file inline-block mb-10">
                        <input type="file" class="form-control" name="img" id="imagesecond{{$specific_player->id}}"
                       />
                        <label for="imagesecond{{$specific_player->id}}" class="file-ok" style="background-image: url({{asset('images/img/'.$specific_player->img)}});">
                        </label>
                    </div>
                </div>



                    <div class="modal-footer"
                         style="margin-top:1rem;">
                        <button type="button"
                                class="btn btn-default"
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

        <!-- Modal to delet supervisor -->
        <div class="modal fade" id="myModal-s-3{{$specific_player->id}}" tabindex="-1"
             role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="exampleModalLabel"
                            style="font-weight:bold">حذف</h5>
                        <button type="button" class="close"
                                data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"
                         style="text-align:right;">
                      <strong> confirm delete </strong>
                    </div>

                    <form action="{{route('delete-specific-player',['player_id'=>$specific_player->id])}}" method="post">
                        @csrf
                        <div class="modal-footer">
                            <button type="button"
                                    class="btn btn-default"
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


    @endforeach

    @else  


    @foreach($players as $player)


<!-- Modal  to Edit supervisor-->
<div class="modal fade" id="myModal-2{{$player->id}}" tabindex="-1"
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
            <div class="modal-body"
                 style="text-align:left;">
                <form action="{{route('edit-player',['player_id'=>$player->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                 
              
    <div class="form-group check-team-edit">

    <label>الرمز:  
    
    @if(empty($player->teams->code))
    
    <span>هذا الفريق غير مفعل</span>
    
    @else 
    
    {{$player->teams->code}}
    
    @endif
    
    </label>
                                                        <input type="text" class="form-control"
                                                               id="exampleInputText1" name="code"
                                                               >
                                                             
                                                            </div>



                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">اسم اللاعب</label>
                                                        <input type="text" class="form-control"
                                                               id="exampleInputText1"
                                                               name="name" value="{{$player->name}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">رقم الهوية الوطنية</label>
                                                        <input type="text" class="form-control"
                                                               id="exampleInputText1"
                                                               name="national_id" value="{{$player->national_id}}">
                                                    </div>

                                                    <div class="form-group check-group-edit">
                                                        <label for="exampleInputEmail1">تاريخ الميلاد</label>
                                                        <input type="date" class="form-control"
                                                               id="exampleInputText1"
                                                               name="birth" value="{{$player->birth}}">
                                                    

                                                    
                                                            </div>

                                                         

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">صورة من اي مستند يثبت تاريخ الميلاد </label>
                                                        <input type="file" class="form-control"
                                                               id="exampleInputText1" value="{{$player->file1}}"
                                                               name="file1">

                                                    </div>

                                                   


                                                    <div class="form-group">
                                                                                                                <label for="exampleInputEmail1">صورة شخصية</label>
                    <div class="wrap-custom-file inline-block mb-10">
                        <input type="file" class="form-control" name="img" id="imagesecond{{$player->id}}"
                        />
                        <label for="imagesecond{{$player->id}}" class="file-ok" style="background-image: url({{asset('images/img/'.$player->img)}});">
                        </label>
                    </div>
                </div>



                    <div class="modal-footer"
                         style="margin-top:1rem;">
                        <button type="button"
                                class="btn btn-default"
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


<!-- Modal to delet supervisor -->
<div class="modal fade" id="myModal-3{{$player->id}}" tabindex="-1"
     role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="exampleModalLabel"
                    style="font-weight:bold">حذف</h5>
                <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"
                 style="text-align:right;">
              <strong> confirm delete </strong>
            </div>

            <form action="{{route('delete-player',['player_id'=>$player->id, 'player_id' => $player->id])}}" method="post">
                @csrf
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-default"
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

@endforeach
@endif  

@stop

@section('js')


<script>

        $(document).on("click", ".expire", function () {

            var id = $(this).attr("uid");
            var token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ route('expire-update-status') }}",
                type: "post",
                dataType: "json",
                data: {id: id, _token: token},
                success: function (data) {
                    if (data.status == "ok") {
                                                alert("تم  إرسال الفريق بنجاح");

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