@extends('layouts.Admin-Layout')

@section('title')

    نشاط الفرق
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
                                   
                                 
                                        <div class="container">
                                        <div class="admins" style="margin: 45px 45px 0 0;">

                                           <!-- filters-->
                                           <form method="get" action="{{route('activity.filter')}}">
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


                                                                  

                                                                    <div class="form-group">
                                                                        <button type="submit"
                                                                                class="btn btn-outline-dark btn-min-width mr-1 mb-1 mt-0">
                                                                            <i class="la la-search"></i> بحث
                                                                        </button>
                                                                    </div>
                                                                    </div>

                                                                   

                                                                  
                                                </section>
                                            </form>
                                            <!-- #filters-->
                                            
                                            
 <!-- filters-->
 <form method="get" action="{{route('activity.filter.groups')}}">
                                                <section class="mt-1">
                                                    <div class="row">
                                                           
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
                                                                        <div class="form-group col-xl-3" style="margin-top:15px;">

                                                                    
                                                                       <a class="mt-5 mx-auto" href="{{ URL::previous() }}"><i class="fas fa-sync-alt"></i></a>
                                                                       </div>

                                                                    </div>

                                                                    
                                                                    </section>
                                                                    </form>
                                            <!-- #filters-->

                                            @if(count($teams) == 0)

<span Class="bg-danger text-white p-2 d-block text-center">لا يوجد نتائج متاحة لهذه القيم، جرب قيم أخرى</span>

<a class="d-block mt-5 m-0 mx-auto" href="{{ URL::previous() }}"><i class="fas fa-sync-alt"></i></a>
@else

                                        <!-- widget content -->
                                        <div class="widget-body p-0 table-responsive">
                                            <table id="dt-basic"
                                                   class="table table-striped table-bordered table-hover"
                                                   width="100%">
                                                <thead>
                                                <tr>
                                                    <th data-class="expand">اسم الفريق</th>
                                                    <th data-hide="phone">البطولة</th>
                                                    <th data-hide="phone">المجموعة</th>
                                                    <th data-hide="phone">عدد اللاعبين المسجلين</th>
                                                    <th data-hide="phone">كود الفريق</th>
                                                    <th data-hide="phone">حالة الكود</th>
                                                    <th data-hide="phone">الاعدادات</th>


                                                </tr>
                                                </thead>
                                                <tbody>
                                                
                                                

                                                @foreach($teams as $team)
                                                    <tr>
                                                        <td>{{$team->name}}</td>
                                                        @foreach($team->tournamentss as $tournament)
                                                        <td>{{$tournament->name}}</td>
                                                        @endforeach
                                                        <td>
                                                        @foreach($team->groups as $group)
                                                        <span class="badge badge-success"
                                                                      style="font-size: 11px">{{$group->name}}</span>
                                                        @endforeach
                                                        </td>
                                                       <td>{{$team->playerss->count()}}</td>

                                                       <td>{{$team->code}}</td>
                                                        
                                                        <td style="border:1px solid #ccc;">
                                                        <select class="form-control stutus" cid="{{$team->id}}">

                                                            <option @if(!$team->code_expired) selected
                                                                    @endif value="0">
                                                                تفعيل
                                                            </option>
                                                            <option @if($team->code_expired) selected
                                                                    @endif value="1">
                                                                تعطيل
                                                            </option>

                                                        </select>


                                                        </td>

                                                       <td>
                                                            <button class="btn btn-outline-dark" data-toggle="modal"
                                                                    data-target="#myModal-2{{$team->id}}"
                                                                    style="margin-bottom:10px;"><i
                                                                        class="fa fa-edit"></i></button>
                                                           
                                                        </td>
                                                    </tr>
                                                @endforeach


                                                </tbody>
                                            </table>

                                        </div>
                                        @endif

                                        <!-- end widget content -->

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

                <form action="{{route('edit-activity',['team_id'=>$team->id])}}" method="post">

                    @csrf


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
                                for="exampleInputEmail1">الكود</label>
                        <input type="text"
                               class="form-control"
                               id="exampleInputText1"
                               placeholder="name" name="code" value="{{$team->code}}">
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

@endforeach


@stop

@section('js')

<script>


$(document).on("change", ".stutus", function () {

            var code_expired = $(this).val();
            var id = $(this).attr("cid");
            var token = "{{ csrf_token() }}";
$.ajax({
    url: "{{ route('expire-status') }}",
    type: "post",
    dataType: "json",
    data: {code_expired: code_expired, id: id, _token: token},
    success: function (data) {
        if (data.status == "ok") {
            alert("تم");

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



<script>
            $(document).on("change", ".team", function (e) {
                e.preventDefault();
                var id = $(this).val();
                var token = "{{ csrf_token() }}";

                $.ajax({
                    url: "{{ route('admin.get.team') }}",
                    type: "post",
                    dataType: "json",
                    data: {id: id, _token: token},
                    success: function (data) {
                       

                        if (data.status !== "ok") {
                            alert("ERROR");
                        }

                    },
                    error: function () {
                        alert("ERROR");
                    }
                })
            })


            $(document).on("change", ".tournament", function (e) {
                e.preventDefault();
                var id = $(this).val();
                var token = "{{ csrf_token() }}";

                $.ajax({
                    url: "{{ route('admin.get.tournament') }}",
                    type: "post",
                    dataType: "json",
                    data: {id: id, _token: token},
                    success: function (data) {
                      

                        if (data.status !== "ok") {
                            alert("ERROR");
                        }

                    },
                    error: function () {
                        alert("ERROR");
                    }
                })
            })

            $(document).on("change", ".group", function (e) {
                e.preventDefault();
                var id = $(this).val();
                var token = "{{ csrf_token() }}";

                $.ajax({
                    url: "{{ route('admin.get.group') }}",
                    type: "post",
                    dataType: "json",
                    data: {id: id, _token: token},
                    success: function (data) {
                      

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