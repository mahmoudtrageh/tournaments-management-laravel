@extends('layouts.Admin-Layout')

@section('title')

    البطولات
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

         <!-- Page Heading -->
         <div class="d-sm-flex align-items-center justify-content-between ml-5">
            <h1 class="h3 mb-0 text-gray-800">البطولات</h1>
          </div>
        
            <div>
                <div>
                    <!-- widget grid -->
                    <section id="widget-grid" >
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
                                                            style="font-weight:bold">إضافة بطولة</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align:left;">
                                                        <form action="{{route('add-tournament')}}" method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="اسم البطولة"
                                                                       name="name" value="{{old('name')}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="date" class="form-control"
                                                                       id="exampleInputEmail1" placeholder="تاريخ البداية"
                                                                       name="start" value="{{old('email')}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="date" class="form-control"
                                                                       id="exampleInputEmail1" placeholder="تاريخ النهاية"
                                                                       name="end" value="{{old('email')}}">
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
                                        <div class=" admins">
                                        <button style=" margin-top: 1rem;" href="javascript:void(0);"
                                           class="btn btn-outline-dark" data-toggle="modal"
                                           data-target="#myModal-1"> إضافة بطولة</button>
                                           <span><a class="d-block float-left mr-3 mt-3 btn btn-outline-dark" target="_blank" href="{{route('site-index')}}">الصفحة الرئيسية</a></span>
                                        <!-- widget content -->
                                        <div class="widget-body p-0 table-responsive">
                                            <table id="dt-basic"
                                                   class="table table-striped table-bordered table-hover"
                                                   width="100%">
                                                <thead>
                                                <tr>
                                                    <th data-class="expand">الاسم</th>
                                                    <th data-hide="phone"> الحالة</th>

                                                    <th data-hide="phone">تاريخ البداية</th>
                                                    <th data-hide="phone,tablet">تاريخ النهاية</th>
                                                    <th data-hide="phone,tablet">تاريخ الانشاء</th>
                                                    <th data-hide="phone,tablet">المجموعات</th>
                                                    <th data-hide="phone,tablet">الفرق</th>
                                                    <th data-hide="phone,tablet">اعدادات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                
                                                @foreach($tournaments as $tournament)
                                                    <tr>
                                                        <td>{{$tournament->name}}</td>
                                                        <td style="border:1px solid #ccc;">
                                                            <select class="form-control stutus" uid="{{$tournament->id}}">
                                                                <option @if($tournament->status) selected
                                                                        @endif value="1">
                                                                    مفعل
                                                                </option>
                                                                <option @if(!$tournament->status) selected
                                                                        @endif value="0">
                                                                     غير مفعل
                                                                </option>
                                                            </select>
                                                        </td>
                                                        <td>{{$tournament->start}}</td>
                                                        <td>{{$tournament->end}}</td>
                                                        <td>{{$tournament->created_at}}</td>

                                                        <td >
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button type="button" class="btn btn-outline-dark"><a class="text-decoration-none text-primary" href="{{route('groups',['id'=>$tournament->id])}}">اضغط هنا</a></button>
                                                        </div>
                                                    </div>

                                                   
                                                    </td>

                                                    <td >
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button type="button" class="btn btn-outline-dark"><a class="text-decoration-none text-primary" href="{{route('teams',['id'=>$tournament->id])}}">اضغط هنا</a></button>
                                                        </div>
                                                    </div>

                                                   
                                                    </td>

                                                        <td>
                                                            <button class="btn btn-outline-dark" data-toggle="modal"
                                                                    data-target="#myModal-2{{$tournament->id}}"
                                                                    style="margin-bottom:10px;"><i
                                                                        class="fa fa-edit"></i></button>
                                                            <button class="btn btn-danger" data-toggle="modal"
                                                                    data-target="#myModal-3{{$tournament->id}}"
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

                                        </div>

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
    @foreach($tournaments as $tournament)
        <!-- Modal  to Edit supervisor-->
        <div class="modal fade" id="myModal-2{{$tournament->id}}" tabindex="-1"
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
                        <form action="{{route('edit-tournament',['tournament_id'=>$tournament->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label
                                        for="exampleInputEmail1">الاسم</label>
                                <input type="text"
                                       class="form-control"
                                       id="exampleInputText1"
                                        name="name" value="{{$tournament->name}}">
                            </div>
                            <div class="form-group">
                                <label
                                        for="exampleInputPassword1">تاريخ البداية</label>
                                <input type="date"
                                       class="form-control"
                                       id="exampleInputEmail1"
                                        name="start" value="{{$tournament->start}}">
                            </div>
                            <div class="form-group">
                                <label
                                        for="exampleInputPassword1">تاريخ النهاية</label>
                                <input type="date"
                                       class="form-control"
                                       id="exampleInputEmail1"
                                        name="end" value="{{$tournament->end}}">
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
        <div class="modal fade" id="myModal-3{{$tournament->id}}" tabindex="-1"
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
                    <form action="{{route('delete-tournament',['tournament_id'=>$tournament->id])}}" method="post">
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
                url: "{{ route('tournament-update-status') }}",
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

