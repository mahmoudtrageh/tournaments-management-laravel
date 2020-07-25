@extends('layouts.Admin-Layout')

@section('title')

    الفرق
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
                                                            style="font-weight:bold">إضافة فريق</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align:left;">
                                                        
                                                        
                                                        
                                                         @foreach(auth()->guard('admin')->user()->roles as $rol)
                                                     @if($rol->id == 2 ) 
                                                     
                                                     
                                                     <form action="{{route('add-team-inner')}}" method="post">
                                                            @csrf

                                                            


                                                                <select class="form-control stutuss" name="tournament_id">
                                                                    
<option disabled selected>اختر البطولة</option>
@foreach($tournaments as $tournament)

                                                                <option value="{{$tournament->id}}" >{{$tournament->name}}</option>
                                                                
                                                                @endforeach

                                                            </select>
                            
                                                         
           

                                                            <div class="form-group mt-5">
                                                                <input type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="اسم الفريق"
                                                                       name="name" value="{{old('name')}}">
                                                            </div>

                                            <div class="input-group col-sm-4">
                                                <div class="input-group-prepend">
                                                        <input type="hidden" value="2"
                                                               name="roles[]"
                                                               aria-label="Checkbox for following text input"
                                                              
                                                        >

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
                                                        
                                                     
                                                     @else 
                                                        
                                                        
                                                        <form action="{{route('add-team')}}" method="post">
                                                            @csrf

                                                            

                                                                <input type="hidden" name="tournament_id" value="{{$id}}"/>

                                                                @if(count($groups) > 1)


                                                                <label
                                                                    for="exampleInputPassword1 pt-4" class="w-100 text-right mb-4 d-block"> المجموعات</label>
                                                            <div class="row mb-4">

                                                            @foreach($groups as $group)
                                            <div class="input-group col-sm-6">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <input type="checkbox" value="{{$group->id}}" id="add{{$group->id}}"
                                                               name="groups[]"
                                                               aria-label="Checkbox for following text input"
                                                               @if(old('groups'))
                                                               @foreach(old('groups') as $old_group)
                                                               @if($old_group == $group->id)
                                                               checked
                                                                @endif
                                                                @endforeach
                                                                @endif
                                                        >
                                                    </div>
                                                </div>
                                                <label for="message-text" class="col-form-label pl-2">{{$group->name}}</label>
                                            </div>
                                        @endforeach

                                                            </div>

                                                            @else 


                                                          
                                                            <div class="row mb-4">

                                                            @foreach($groups as $group)
                                            <div class="input-group col-sm-6">
                                                        <input type="hidden" value="{{$group->id}}" id="add{{$group->id}}"
                                                               name="group_id"
                                                              
                                                        >
                                            </div>
                                        @endforeach

                                                            </div>


                                                            @endif
           

                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="اسم الفريق"
                                                                       name="name" value="{{old('name')}}">
                                                            </div>

                                            <div class="input-group col-sm-4">
                                                <div class="input-group-prepend">
                                                        <input type="hidden" value="2"
                                                               name="roles[]"
                                                               aria-label="Checkbox for following text input"
                                                              
                                                        >

                                                </div>

                                            </div>


                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="اسم المدير"
                                                                       name="manager_name" value="{{old('manager_name')}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="Email" class="form-control"
                                                                       id="exampleInputEmail1" placeholder="البريد الإلكتروني"
                                                                       name="manager_email" value="{{old('manager_email')}}">
                                                            </div>
                                                            <div class="form-group">
                                                                
                                                                <input type="password" class="form-control"
                                                                       id="exampleInputPassword1" autocomplete="off"
                                                                       placeholder="كلمة المرور" name="password">
                                                            </div>

                                                            <div class="form-group">
                                                               
                                                                <input type="number" class="form-control"
                                                                       id="exampleInputPassword1" autocomplete="off"
                                                                       placeholder="رقم الجوال" name="mobile_number">
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
                                                        
                                                        @endif
                                                        @endforeach
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                        <div class="admins" style="margin: 45px 45px 0 0;">
                                        <button style=" margin-top: 1rem;" href="javascript:void(0);"
                                           class="btn btn-outline-dark" data-toggle="modal"
                                           data-target="#myModal-1"> إضافة</button>
                                        <!-- widget content -->
                                        <div class="widget-body p-0 table-responsive">
                                            <table id="dt-basic"
                                                   class="table table-striped table-bordered table-hover"
                                                   width="100%">
                                                <thead>
                                                <tr>
                                                    
                                                    @foreach(auth()->guard('admin')->user()->roles as $rol)
                                                     @if($rol->id == 2 ) 
          
                                                    <th data-class="expand">اسم الفريق</th>
                                                    <th data-hide="phone,tablet">اسم المدير</th>
                                                    <th data-hide="phone,tablet">البريد الإلكتروني</th>
                                                    <th data-hide="phone,tablet">رقم الجوال</th>
                                                     <th data-hide="phone,tablet">اللاعبين</th>

                                    @else 
                                    
                                    <th data-class="expand">اسم الفريق</th>
                                                    <th data-hide="phone,tablet">اسم المدير</th>
                                                    <th data-hide="phone,tablet">البريد الإلكتروني</th>
                                                    <th data-hide="phone,tablet">رقم الجوال</th>
                                                    <th data-hide="phone">الحالة</th>
                                                                                         <th data-hide="phone,tablet">اللاعبين</th>
                                                                                         
                                      @endif

                                    @endforeach
                                    
                                                    <th data-hide="phone,tablet">الاعدادات</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                     
                                                
                                                @foreach($teams as $team)
                                                    <tr>
                                                        
                                                         @foreach(auth()->guard('admin')->user()->roles as $rol)
                                                        @if($rol->id == 2 ) 
                                                        
                                                        <td>{{$team->name}}</td>

                                                        <td>{{$team->manager_name}}</td>
                                                        <td>{{$team->manager_email}}</td>
                                                        <td>{{$team->mobile_number}}</td>
                                                         <td >
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button type="button" class="btn btn-outline-dark"><a class="text-decoration-none text-primary" href="{{route('players',['id'=>$team->id])}}">اضغط هنا</a></button>
                                                        </div>
                                                    </div>

                                                   
                                                    </td>
                                                        
                                                        @else 
                                                        
                                                         <td>{{$team->name}}</td>

                                                        <td>{{$team->manager_name}}</td>
                                                        <td>{{$team->manager_email}}</td>
                                                        <td>{{$team->mobile_number}}</td>
                                                        <td style="border:1px solid #ccc;">


                                                            <select class="form-control stutus" uid="{{$team->id}}">

                                                                <option @if($team->status) selected
                                                                         @endif value="1">
                                                                    مفعل
                                                                </option>
                                                                <option @if(!$team->status) selected
                                                                        @endif value="0">
                                                                     غير مفعل
                                                                </option>

                                                            </select>


                                                        </td>
                                                        
                                                         <td >
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button type="button" class="btn btn-outline-dark"><a class="text-decoration-none text-primary" href="{{route('players',['id'=>$team->id])}}">اضغط هنا</a></button>
                                                        </div>
                                                    </div>

                                                   
                                                    </td>
                                                    @endif
                                                        @endforeach
                                        
                                                        <td>
                                                            <button class="btn btn-outline-dark" data-toggle="modal"
                                                                    data-target="#myModal-2{{$team->id}}"
                                                                    ><i
                                                                        class="fa fa-edit"></i></button>
                                                            <button class="btn btn-danger" data-toggle="modal"
                                                                    data-target="#myModal-3-d{{$team->id}}"
                                                                    style="margin-left:10px;"><i
                                                                        class="fa fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>

                                        </div>
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
    @foreach($teams as $team)

        <!-- Modal  to Edit supervisor-->
        <div class="modal fade" id="myModal-2{{$team->id}}" tabindex="-1"
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
                        
                    
                        
                         @foreach($team->admins as $admin)

                        <form action="{{route('edit-team',['team_id'=>$team->id, 'admin_id' => $admin->id])}}" method="post">
                        @endforeach

                            @csrf

                            <input type="hidden" name="id" value="{{$id}}"/>

                            <label
                                                                    for="exampleInputPassword1 pt-4" class="d-block text-right mb-4 w-100">المجموعات</label>
                                                            <div class="row">
                            @foreach($groups as $group)
                                            <div class="input-group col-sm-6 mb-4">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <input type="checkbox" value="{{$group->id}}" id="edit{{$group->id}}"
                                                               name="groups[]"
                                                               aria-label="Checkbox for following text input"
                                                               @foreach($team->groups as $old_group)
                                                               @if($old_group->id == $group->id)
                                                               checked
                                                                @endif
                                                                @endforeach
                                                        >
                                                    </div>
                                                </div>
                                                <label for="message-text" class="col-form-label pl-2">{{$group->name}}</label>
                                            </div>
                                        @endforeach
</div>

                            <div class="form-group">
                                <label
                                        for="exampleInputEmail1">اسم الفريق</label>
                                <input type="text"
                                       class="form-control"
                                       id="exampleInputText1"
                                       placeholder="name" name="name" value="{{$team->name}}">
                            </div>

                            <div class="form-group">
                                <label
                                        for="exampleInputEmail1">اسم المدير</label>
                                <input type="text"
                                       class="form-control"
                                       id="exampleInputText1"
                                        name="manager_name" value="{{$team->manager_name}}">
                            </div>
                           
                            <div class="form-group">
                                <label
                                        for="exampleInputPassword1">كلمة المرور</label>
                                <input type="password"
                                       class="form-control"
                                       id="exampleInputPassword1"
                                        name="password">
                            </div>
                          
                            <div class="form-group">
                                <label
                                        for="exampleInputPassword1">رقم الجوال</label>
                                <input type="number"
                                       class="form-control"
                                       id="exampleInputEmail1"
                                        name="mobile_number" value="{{$team->mobile_number}}">
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
        <div class="modal fade" id="myModal-3-d{{$team->id}}" tabindex="-1"
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
                    
                    @foreach(auth()->guard('admin')->user()->roles as $rol)
                                                     @if($rol->id == 2 ) 
                                                     
                                                                         <form action="{{route('delete-team',['team_id'=>$team->id])}}" method="post">

                                                     @else 
                                                     
                                                       @foreach($team->admins as $admin)

                    <form action="{{route('delete-team',['team_id'=>$team->id, 'admin_id' => $admin->id])}}" method="post">


@endforeach

@endif
                                                     
                                                     @endforeach
                                                     
                       
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

@stop

@section('js')
<script>
        $(document).on("change", ".stutus", function () {
            var status = $(this).val();
            var id = $(this).attr("uid");
            var token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ route('team-update-status') }}",
                type: "post",
                dataType: "json",
                data: {status: status, id: id, _token: token},
                success: function (data) {
                    console.log(data.status);
                   if (data.status == "ok") {
                        alert("تم");
                    } else {
                        alert("خطأ");

                    }

                },
                error: function () {
                    alert("ERROR");
                }
            })
        })


    
    </script>
    
    


@stop