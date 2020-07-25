@extends('layouts.Admin-Layout')

@section('title')

    المشرفين
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
                                        <!-- بداية إضافة مشرف -->
                                        <div class="modal fade" id="myModal-1" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"
                                                            style="font-weight:bold">إضافة مشرف</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align:left;">
                                                        <form action="{{route('add-admin')}}" method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="الاسم"
                                                                       name="name" value="{{old('name')}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="Email" class="form-control"
                                                                       id="exampleInputEmail1" placeholder="البريد الإلكتروني"
                                                                       name="email" value="{{old('email')}}">
                                                            </div>
                                                            <div class="form-group">
                                                               
                                                                <input type="password" class="form-control"
                                                                       id="exampleInputPassword1" autocomplete="off"
                                                                       placeholder="كلمة المرور" name="password">
                                                            </div>
                                                            <label
                                                                    for="exampleInputPassword1 pt-4">الصلاحيات</label>
                                                            <div class="row">

                                                            @foreach($roles as $role)
                                            <div class="input-group col-sm-6">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <input type="checkbox" value="{{$role->id}}" id="add{{$role->id}}"
                                                               name="roles[]"
                                                               aria-label="Checkbox for following text input"
                                                               @if(old('roles'))
                                                               @foreach(old('roles') as $old_role)
                                                               @if($old_role == $role->id)
                                                               checked
                                                                @endif
                                                                @endforeach
                                                                @endif
                                                        >
                                                    </div>
                                                </div>
                                                <label for="message-text" class="col-form-label pl-2">{{$role->name_ar}}</label>
                                            </div>
                                        @endforeach

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
                                                    <th data-class="expand">الاسم</th>

                                                    <th data-hide="phone">البريد الإلكتروني</th>
                                                    <th data-hide="phone,tablet">الصلاحيات</th>
                                                    <th data-hide="phone,tablet">الاعدادات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                
                                                @foreach($admins as $admin)
                                                    <tr>
                                                        <td>{{$admin->name}}</td>
                                                        <td>{{$admin->email}}</td>
                                                        <td>
                                                            @foreach ($admin->roles as $role)
                                                                <span class="badge badge-success">{{$role->name_ar}}</span>
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-outline-dark" data-toggle="modal"
                                                                    data-target="#myModal-2{{$admin->id}}"
                                                                    ><i
                                                                        class="fa fa-edit"></i></button>
                                                            <button class="btn btn-danger" data-toggle="modal"
                                                                    data-target="#myModal-3{{$admin->id}}"
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
    @foreach($admins as $admin)
        <!-- بداية فورمة تعديل أدمن-->
        <div class="modal fade" id="myModal-2{{$admin->id}}" tabindex="-1"
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
                       
                        <form action="{{route('edit-admin',['admin_id'=>$admin->id])}}" method="post">
                            @csrf
                            
                            
                            <div class="form-group">
                                <label
                                        for="exampleInputEmail1">الاسم</label>
                                <input type="text"
                                       class="form-control"
                                       id="exampleInputText1"
                                      name="name" value="{{$admin->name}}">
                            </div>
                            <div class="form-group">
                                <label
                                        for="exampleInputPassword1">البريد الإلكتروني</label>
                                <input type="Email"
                                       class="form-control"
                                       id="exampleInputEmail1"
                                      name="email" value="{{$admin->email}}">
                            </div>
                            <div class="form-group">
                                <label
                                        for="exampleInputPassword1">كلمة المرور</label>
                                <input type="password"
                                       class="form-control"
                                       id="exampleInputPassword1"
                                       name="password" value="">
                            </div>
                            <label
                                    for="exampleInputPassword1">الصلاحيات</label>
                            <div class="row">

                            @foreach($roles as $role)
                                            <div class="input-group col-sm-6">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <input type="checkbox" value="{{$role->id}}" id="edit{{$role->id}}"
                                                               name="roles[]"
                                                               aria-label="Checkbox for following text input"
                                                               @foreach($admin->roles as $old_role)
                                                               @if($old_role->id == $role->id)
                                                               checked
                                                                @endif
                                                                @endforeach
                                                        >
                                                    </div>
                                                </div>
                                                <label for="message-text" class="col-form-label pl-2">{{$role->name_ar}}</label>
                                            </div>
                                        @endforeach


                            
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


        <!--بداية فورمة الحذف-->
        <div class="modal fade" id="myModal-3{{$admin->id}}" tabindex="-1"
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
                    <form action="{{route('delete-admin',['admin_id'=>$admin->id])}}" method="post">
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
