@extends('layouts.Admin-Layout')

@section('title')

    الأخبار
@stop


@section('content')
 
                                        <div class="modal fade" id="myModal-1" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"
                                                            style="font-weight:bold">إضافة خبر</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align:left;">
                                                        <form action="{{route('add-new')}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                       id="exampleInputText1" placeholder="عنوان الخبر"
                                                                       name="title" value="{{old('title')}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="date" class="form-control"
                                                                       id="exampleInputEmail1" placeholder="تاريخ الخبر"
                                                                       name="date" value="{{old('date')}}">
                                                            </div>
                                                          


                                                                <div class="form-group">
                                                            <label for="exampleInputEmail1">نص الخبر</label>

                                                                    <textarea class="form-control" name="text" cols="30" rows="10" placeholder="نص الخبر">
                                                                    
                                                                    </textarea>
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
                                        
                                        <button style=" margin-top: 1rem;" href="javascript:void(0);"
                                           class="btn btn-outline-dark" data-toggle="modal"
                                           data-target="#myModal-1"> إضافة خبر</button>
                                           <span><a class="d-block float-left mr-3 mt-3 btn btn-outline-dark" target="_blank" href="{{route('site-index')}}">الصفحة الرئيسية</a></span>
                                        <!-- widget content -->
                                        <div class="main-content table-responsive">

                                                        <table id="files_list" class="table table-striped mt-5">
                                                <thead>
                                                <tr>
                                                    <th data-class="expand">عنوان الخبر</th>
                                                    <th data-hide="phone"> الحالة</th>

                                                    <th data-hide="phone">تاريخ الخبر</th>
                                               
                                                    <th data-hide="phone,tablet">وصف البطولة</th>
                                                  
                                                    <th data-hide="phone,tablet">اعدادات</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                
                                                @foreach($news as $new)
                                                    <tr>
                                                        <td>{{$new->title}}</td>
                                                        <td style="border:1px solid #ccc;">
                                                            <select class="form-control stutus" uid="{{$new->id}}">
                                                                <option @if($new->status) selected
                                                                        @endif value="1">
                                                                    مفعل
                                                                </option>
                                                                <option @if(!$new->status) selected
                                                                        @endif value="0">
                                                                     غير مفعل
                                                                </option>
                                                            </select>
                                                        </td>
                                                        <td>{{$new->date}}</td>
                                                                                                               
                                                        <td>
                                                        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$new->id}}">
  أظهر نص الخبر
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$new->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">الوصف</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{$new->text}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</td>
                                                        <td>
                                                            <button class="btn btn-outline-dark" data-toggle="modal"
                                                                    data-target="#myModal-2{{$new->id}}"
                                                                    style="margin-bottom:10px;"><i
                                                                        class="fa fa-edit"></i></button>
                                                            <button class="btn btn-danger" data-toggle="modal"
                                                                    data-target="#myModal-3{{$new->id}}"
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

                                       
    @foreach($news as $new)
        <!-- Modal  to Edit supervisor-->
        <div class="modal fade" id="myModal-2{{$new->id}}" tabindex="-1"
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
                        <form action="{{route('edit-new',['new_id'=>$new->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label
                                        for="exampleInputEmail1">العنوان</label>
                                <input type="text"
                                       class="form-control"
                                       id="exampleInputText1"
                                        name="title" value="{{$new->title}}">
                            </div>
                            <div class="form-group">
                                <label
                                        for="exampleInputPassword1">تاريخ الخبر</label>
                                <input type="date"
                                       class="form-control"
                                       id="exampleInputEmail1"
                                        name="date" value="{{$new->date}}">
                            </div>
                          
                          
                                                            <label for="exampleInputEmail1">نص الخبر</label>

                                                                    <textarea name="new" cols="30" rows="10">
                                                                    {{$new->text}}
                                                                    </textarea>
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
        <div class="modal fade" id="myModal-3{{$new->id}}" tabindex="-1"
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
                    <form action="{{route('delete-new',['new_id'=>$new->id])}}" method="post">
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
                url: "{{ route('new-update-status') }}",
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

