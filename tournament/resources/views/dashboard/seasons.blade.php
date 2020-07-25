@extends('layouts.Admin-Layout')

@section('title')

    الموسم
@stop


@section('content')
 
                                        <div class="modal fade" id="myModal-1" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"
                                                            style="font-weight:bold">إضافة موسم</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align:left;">
                                                        <form action="{{route('add-season')}}" method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                        placeholder="اسم الموسم"
                                                                       name="name" value="{{old('name')}}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>تاريخ بدء الموسم</label>
                                                                <input type="date" class="form-control"
                                                                       
                                                                       name="start" value="{{old('start')}}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>تاريخ نهاية الموسم</label>
                                                                <input type="date" class="form-control"
                                                                       name="end" value="{{old('end')}}" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="number" class="form-control"
                                                                       placeholder="الحد الأقصي للاعبين"
                                                                       name="max" value="{{old('max')}}" required>
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
                                        
                                        <button href="javascript:void(0);"
                                           class="btn btn-outline-dark mt-4 mb-4" data-toggle="modal"
                                           data-target="#myModal-1"> إضافة موسم</button>

                                            <!-- widget content -->
                                            <div class="main-content table-responsive">

                                                            <table id="files_list" class="table table-striped mt-5">
                                                    <thead>
                                                    <tr>
                                                        <th data-class="expand">الاسم</th>
                                                        <th data-hide="phone"> الحالة</th>

                                                        <th data-hide="phone">تاريخ البداية</th>
                                                        <th data-hide="phone,tablet">تاريخ النهاية</th>
                                                        <th data-hide="phone,tablet">الحد الأقصى للاعبين</th>
                                                        
                                                        <th data-hide="phone,tablet">اعدادات</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                    @foreach($seasons as $season)
                                                        <tr>
                                                            <td><a class="text-decoration-none text-primary" href="{{route('season-tournaments',['id'=>$season->id])}}">{{$season->name}}</a></td>
                                                            <td style="border:1px solid #ccc;">
                                                                <select class="form-control stutus" uid="{{$season->id}}">
                                                                    <option @if($season->status) selected
                                                                            @endif value="1">
                                                                        مفعل
                                                                    </option>
                                                                    <option @if(!$season->status) selected
                                                                            @endif value="0">
                                                                        غير مفعل
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td>{{$season->start}}</td>
                                                            <td>{{$season->end}}</td>
                                                            <td>{{$season->max}}</td>


                                                            <!-- <td >
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <button type="button" class="btn btn-outline-dark"><a class="text-decoration-none text-primary" href="{{route('season-teams',['id'=>$season->id])}}">اضغط هنا</a></button>
                                                                    </div>
                                                                </div>
                                                            </td> -->
                                                            <td>
                                                                <button class="btn btn-outline-dark" data-toggle="modal"
                                                                        data-target="#myModal-2{{$season->id}}"
                                                                        style="margin-bottom:10px;"><i
                                                                            class="fa fa-edit"></i></button>
                                                                <button class="btn btn-danger" data-toggle="modal"
                                                                        data-target="#myModal-3{{$season->id}}"
                                                                        style="margin-bottom:10px;"><i
                                                                            class="fa fa-trash"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>

                                            </div>
                                            <!-- end widget content -->

                                        </div>

                                       
    @foreach($seasons as $season)
        <!-- Modal  to Edit supervisor-->
        <div class="modal fade" id="myModal-2{{$season->id}}" tabindex="-1"
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
                        <form action="{{route('edit-season',['season_id'=>$season->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label
                                        for="exampleInputEmail1">الاسم</label>
                                <input type="text"
                                       class="form-control"
                                       id="exampleInputText1"
                                        name="name" value="{{$season->name}}">
                            </div>
                            <div class="form-group">
                                <label
                                        for="exampleInputPassword1">تاريخ البداية</label>
                                <input type="date"
                                       class="form-control"
                                       id="exampleInputEmail1"
                                        name="start" value="{{$season->start}}">
                            </div>
                            <div class="form-group">
                                <label
                                        for="exampleInputPassword1">تاريخ النهاية</label>
                                <input type="date"
                                       class="form-control"
                                       id="exampleInputEmail1"
                                        name="end" value="{{$season->end}}">
                            </div>


                             <div class="form-group">
                                <label
                                        for="exampleInputPassword1">الحد الأقصى للاعبين</label>
                                <input type="number"
                                       class="form-control"
                                       id="exampleInputEmail1"
                                        name="max" value="{{$season->max}}">
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
        <div class="modal fade" id="myModal-3{{$season->id}}" tabindex="-1"
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
                      <strong>تأكيد الحذف</strong>
                    </div>
                    <form action="{{route('delete-season',['season_id'=>$season->id])}}" method="post">
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
                url: "{{ route('season-update-status') }}",
                type: "post",
                dataType: "json",
                data: {status: status, id: id, _token: token},
                success: function (data) {
                    if (data.status == "ok" && data.user.status == 1) {
                        alert("تم تفعيل الموسم بنجاح");
                        
                       
                       
                    } else if (data.status == "ok" && data.user.status == 0) {
                            alert("تم إلغاء تفعيل الموسم بنجاح");
                        }  else {
                        alert("خطأ، لا يمكنك تفعيل أكثر من موسم في نفس الوقت");

                    }

                },
                error: function () {
                    alert("ERROR");
                }
            })
        })
    </script>

@stop

