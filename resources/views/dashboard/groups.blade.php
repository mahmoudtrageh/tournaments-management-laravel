@extends('layouts.Admin-Layout')

@section('title')

    المجموعات
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
                                                            style="font-weight:bold">إضافة مجموعة</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align:left;">
                                                        <form action="{{route('add-group')}}" method="post">
                                                            @csrf

                                                            <input type="hidden" name="tournament_id" value="{{$id}}"/>



                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="اسم المجموعة"
                                                                       name="name" value="{{old('name')}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>الحد الأدني للعمر</label>
                                                                <input type="date" class="form-control"
                                                                       id="exampleInputEmail1" placeholder="الحد الأدني للعمر"
                                                                       name="min_birth" value="{{old('min_birth')}}">
                                                            </div>
                                                            <div class="form-group">
                                                                                                                                <label>الحد الأقصى للعمر</label>
                                                                <input type="date" class="form-control"
                                                                       id="exampleInputEmail1" placeholder="الحد الأقصي للعمر"
                                                                       name="max_birth" value="{{old('max_birth')}}">
                                                            </div>
                                                           
                                                            <div class="form-group">
                                                                
                                                                <input type="number" class="form-control"
                                                                       id="exampleInputEmail1" placeholder="الحد الأقصي لعدد اللاعبين"
                                                                       name="max_players" value="{{old('max_players')}}">
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
                                                    <th data-class="expand">اسم المجموعة</th>
                                                    <th data-hide="phone">الحد الأدني للعمر</th>
                                                    <th data-hide="phone">الحد الأقصى للعمر</th>
                                                    <th data-hide="phone">الحد الأقصى لعدد اللاعبين</th>

                                                    <th data-hide="phone,tablet">الاعدادات</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                
                                                @foreach($groups as $group)
                                                    <tr>
                                                        <td>{{$group->name}}</td>
                                                        <td>{{$group->min_birth}}</td>
                                                        <td>{{$group->max_birth}}</td>
                                                        <td>{{$group->max_players}}</td>

                                                        
                                                        <td>
                                                            <button class="btn btn-outline-dark" data-toggle="modal"
                                                                    data-target="#myModal-2{{$group->id}}"
                                                                    ><i
                                                                        class="fa fa-edit"></i></button>
                                                            <button class="btn btn-danger" data-toggle="modal"
                                                                    data-target="#myModal-3{{$group->id}}"
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
    @foreach($groups as $group)
        <!-- Modal  to Edit supervisor-->
        <div class="modal fade" id="myModal-2{{$group->id}}" tabindex="-1"
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
                        <form action="{{route('edit-group',['group_id'=>$group->id])}}" method="post">
                            @csrf

                            <input type="hidden" name="id" value="{{$id}}"/>


                            <div class="form-group">
                                <label
                                        for="exampleInputEmail1">اسم المجموعة</label>
                                <input type="text"
                                       class="form-control"
                                       id="exampleInputText1"
                                      name="name" value="{{$group->name}}">
                            </div>
                            <div class="form-group">
                                <label
                                        for="exampleInputPassword1">الحد الأدنى للعمر</label>
                                <input type="date"
                                       class="form-control"
                                       id="exampleInputEmail1"
                                       name="min_birth" value="{{$group->min_birth}}">
                            </div>
                            <div class="form-group">
                                <label
                                        for="exampleInputPassword1">الحد الأقصى للعمر</label>
                                <input type="date"
                                       class="form-control"
                                       id="exampleInputEmail1"
                                       name="max_birth" value="{{$group->max_birth}}">
                            </div>
                            <div class="form-group">
                                <label
                                        for="exampleInputPassword1">الحد الأقصي لعدد اللاعبين</label>
                                <input type="number"
                                       class="form-control"
                                       id="exampleInputEmail1"
                                       name="max_players" value="{{$group->max_players}}">
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
        <div class="modal fade" id="myModal-3{{$group->id}}" tabindex="-1"
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
                      <strong> تأكيد الحذف </strong>
                    </div>
                    <form action="{{route('delete-group',['group_id'=>$group->id])}}" method="post">
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
